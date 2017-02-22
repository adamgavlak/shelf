<?php
/**
 * Created by PhpStorm.
 * User: gavlak
 * Date: 06/02/17
 * Time: 16:36
 */

namespace App\Controllers;

use App\Core\Input;
use App\Core\App;
use App\Core\Session;

class SessionsController
{
    public function new()
    {
        return view('sessions/new');
    }

    public function create()
    {
        $user = App::get('db')->findBy('users', 'email', Input::get('email'))[0];

        if (password_verify(Input::get('password'), $user->password_digest))
        {
            Session::set('user_id', $user->id);
            redirect('');
        }
        else
        {
            return view('sessions/new');
        }
    }

    public function destroy()
    {
        Session::set('user_id', null);

        redirect('');
    }
}