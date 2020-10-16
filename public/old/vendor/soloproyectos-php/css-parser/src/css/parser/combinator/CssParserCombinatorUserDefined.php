<?php
/**
 * This file is part of Soloproyectos common library.
 *
 * @author  Gonzalo Chumillas <gchumillas@email.com>
 * @license https://github.com/soloproyectos/php.common-libs/blob/master/LICENSE BSD 2-Clause License
 * @link    https://github.com/soloproyectos/php.common-libs
 */
namespace soloproyectos\css\parser\combinator;
use \Closure;
use \DOMElement;
use soloproyectos\css\parser\exception\CssParserException;
use soloproyectos\css\parser\combinator\CssParserCombinator;

/**
 * Class CssParserCombinatorUserDefined.
 *
 * This class represents a filter in a CSS expression.
 *
 * @package Css\Parser\Combinator
 * @author  Gonzalo Chumillas <gchumillas@email.com>
 * @license https://github.com/soloproyectos/php.common-libs/blob/master/LICENSE BSD 2-Clause License
 * @link    https://github.com/soloproyectos/php.common-libs
 */
class CssParserCombinatorUserDefined extends CssParserCombinator
{
    /**
     * User defined function.
     * @var Closure
     */
    private $_userDefFunction;

    /**
     * Constructor.
     *
     * @param Closure $userDefFunction User defined function
     *
     * @return void
     */
    public function __construct($userDefFunction)
    {
        $this->_userDefFunction = $userDefFunction;
    }

    /**
     * Gets the child nodes.
     *
     * @param DOMElement $node    DOMElement object
     * @param string     $tagname Tag name
     *
     * @return array of DOMElements
     */
    public function filter($node, $tagname)
    {
        $userDefFunction = $this->_userDefFunction;
        $nodes = $userDefFunction($node, $tagname);

        if (!is_array($nodes)) {
            throw new CssParserException(
                "The user defined combinator is not an array"
            );
        }

        // excludes the items that are not elements
        $items = array();
        foreach ($nodes as $node) {
            if ($node instanceof DOMElement) {
                array_push($items, $node);
            }
        }

        return $items;
    }
}
