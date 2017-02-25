<?php
/**
 * Created by PhpStorm.
 * User: gavlak
 * Date: 06/02/17
 * Time: 13:42
 */

namespace App\Core;

use Exception;

class Input
{
    protected static $data = [];
    protected static $method = 0; // INPUT_POST = 0, INPUT_GET = 1

    public static function process($requestType)
    {
        if ($requestType == 'GET')
            static::$method++;

        $params = (static::$method == 0) ? $_POST : $_GET;

        foreach ($params as $key => $value) {
            static::$data[$key] = filter_input(static::$method, $key, FILTER_SANITIZE_SPECIAL_CHARS);
        }
    }

    public static function get($key)
    {
        if (! array_key_exists($key, static::$data)) {
            throw new Exception("Key {$key} does not exist in Input");
        }

        return static::$data[$key];
    }

    public static function all()
    {
        return static::$data;
    }

    public static function add($params)
    {
        foreach ($params as $key => $value) {
            static::$data[$key] = filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);
        }
    }
}