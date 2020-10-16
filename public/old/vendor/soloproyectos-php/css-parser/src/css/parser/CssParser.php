<?php
/**
 * This file is part of Soloproyectos common library.
 *
 * @author  Gonzalo Chumillas <gchumillas@email.com>
 * @license https://github.com/soloproyectos/php.common-libs/blob/master/LICENSE BSD 2-Clause License
 * @link    https://github.com/soloproyectos/php.common-libs
 */
namespace soloproyectos\css\parser;
use \ArrayObject;
use \Closure;
use \DOMDocument;
use \DOMElement;
use \DOMNode;
use soloproyectos\arr\Arr;
use soloproyectos\css\parser\combinator\CssParserCombinator;
use soloproyectos\css\parser\combinator\CssParserCombinatorFactory;
use soloproyectos\css\parser\filter\CssParserFilter;
use soloproyectos\css\parser\filter\CssParserFilterAttr;
use soloproyectos\css\parser\filter\CssParserFilterClass;
use soloproyectos\css\parser\filter\CssParserFilterId;
use soloproyectos\css\parser\filter\CssParserFilterPseudo;
use soloproyectos\css\parser\filter\CssParserFilterPseudoFactory;
use soloproyectos\css\parser\model\CssParserModelElement;
use soloproyectos\css\parser\model\CssParserModelFactor;
use soloproyectos\css\parser\model\CssParserModelSelector;
use soloproyectos\text\parser\exception\TextParserException;
use soloproyectos\text\parser\TextParser;
use soloproyectos\dom\Dom;

/**
 * Class CssParser.
 *
 * This class parses and evaluates a CSS expression.
 *
 * ```
 * selectorList              = selector {"," selector}
 * selector                  = factor {factor}
 * factor                    = combinator element | element
 * element                   = ("*" | identifier) {filter}
 * filter                    = class-filter | id-filter | attr-filter | pseudo-filter
 * class-filter              = "." identifier
 * id-filter                 = "#" identifier
 * attr-filter               = "[" identifier [attr-operator value] "]"
 * pseudo-filter             = ":" ( pseudo-first-child-filter
 *                             | pseudo-nth-child-filter )
 * pseudo-nth-child-filter   = "nth-child" "(" number ")"
 * pseudo-first-child-filter = "first-child"
 * identifier                = ( "_" | alphanum ) { "_" | "-" | alphanum }
 * attr-operator             = "=" | "~="
 * combinator                = ">" | "+" | "~"
 * value                     = quoted-string | alphanum {alphanum}
 * ```
 *
 * @package Css\Parser
 * @author  Gonzalo Chumillas <gchumillas@email.com>
 * @license https://github.com/soloproyectos/php.common-libs/blob/master/LICENSE BSD 2-Clause License
 * @link    https://github.com/soloproyectos/php.common-libs
 */
class CssParser extends TextParser
{
    /**
     * Identifier pattern.
     * This regular pattern describes an identifier.
     */
    const IDENTIFIER = "[_a-z0-9][_\-a-z0-9]*";

    /**
     * A node context.
     * @var DOMNode
     */
    private $_node;

    /**
     * List of pseudo filters.
     * @var array of CssParserFilterPseudo
     */
    private $_pseudoFilters;

    /**
     * List of combinators.
     * @var array of strings
     */
    private $_combinators;

