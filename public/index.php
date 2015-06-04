<?php

use \Phalcon\Mvc\Application;
use \Phalcon\Exception;

error_reporting(E_ALL);

try {
    require __DIR__ . '/../app/config/config.php';
    require __DIR__ . '/../app/config/loader.php';
    require __DIR__ . '/../app/config/services.php';

    $application = new Application();
    $application->setDI($di);

    print $application->handle()->getContent();

} catch (Exception $e) {
    print $e->getMessage();
} catch (PDOException $e){
    print $e->getMessage();
}
