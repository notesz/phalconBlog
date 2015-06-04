<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Response;

class BaseController extends Controller
{

    protected $response;

    public function initialize() {
        $this->response = new Response();

        $this->response->setHeader('Cache-Control', 'private, max-age=0, must-revalidate');
        $this->response->setStatusCode(200, 'OK');
    }

    public function __destruct() {
        $this->response->send();
    }

}