    /**
     * Constructor.
     *
     * The target can be either a document (DOMDocument), a node (DOMNode), a
     * filename, a URL or a string.
     *
     * When the $target parameter is a URL or a filename, you can also specify
     * the mimetype and the charset. If this info is not provided, they will be
     * automatically detected. For example:
     * ```php
     * // charset and mime-type are provided
     * $selector = new CssParser(
     *      'http://www.my-site.com/document.xml', 'UTF-8', 'text/xml'
     * );
     *
     * // charset and mime-type will be automatically detected
     * $selector = new CssParser('http://www.my-site.com/document.xml');
     * ```
     *
     * Example 1: The target is a document
     * ```php
     * $doc = new DOMDocument("1.0", "UTF-8");
     * $doc->loadXML(
     *      '<root><item id="101" /><item id="102" /></root>'
     * );
     * $selector = new CssParser($doc);
     * ```
     *
     * Example 2: The targt is a node
     * ```php
     * $doc = new DOMDocument("1.0", "UTF-8");
     * $doc->loadXML(
     *      '<root><item id="101" /><item id="102" /></root>'
     * );
     * $root = $doc->documentElement;
     * $selector = new CssParser($root);
     * ```
     *
     * Example 3: The target is a filename
     * ```php
     * $selector = new CssParser('/path/to/my/document.xml');
     * ```
     *
     * Example 4: The target is an URL
     * ```php
     * $selector = new CssParser('http://www.my-site.com/document.xml');
     * ```
     *
     * @param DOMDocument|DOMNode|string $target   Target object
     * @param string                     $charset  Charset (default is "")
     * @param string                     $mimetype Mime-type (default is "")
     *
     * @return void
     */
    public function __construct($target, $charset = "", $mimetype = "")
    {
        $this->_pseudoFilters = array();
        $this->_combinators = array();

        if ($target instanceof DOMDocument) {
            $this->_node = $target->documentElement;
        } elseif ($target instanceof DOMNode) {
            $this->_node = $target;
        } elseif (is_string($target)) {
            $this->_load($target, $charset, $mimetype);
        }

        // registers pseudo filters
        $this->registerPseudoFilter("first", "CssParserFilterPseudoFirst");
        $this->registerPseudoFilter("last", "CssParserFilterPseudoLast");
        $this->registerPseudoFilter("eq", "CssParserFilterPseudoEq");
        $this->registerPseudoFilter("nth", "CssParserFilterPseudoEq");
        $this->registerPseudoFilter("even", "CssParserFilterPseudoEven");
        $this->registerPseudoFilter("odd", "CssParserFilterPseudoOdd");
        $this->registerPseudoFilter("lt", "CssParserFilterPseudoLt");
        $this->registerPseudoFilter("gt", "CssParserFilterPseudoGt");
        $this->registerPseudoFilter("nth-child", "CssParserFilterPseudoNthChild");
        $this->registerPseudoFilter(
            "not", "CssParserFilterPseudoNot", "selectorList"
        );
        $this->registerPseudoFilter(
            "first-child", "CssParserFilterPseudoFirstChild"
        );

        // registers combinators
        $this->registerCombinator("", "CssParserCombinatorDescendant");
        $this->registerCombinator(">", "CssParserCombinatorChild");
        $this->registerCombinator("+", "CssParserCombinatorAdjacent");
        $this->registerCombinator("~", "CssParserCombinatorGeneral");

        parent::__construct("");
    }

    /**
     * Selects nodes from the target.
     *
     * For example:
     * ```php
     * $doc = new DOMDocument("1.0", "UTF-8");
     * $doc->loadXML(
     *      '<root><item id="101" /><item id="102" /></root>'
     * );
     * $selector = new CssSelector($doc);
     *
     * // selects the first and the odd elements and prints them
     * $items = $selector->query('item:odd, item:first-child');
     * foreach ($items as $item) {
     *      echo Dom::dom2str($item) . "\n";
     * }
     * ```
     *
     * @param array $selectorList List of css selectors separated by commas
     *
     * @return array of DOMElement
     */
    public function query($selectorList)
    {
        return $this->parse($selectorList);
    }

    /**
     * Registers a new user defined pseudo-filter.
     *
     * Example 1:
     * ```php
     * // is the node in penultimate position?
     * $selector->registerPseudoFilter(
     *     "penultimate", function ($node, $input, $position, $items
     * ) {
     *     return $position == count($items) - 2;
     * });
     * $items = $selector->query('item:penultimate');
     * ```
     *
     * Example 2:
     * ```php
     * // is node position a Fibonacci number?
     * $css->registerPseudoFilter(
     *     "fibonacci", function ($node, $input, $position, $items
     * ) {
     *     $isFibonacci = false;
     *     if ($position > 0) {
     *         $n = sqrt(5 * pow($position, 2) + 4);
     *         $isFibonacci = $n - floor($n) == 0;
     *         if (!$isFibonacci) {
     *             $n = sqrt(5 * pow($position, 2) - 4);
     *             $isFibonacci = $n - floor($n) == 0;
     *         }
     *     }
     *     return $isFibonacci;
     * });
     * $items = $selector->query('item:fibonacci');
     * ```
     *
     * Example 3:
     * ```php
     * // is the node position divisible by a given number?
     * $css->registerPseudoFilter(
     *     "divisible", function ($node, $input, $position, $items
     * ) {
     *     $n = intval($input);
     *     return $n > 0 && $position % $n == 0;
     * });
     *
     * // selects all nodes 'divisible' by 3
     * $items = $selector->query('item:divisible(3)');
     * ```
     *
     * @param string         $name   Pseudo-filter name
     * @param string|Closure $object Class name or user defined function.
     * @param string         $entity Entity (default is 'value')
     *
     * @return void
     */
    public function registerPseudoFilter($name, $object, $entity = "value")
    {
        if (is_callable($object)) {
            // user defined pseudo-filter
            $this->_pseudoFilters[$name] = array(
                "classname" => "CssParserFilterPseudoUserDefined",
                "user_def_function" => $object,
                "entity" => $entity
            );
        } else {
            $this->_pseudoFilters[$name] = array(
                "classname" => $object,
                "user_def_function" => null,
                "entity" => $entity
            );
        }
    }

