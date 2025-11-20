<?php

namespace Kucil\Utilities\ObjectUtils\Core;

use Kucil\Utilities\ObjectUtils\Contracts\ObjectInterface;

use function get_object_vars;
use function is_object;

/**
 * @author  Menyong Menying <menyongmenying.main@gmail.com>
 * 
 * @version 0.0.1
 * 
 * 
 * 
 */
abstract class ObjectCore implements ObjectInterface
{
    /**
     * @see ObjectUtilsTest::testIsObject()
     * 
     * 
     * 
     */
    public static function isObject(mixed $object = null): ?bool
    {
        return is_object($object);
    }



    /**
     * @see ObjectUtilsTest::testIsEmpty()
     * 
     * 
     * 
     */
    public static function isEmpty(?object $object = null): ?bool
    {
        if ($object === null) {
            return null;
        }

        return empty(get_object_vars($object));
    }



    /**
     * @see ObjectUtilsTest::testToArr()
     * 
     * 
     * 
     */
    public static function toArr(?object $object = null): ?array
    {
        if ($object === null) {
            return null;
        }

        return get_object_vars($object);
    }



    /**
     * @see ObjectUtilsTest::testToArray()
     * 
     * 
     * 
     */
    public static function toArray(?object $object = null): ?array
    {
        return self::toArr($object);
    }
}
