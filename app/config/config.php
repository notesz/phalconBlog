<?php

use Phalcon\Config;

$config = new Config(array(
    'phalcon' => array(
        'controllersDir' => __DIR__ . '/../controllers/',
        'modelsDir'      => __DIR__ . '/../models/',
        'viewsDir'       => __DIR__ . '/../views/',
    ),
    'database' => array(
        'host'     => 'phalcon.db',
        'username' => 'phalcontest',
        'password' => 'phalcontest',
        'dbname'   => 'phalcontest'
    ),
    'redis' => array(
        'host'     => '127.0.0.1',
        'port'     => 6379,
        'lifetime' => 60 // 1 hour
    )
));