    /**
     * Registers a new user defined combinator.
     *
     * For example:
     * ```php
     * // the following user defined combinator returns all child nodes that
     * // have no children. The user defined function should return an array of
     * // DOMElement objects.
     * $selector->registerCombinator("&", function ($node, $tagname) {
     *     $ret = array();
     *     $items = Dom::getElementsByTagName($node, $tagname);
     *     foreach ($items as $item) {
     *         $childs = Dom::getChildElements($item);
     *         if (count($childs) == 0) {
     *             array_push($ret, $item);
     *         }
     *     }
     *     return $ret;
     * });
     *
     * // we have defined the '&' combinator
     * $selector->query("genres &amp; item");
     * ```
     *
     * @param string         $name   Combinator name
     * @param string|Closure $object Class name or user defined function
     *
     * @return void
     */
    public function registerCombinator($name, $object)
    {
        if (is_callable($object)) {
            $this->_combinators[$name] = array(
                "classname" => "CssParserCombinatorUserDefined",
                "user_def_function" => $object
            );
        } else {
            $this->_combinators[$name] = array(
                "classname" => $object,
                "user_def_function" => null
            );
        }
    }

    /**
     * Gets the string representation of a node.
     *
     * @param DOMNode $node DOMNode object
     *
     * @return string
     */
    public function dom2str($node)
    {
        return Dom::dom2str($node);
    }

    /**
     * Is the next thing a combinator?
     *
     * @return false|CssParserCombinator
     */
    protected function combinator()
    {
        $ret = false;
        $combinatorNames = array_keys($this->_combinators);

        if (list($name) = $this->in($combinatorNames)) {
            $combinator = $this->_combinators[$name];
            $ret = CssParserCombinatorFactory::getInstance(
                $combinator["classname"], $combinator["user_def_function"]
            );
        }

        return $ret;
    }

    /**
     * Is the next thing an attribute operator?
     *
     * @return false|array of a single string
     */
    protected function attrOperator()
    {
        return $this->in(CssParserFilterAttr::getOperators());
    }

    /**
     * Is the next thing an identifier?
     *
     * @return false|array of a single string
     */
    protected function identifier()
    {
        if (list($id) = $this->match(CssParser::IDENTIFIER)) {
            return array($id);
        }
        return false;
    }

    /**
     * Is the next thing a value?
     *
     * The following examples are values:
     * ```
     * 'hello'
     * "hello\"man"
     * 'hello\'man'
     * 0015blah
     * _blah_
     * ```
     *
     * @return false|array of a single string
     */
    protected function value()
    {
        if (   !(list($value) = $this->str())
            && !(list($value) = $this->number())
            && !(list($value) = $this->match(CssParser::IDENTIFIER))
        ) {
            return false;
        }
        return array($value);
    }

    /**
     * Is the next thing a speudo filter?
     *
     * @return false|CssParserFilterPseudo
     */
    protected function pseudoFilter()
    {
        if (!$this->match("/^\:/")) {
            return false;
        }

        if (!list($name) = $this->is("identifier")) {
            throw new TextParserException("Invalid identifier", $this);
        }

        $filter = Arr::get($this->_pseudoFilters, $name, null);
        if ($filter === null) {
            throw new TextParserException("Unknown pseudo-filter", $this);
        }

        $input = "";
        if ($this->eq("(")) {
            if (!$input = $this->is($filter["entity"])) {
                throw new TextParserException("Invalid input", $this);
            }

            if (is_array($input)) {
                $input = $input[0];
            }

            if (!$this->eq(")")) {
                throw new TextParserException("Invalid expression", $this);
            }
        }

        $pseudoFilter = CssParserFilterPseudoFactory::getInstance(
            $filter["classname"], $input, $filter["user_def_function"]
        );

        return $pseudoFilter;
    }

