<?php
/**
 * Created by PhpStorm.
 * User: gavlak
 * Date: 06/02/17
 * Time: 12:44
 */

function view($name, $data = [])
{
    extract($data);

    return require "app/views/{$name}.view.php";
}

function redirect($path)
{
    header("Location: /{$path}");
}

function csrf_token()
{
    return \App\Core\Session::get('csrf_token');
}

function verify_csrf_token($csrf_token, $previous_csrf_token)
{
    if ($csrf_token != $previous_csrf_token)
    {
        throw new Exception("Invalid CSRF token.");
    }

    return true;
}

function h($string) {
    return htmlspecialchars($string);
}