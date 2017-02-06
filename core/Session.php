<?php
/**
 * Created by PhpStorm.
 * User: gavlak
 * Date: 06/02/17
 * Time: 12:55
 */

namespace App\Core;

use Exception;

class Session
{
    public static function start()
    {
        session_start();
    }

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        if (! array_key_exists($key, $_SESSION)) {
            throw new Exception("Key {$key} does not exist in session");
        }

        return $_SESSION[$key];
    }
}