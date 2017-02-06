<?php
/**
 * Created by PhpStorm.
 * User: gavlak
 * Date: 06/02/17
 * Time: 12:28
 */

namespace App\Core;

use Exception;

class Router
{
    public $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function load($file)
    {
        $router = new static;

        require $file;

        return $router;
    }

    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $requestType)
    {
        if ($requestType == 'POST')
        {
            verify_csrf_token($_POST['_csrf_token'], Session::get('previous_csrf_token'));
        }

        if (array_key_exists($uri, $this->routes[$requestType]))
        {
            return $this->callAction(
                ...explode('#', $this->routes[$requestType][$uri])
            );
        }

        throw new Exception('No route defined for this URI.');
    }

    public function callAction($controller, $action)
    {
        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller;

        if (! method_exists($controller, $action))
        {
            throw new Exception("{$controller} does not have a {$action} action.");
        }

        return $controller->$action();
    }
}