    /**
     * Is the next thing an attribute filter?
     *
     * @return false|CssParserFilterAttr
     */
    protected function attrFilter()
    {
        $attrName = "";
        $op = "";
        $value = "";

        if (!$this->match("/^\[/")) {
            return false;
        }
        if (!list($attrName) = $this->is("identifier")) {
            throw new TextParserException("Invalid identifier", $this);
        }
        if (list($op) = $this->is("attrOperator")) {
            if (!list($value) = $this->is("value")) {
                throw new TextParserException("Invalid attribute operator", $this);
            }
        }
        if (!$this->eq("]")) {
            throw new TextParserException("Invalid expression", $this);
        }
        return new CssParserFilterAttr($attrName, $op, $value);
    }

    /**
     * Is the next thing an id filter?
     *
     * @return false|CssParserFilterId
     */
    protected function idFilter()
    {
        $id = "";

        if (!$this->match("/^\#/")) {
            return false;
        }
        if (!list($id) = $this->is("identifier")) {
            throw new TextParserException("Invalid identifier", $this);
        }
        return new CssParserFilterId($id);
    }

    /**
     * Is the next thing a class filter?
     *
     * @return false|CssParserFilterClass
     */
    protected function classFilter()
    {
        $className = "";

        if (!$this->match("/^\./")) {
            return false;
        }
        if (!list($className) = $this->is("identifier")) {
            throw new TextParserException("Invalid identifier", $this);
        }
        return new CssParserFilterClass($className);
    }

    /**
     * Is the next thing a filter?
     *
     * @return false|CssParserFilter
     */
    protected function filter()
    {
        $filter = null;

        if (   (!$filter = $this->is("classFilter"))
            && (!$filter = $this->is("idFilter"))
            && (!$filter = $this->is("attrFilter"))
            && (!$filter = $this->is("pseudoFilter"))
        ) {
            return false;
        }
        return $filter;
    }

    /**
     * Is the next thing an element?
     *
     * The following example is an element:
     * ```
     * div.my-class[title = hello]:nth-child(1)
     * ```
     *
     * In the above example, 'div' is the tag name
     * and the following strings are filters:
     * ```
     * .my-class       // a class filter
     * [title = hello] // an attribute filter
     * :nth-child(1)   // a pseudo filter
     * ```
     *
     * @return false|CssParserModelElement
     */
    protected function element()
    {
        $element = null;
        $filter = null;
        $tagName = "*";

        // ignores left spaces
        $this->match("\s+");

        if (   (list($name) = $this->eq("*"))
            || (list($name) = $this->is("identifier"))
        ) {
            $tagName = $name? $name : "*";
        } elseif (!$filter = $this->is("filter")) {
            return false;
        }

        $element = new CssParserModelElement($tagName);

        // first filter
        if ($filter) {
            $element->addFilter($filter);
        }

        // additional filters
        while ($filter = $this->is("filter")) {
            $element->addFilter($filter);
        }

        return $element;
    }

    /**
     * Is the next thing a factor?
     *
     * The following example is a factor:
     * ```
     * > div.my-class[title = hello]
     * ```
     *
     * In the above example, ">" is an combinator and
     * "div.my-class[title = hello]" is an element.
     *
     * @return false|CssParserModelFactor
     */
    protected function factor()
    {
        $combinator = null;

        if ($combinator = $this->is("combinator")) {
            if (!$element = $this->is("element")) {
                throw new TextParserException("Invalid expression", $this);
            }
        } elseif ($element = $this->is("element")) {
            // 'descendant' is the default combinator
            $combinator = CssParserCombinatorFactory::getInstance(
                "CssParserCombinatorDescendant"
            );
        } else {
            return false;
        }

        return new CssParserModelFactor($combinator, $element);
    }

    /**
     * Is the next thing a selector?
     *
     * A selector is a list of factors. The following example is a selector:
     * ```
     * div > div.class h2[title = 'main-title'] + h3
     * ```
     *
     * In the above example, the following strings are factors:
     * ```
     * div
     * > div.class
     * h2[title = 'main-title']
     * + h3
     * ```
     *
     * @return false|CssParserModelSelector
     */
    protected function selector()
    {
        $factor = null;

        // first factor
        if (!$factor = $this->is("factor")) {
            return false;
        }
        $selector = new CssParserModelSelector();
        $selector->addFactor($factor);

        // additional factors
        while ($factor = $this->is("factor")) {
            $selector->addFactor($factor);
        }

        return $selector;
    }

