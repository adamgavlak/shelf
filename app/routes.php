<?php
/**
 * Created by PhpStorm.
 * User: gavlak
 * Date: 06/02/17
 * Time: 12:49
 */

$router->get('', 'PagesController#index');
$router->post('', 'PagesController#create');

$router->get('login', 'SessionsController#new');
$router->post('login', 'SessionsController#create');

$router->get('sign-up', 'SignupController#new');
$router->post('sign-up', 'SignupController#create');

$router->get('logout', 'SessionsController#destroy');