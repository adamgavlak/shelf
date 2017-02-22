<?php
/**
 * Created by PhpStorm.
 * User: gavlak
 * Date: 06/02/17
 * Time: 16:49
 */

namespace App\Controllers;

use App\Core\Input;
use App\Core\App;

class SignupController
{
    public function new()
    {
        return view('signups/new');
    }

    public function create()
    {
        App::get('db')->insert('users', [
            'email' => Input::get('email'),
            'password_digest' => password_hash(Input::get('password'), PASSWORD_BCRYPT),
            'username' => Input::get('username')
        ]);

        redirect('login');
    }
}