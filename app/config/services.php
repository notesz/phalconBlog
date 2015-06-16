<?php

use \Phalcon\DI\FactoryDefault;
use \Phalcon\Mvc\Router;
use \Phalcon\Mvc\Url as UrlProvider;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use \Phalcon\Mvc\View;
use \Phalcon\Session\Adapter\Files as Session;
use \Phalcon\Cache\Backend\Redis as Redis;
use \Phalcon\Cache\Frontend\Data as FrontendData;

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

$di->set('db', function () use ($config) {
    $db = new DbAdapter(array(
        'host'     => $config->database->host,
        'username' => $config->database->username,
        'password' => $config->database->password,
        'dbname'   => $config->database->dbname,
        'charset'  => $config->database->charset
    ));
    return $db;
});

$di->set('redis', function() use ($config) {
    $redis = new Redis(
        new FrontendData(array(
            'lifetime' => $config->redis->lifetime
        )),
        array(
            'host'       => $config->redis->host,
            'port'       => $config->redis->port,
            'persistent' => false
        )
    );
    return $redis;
});
