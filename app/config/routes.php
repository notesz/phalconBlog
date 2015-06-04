<?php

// 404
$router->notFound(
    array(
        'controller' => 'error',
        'action'     => 'error404'
));

// home
$router->add(
    '/', 
    array(
        'controller' => 'blog',
        'action'     => 'index'
    )
)->setName('home');

// blog post view
$router->add(
    '/post/{post_id}',
    array(
        'controller' => 'blog',
        'action'     => 'post'
    )
)->setName('blog-post-view');
