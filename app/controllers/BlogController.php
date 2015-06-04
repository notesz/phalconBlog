<?php

class BlogController extends BaseController
{

    public function indexAction() {
        $this->response->setContent('Hello World!');
    }

    public function postAction() {
        $postId = $this->dispatcher->getParam('post_id');

        if ($postId == 33) {
            $this->dispatcher->forward(array(
                'controller' => 'error',
                'action'     => 'error404'
            ));
            return false;
        }

        $this->view->setVar('postId', $postId);
    }

}
