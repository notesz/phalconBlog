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
    )
));
