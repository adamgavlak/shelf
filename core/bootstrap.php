<?php
/**
 * Created by PhpStorm.
 * User: gavlak
 * Date: 06/02/17
 * Time: 12:41
 */

use App\Core\App;
use App\Core\Database\{QueryBuilder, Connection};
use App\Core\Session;

Session::start();

try {
    Session::set('previous_csrf_token', Session::get('csrf_token'));
} catch (Exception $e) {
    //
}

Session::set('csrf_token', App::generateCSRFToken());

App::bind('config', require 'config.php');

App::bind('db', new QueryBuilder(
    Connection::make(App::get('config')['database'])
));