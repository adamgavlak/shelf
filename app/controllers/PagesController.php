<?php
/**
 * Created by PhpStorm.
 * User: gavlak
 * Date: 06/02/17
 * Time: 13:01
 */

namespace App\Controllers;

use App\Core\App;
use App\Core\Input;

class PagesController
{
    public function index()
    {
        $users = App::get('db')->all('users');
        return view('index', ["users" => $users]);
    }

    public function create()
    {
        App::get('db')->insert("users", [
            "username" => Input::get('username'),
            "email" => Input::get('email')
        ]);

        redirect("");
    }
}