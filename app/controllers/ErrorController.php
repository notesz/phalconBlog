<?php

class ErrorController extends BaseController
{

    public function error404Action() {
        $this->response->setStatusCode(404, 'Not Found');
        $this->response->setContent('404. Page not found...');
    }

}
