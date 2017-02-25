<?php
/**
 * Created by PhpStorm.
 * User: gavlak
 * Date: 24/02/17
 * Time: 02:21
 */

namespace App\Controllers;

use App\Core\Input;
use App\Core\App;

class UserController
{
    public function index()
    {
        $users = App::get('db')->all('users');
        var_dump($users);
    }

    public function show()
    {
//        $user = App::get('db')->findBy('users', 'id', Input::get('id'));
        var_dump(1);
    }
}