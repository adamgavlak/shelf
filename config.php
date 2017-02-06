<?php
/**
 * Created by PhpStorm.
 * User: gavlak
 * Date: 06/02/17
 * Time: 12:45
 */

return [
    'database' => [
        'name' => 'web',
        'username' => 'root',
        'password' => 'root',
        'connection' => 'mysql:host=127.0.0.1',
        'port' => '8889',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];