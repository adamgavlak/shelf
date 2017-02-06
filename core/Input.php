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
    protected static $data;

    public static function process($requestType)
    {
        if ($requestType == 'GET')
        {
            $request = $_GET;
        }
        elseif ($requestType == 'POST')
        {
            $request = $_POST;
        }

        $data = [];

        foreach ($request as $key => $value)
        {
            if ($requestType == 'GET') {
                $data[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            } elseif ($requestType == 'POST') {
                $data[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }
        }

        static::$data = $data;
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
}