<?php

use \Phalcon\Loader;

$loader = new Loader();

$loader->registerDirs(
    array(
        $config->phalcon->controllersDir,
        $config->phalcon->modelsDir,
        $config->phalcon->viewsDir
    )
)->register();
