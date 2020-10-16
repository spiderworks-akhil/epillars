<?php
/**
 * This file is part of SoloProyectos common library.
 *
 * PHP Version 5.3
 *
 * @author  Gonzalo Chumillas <gchumillas@email.com>
 * @license https://github.com/soloproyectos-php/dom/blob/master/LICENSE The MIT License (MIT)
 * @link    https://github.com/soloproyectos-php/dom
 */
namespace soloproyectos\dom;
use \DOMDocument;
use \DOMElement;
use \DOMNode;

/**
 * Dom class.
 *
 * @package Dom
 * @author  Gonzalo Chumillas <gchumillas@email.com>
 * @license https://github.com/soloproyectos-php/dom/blob/master/LICENSE The MIT License (MIT)
 * @link    https://github.com/soloproyectos-php/dom
 */
class Dom
{
    /**
     * Escapes a text.
     *
     * For example:
     * ```php
     * echo Dom::escape("M & Em's"); // prints "M &amp;amp; Em's"
     * ```
     *
     * @param string $text A string
     *
     * @return string
     */
    public static function escape($text)
    {
        return htmlspecialchars($text);
    }

    /**
     * Gets a CDATA block.
     *
     * @param string $text Text
     *
     * @return string
     */
    public static function cdata($text)
    {
        // removes all non-printable characters, except the newline
        $text = preg_replace('/[^[:print:]\n]/', '', $text);

        $text = str_replace(array("<![", "]>"), array("&lt;![", "]&gt;"), $text);
        return "<![CDATA[$text]]>";
    }

    /**
     * Is a valid XML fragment?
     *
     * @param string      $xml XML fragment
     * @param DOMDocument $doc Document (not required)
     *
     * @return boolean
     */
    public static function isValidXmlFragment($xml, $doc = null)
    {
        if ($doc == null) {
            $doc = new DOMDocument("1.0", "ISO-8859-1");
        }

        $fragment = $doc->createDocumentFragment();
        @$fragment->appendXML($xml);
        $node = @$doc->appendChild($fragment);

        return $node !== false;
    }

    /**
     * Is a valid XML document?
     *
     * @param string      $xml XML document
     * @param DOMDocument $doc Document (not required)
     *
     * @return boolean
     */
    public static function isValidXml($xml, $doc = null)
    {
        if ($doc == null) {
            $doc = new DOMDocument("1.0", "ISO-8859-1");
        }

        // tries to load the document and gets the errors
        $useInternalErrors = libxml_use_internal_errors(true);
        $doc->loadXML($xml);
        $errors = libxml_get_errors();
        libxml_use_internal_errors($useInternalErrors);

        return count($errors) == 0;
    }

    /**
     * Gets the string representation of a node.
     *
     * @param DOMNode $node DOMNode object
     *
     * @return string
     */
    public static function dom2str($node)
    {
        $doc = $node instanceof DOMDocument? $node : $node->ownerDocument;
        return $doc->saveXML($node);
    }

    /**
     * Gets the previous sibling DOMElement object.
     *
     * @param DOMNode $node DOMNode object
     *
     * @return null|DOMElement
     */
    public static function getPreviousSiblingElement($node)
    {
        do {
            $node = $node->previousSibling;
        } while ($node && !($node instanceof DOMElement));
        return $node;
    }

    /**
     * Gets the next sibling DOMElement object.
     *
     * @param DOMNode $node DOMNode object
     *
     * @return null|DOMElement
     */
    public static function getNextSiblingElement($node)
    {
        do {
            $node = $node->nextSibling;
        } while ($node && !($node instanceof DOMElement));
        return $node;
    }

    /**
     * Gets child elements of a given node.
     *
     * This function returns all subnodes that are instance of DOMElement. It
     * ignores the rest of the subnodes.
     *
     * @param DOMNode $node DOMNode object
     *
     * @return array of DOMNode objects
     */
    public static function getChildElements($node)
    {
        $ret = array();
        $nodes = $node->childNodes;
        foreach ($nodes as $node) {
            if ($node instanceof DOMElement) {
                array_push($ret, $node);
            }
        }
        return $ret;
    }

    /**
     * Gets elements by tagname.
     *
     * This function returns all subnodes that have a given tagname.
     *
     * @param DOMElement $node    DOMElement object
     * @param string     $tagName Tag name
     *
     * @return array of DOMElement objects
     */
    public static function getElementsByTagName($node, $tagName)
    {
        $ret = array();
        $nodes = $node->getElementsByTagName($tagName);
        foreach ($nodes as $node) {
            if ($node instanceof DOMElement) {
                array_push($ret, $node);
            }
        }
        return $ret;
    }

    /**
     * Searches a node in a list.
     *
     * This function may return false, if the node was not found.
     *
     * @param DOMNode $node   DOMNode object
     * @param array   $items  List of DOMNode objects
     * @param integer $offset Offset (default is 0)
     *
     * @return false|integer
     */
    public static function searchNode($node, $items, $offset = 0)
    {
        $len = count($items);
        for ($i = $offset; $i < $len; $i++) {
            $item = $items[$i];
            if ($item->isSameNode($node)) {
                return $i;
            }
        }
        return false;
    }

    /**
     * Merges two lists of nodes in a single list.
     *
     * This function merges two list of nodes in a single list without repeating
     * nodes.
     *
     * @param array $items1 List of DOMNode objects
     * @param array $items2 List of DOMNode objects
     *
     * @return array of DOMNode objects
     */
    public static function mergeNodes($items1, $items2)
    {
        $ret = array();
        $items = array_merge($items1, $items2);
        $len = count($items);

        // collects non-repeated elements
        for ($i = 0; $i < $len; $i++) {
            $item = $items[$i];
            $position = Dom::searchNode($item, $items, $i + 1);
            if ($position === false) {
                array_push($ret, $item);
            }
        }
        
        return $ret;
    }
    
    /**
     * Sort nodes in the same order they appear in the document.
     * 
     * @param array $nodes List of DOMNode objects
     * 
     * @return array of DOMNode objects
     */
    public static function sortNodes($nodes)
    {
        // saves node paths
        foreach ($nodes as $node) {
            if (!isset($node->__path__)) {
                $node->__path__ = Dom::_getNodePath($node);
            }
        }

        // sorts elements in the same order they appear in the document
        usort(
            $nodes,
            function ($node0, $node1) {
                $path0 = $node0->__path__;
                $path1 = $node1->__path__;
                $count0 = count($path0);
                $count1 = count($path1);
                $len = min($count0, $count1);

                for ($i = 0; $i < $len; $i++) {
                    if ($path0[$i] != $path1[$i]) {
                        return $path0[$i] > $path1[$i];
                    }
                }

                return $count0 > $count1;
            }
        );
        
        // unsets __path__
        foreach ($nodes as $node) {
            unset($node->__path__);
        }
        
        return $nodes;
    }

    /**
     * Gets the node path.
     *
     * @param DOMNode $node Node
     *
     * @return integer[]
     */
    private static function _getNodePath($node)
    {
        $ret = array();
        $doc = $node->ownerDocument;
        $parentNode = $node->parentNode;

        while ($parentNode !== null && !$doc->isSameNode($parentNode)) {
            // gets the sibling position
            $pos = 0;
            foreach ($parentNode->childNodes as $i => $childNode) {
                if ($childNode->isSameNode($node)) {
                    $pos = $i;
                    break;
                }
            }

            array_unshift($ret, $pos);
            $node = $parentNode;
            $parentNode = $node->parentNode;
        }

        return $ret;
    }
}
