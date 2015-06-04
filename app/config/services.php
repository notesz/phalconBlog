<?php

use \Phalcon\DI\FactoryDefault;
use \Phalcon\Mvc\Router;
use \Phalcon\Mvc\Url as UrlProvider;
use \Phalcon\Mvc\View;
use \Phalcon\Session\Adapter\Files as Session;

$di = new FactoryDefault();

$di->set('router', function() {
    $router = new Router(false);
    $router->removeExtraSlashes(true);
    require __DIR__ . '/routes.php';
    return $router;
});

$di->set('url', function() {
    $url = new UrlProvider();
    return $url;
});

$di->set('view', function() use ($config) {
    $view = new View();
    $view->setViewsDir($config->phalcon->viewsDir);
    return $view;
});

$di->set('session', function() {
    $session = new Session();
    $session->start();
    return $session;
});
