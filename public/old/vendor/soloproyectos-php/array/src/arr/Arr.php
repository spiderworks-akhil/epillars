<?php
/**
 * This file is part of SoloProyectos common library.
 *
 * @author  Gonzalo Chumillas <gchumillas@email.com>
 * @license https://github.com/soloproyectos-php/array/blob/master/LICENSE The MIT License (MIT)
 * @link    https://github.com/soloproyectos-php/array
 */
namespace soloproyectos\arr;
use soloproyectos\arr\arguments\ArrArguments;
use soloproyectos\arr\arguments\ArrArgumentsDescriptor;

/**
 * Class Arr.
 *
 * @package Arr
 * @author  Gonzalo Chumillas <gchumillas@email.com>
 * @license https://github.com/soloproyectos-php/array/blob/master/LICENSE The MIT License (MIT)
 * @link    https://github.com/soloproyectos-php/array
 */
class Arr
{
    /**
     * Gets an attribute from a given array.
     *
     * @param array  $arr     Array object
     * @param string $name    Attribute name
     * @param mixed  $default Default value (default is null)
     *
     * @return mixed
     */
    public static function get($arr, $name, $default = null)
    {
        return array_key_exists($name, $arr)? $arr[$name] : $default;
    }

    /**
     * Sets an attribute.
     *
     * @param array  $arr   Array object (passed by reference)
     * @param string $name  Attribute name
     * @param mixed  $value Value
     *
     * @return void
     */
    public static function set(&$arr, $name, $value)
    {
        $arr[$name] = $value;
    }

    /**
     * Does the attribute exist?
     *
     * @param array  $arr  Array object
     * @param string $name Attribute name
     *
     * @return boolean
     */
    public static function exist($arr, $name)
    {
        return array_key_exists($name, $arr);
    }

    /**
     * Deletes an attribute.
     *
     * @param array  $arr  Array object (passed by reference)
     * @param string $name Attribute name
     *
     * @return void
     */
    public static function delete(&$arr, $name)
    {
        if (array_key_exists($name, $arr)) {
            unset($arr[$name]);
        }
    }

    /**
     * Appends or prepends an object into an array.
     *
     * @param array   $arr     Array object (passed by reference)
     * @param mixed   $obj     Object
     * @param boolean $prepend Inserts at the beginning (default is false)
     *
     * @return array
     */
    public static function add(&$arr, $obj, $prepend = false)
    {
        if ($prepend) {
            array_unshift($arr, $obj);
        } else {
            array_push($arr, $obj);
        }

        return $arr;
    }

    /**
     * Fetches elements from an array.
     *
     * This function is especially suitable for getting optional arguments.
     *
     * For example:
     * ```php
     * function test($title, $message, $x, $y, $options) {
     *      $args = Arr::fetch(func_get_args(), array(
     *          // `title` is a required string
     *          "title" => "string",
     *          // `message` is an optional string and has a default value
     *          "message" => array(
     *              "type" => "string",
     *              "default" => "Default message ..."
     *          ),
     *          // `x` is an optional string or number and has a default value
     *          "x" => array(
     *              "type" => "string|number",
     *              "default" => 0
     *          ),
     *          // `y` is an optional string or number and has a default value
     *          "y" => array(
     *              "type" => "string|number",
     *              "default" => 0
     *          ),
     *          // `options` is an optional array
     *          "options" => array(
     *              "type"  => "array",
     *              required => false
     *          )
     *      );
     *      print_r($args);
     * }
     * // this throws an InvalidArgumentException, as 'title' is required.
     * test(120, 250);
     * ```
     *
     * @param array $arr         Array of mixed elements
     * @param array $descriptors Associative array of descriptors.
     *
     * @throws InvalidArgumentException
     * @return array
     */
    public static function fetch($arr, $descriptors)
    {
        $args = new ArrArguments($arr);

        foreach ($descriptors as $name => $descriptor) {
            $types = array();
            $default = null;
            $required = false;

            if (is_string($descriptor)) {
                $types = explode("|", $descriptor);
            } elseif (is_array($descriptor)) {
                $types = explode("|", Arr::get($descriptor, "type"));
                $default = Arr::get($descriptor, "default");
                $required = Arr::get(
                    $descriptor, "required", !Arr::exist($descriptor, "default")
                );
            }

            $desc = new ArrArgumentsDescriptor($types, $default, $required);
            $args->registerDescriptor($name, $desc);
        }

        return $args->fetch();
    }
    
    /**
     * Is an associative array?
     * 
     * @param array $arr Array
     * 
     * @return boolean
     */
    public static function isAssociative($arr)
    {
        return array_keys($arr) !== range(0, count($arr) - 1);
    }
}
