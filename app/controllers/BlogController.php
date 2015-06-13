<?php

class BlogController extends ControllerBase
{

    public function indexAction() {
        $this->view->setVar('posts', Blog::getPost());
    }

    public function postAction() {
        $posts = Blog::getPost();
        $postId = $this->dispatcher->getParam('post_id');

        if (empty($posts[$postId])) {
            $this->dispatcher->forward(array(
                'controller' => 'error',
                'action'     => 'error404'
            ));
            return false;
        }

        $this->view->setVar('post', $posts[$postId]);
    }

}
