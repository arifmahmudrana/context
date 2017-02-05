<?php
/**
 * Created by PhpStorm.
 * User: rana
 * Date: 2/5/17
 * Time: 2:58 PM
 */

namespace ArifMahmudRana\Context;


use ArifMahmudRana\Context\Exceptions\CannotInstantiateClassExceptions;
use InvalidArgumentException;

class ContextContainer
{
    private static $data = [];

    /**
     * ContextContainer constructor.
     */
    public function __construct()
    {
        throw new CannotInstantiateClassExceptions("Can't instantiate " . get_class($this));
    }

    public static function set($key, $value)
    {
        static::$data[static::normalizeKey($key)] = $value;
        return true;
    }

    public static function has($key)
    {
        return isset(static::$data[static::normalizeKey($key)]);
    }

    public static function get($key, $default = null)
    {
        return isset(static::$data[static::normalizeKey($key)]) ? static::$data[static::normalizeKey($key)] : $default;
    }

    public static function remove($key)
    {
        unset(static::$data[static::normalizeKey($key)]);
        return true;
    }

    public static function all()
    {
        return static::$data;
    }

    protected static function normalizeKey($key)
    {
        if (!is_string($key))
            throw new InvalidArgumentException("key must be string");
        return $key;
    }
}