    /**
     * Is the next thing a selectorList?
     *
     * A selectorList is one or more css selectors separated by commas.
     *
     * For example:
     * ```
     * div > div.class div#id, div &gt; p, pre
     * ```
     *
     * In the above example, the following strings are terms:
     * ```
     * div > div.class div
     * div > p
     * pre
     * ```
     *
     * @return ArrayObject of DOMElement objects
     */
    protected function selectorList()
    {
        $nodes = array();

        do {
            if (!$selector = $this->is("selector")) {
                // throw new TextParserException("Invalid expression", $this);
                break;
            }
            $nodes = Dom::mergeNodes(
                $nodes,
                $selector->filter($this->_node)
            );
        } while ($this->eq(","));

        return new ArrayObject(Dom::sortNodes($nodes));
    }

    /**
     * Parses and evaluates a list of CSS expressions.
     *
     * This function parses and evaluates a list of CSS expressions separated by
     * commas.
     *
     * @return ArrayObject
     */
    protected function evaluate()
    {
        return $this->is("selectorList");
    }

    /**
     * Loads an XML or HTML document.
     *
     * <p>This function loads an XML or HTML document from a filename, url or
     * string.</p>
     *
     * @param string $source   A filename or a URL
     * @param string $charset  Charset, autodetected (default is "")
     * @param string $mimetype Mime-type, autodetected (default is "")
     *
     * @return void
     */
    private function _load($source, $charset = "", $mimetype = "")
    {
        // loads the contents
        $content = null;
        if ($this->_isURL($source)) {
            list($content, $charset, $mimetype) = $this->_loadUrl(
                $source, $charset, $mimetype
            );
        } elseif (!is_file($source)) {
            $content = $source;
        }

        if (strlen($charset) == 0) {
            $charset = "iso-8859-1";
        }

        // creates a new XML document
        $doc = new DOMDocument("1.0", $charset);
        $doc->preserveWhiteSpace = false;
        $doc->formatOutput = true;

        // loads a string, a file or a URL
        if ($content != null) {
            if ($mimetype == "text/html") {
                $doc->loadHTML($content);
            } else {
                $doc->loadXML($content);
            }
        } else {
            if ($mimetype == "text/html") {
                $doc->loadHTMLFile($source);
            } else {
                $doc->load($source);
            }
        }

        $this->_node = $doc->documentElement;
    }

    /**
     * Loads url contents.
     *
     * <p>Loads the contents of a URL and, optionally, the mimetype and the
     * charset of the page.</p>
     *
     * @param string $source   A filename or a URL
     * @param string $charset  Charset, autodetected (default is "")
     * @param string $mimetype Mime-type, autodetected (default is "")
     *
     * @return array
     */
    private function _loadUrl($source, $charset = "", $mimetype = "")
    {
        $loadHeaders = (strlen($mimetype) == 0) || (strlen($charset) == 0);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $source);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, $loadHeaders);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 120);
        $result = curl_exec($ch);
        curl_close($ch);

        // loads mime-type and charse
        if ($loadHeaders) {
            $headers = null;
            $separator = "\r\n\r\n";
            $pos = strpos($result, $separator);
            if ($pos !== false) {
                $headers = substr($result, 0, $pos);
                $content = substr($result, $pos + strlen($separator));
            }

            $lines = explode("\r\n", $headers);
            foreach ($lines as $line) {
                $regexp = '@Content-Type:\s*([\w/+]+)(;\s*charset=(\S+))?@i';
                if (preg_match($regexp, $line, $matches) > 0) {
                    if (strlen($mimetype) == 0) {
                        $mimetype = Arr::exist($matches, 1)
                            ? $matches[1]
                            : null;
                    }
                    if (strlen($charset) == 0) {
                        $charset = Arr::exist($matches, 3)
                            ? $matches[3]
                            : null;
                    }
                }
            }
        } else {
            $content = $result;
        }

        return array($content, $mimetype, $charset);
    }

    /**
     * Is the given string a URL?
     *
     * @param string $str An arbitrary string
     *
     * @return bool
     */
    private function _isURL($str)
    {
        $regexp = '#^https?://([-\w\.]+)+(:\d+)?(/([\w/_\.]*(\?\S+)?)?)?#';
        return preg_match($regexp, $str) > 0;
    }
}
