<?php

class BlogController extends ControllerBase
{

    protected $blog;

    public function initialize() {
        $this->blog = new Blog();
    }

    public function indexAction() {
        $this->view->setVar('posts', $this->blog->getPost());
    }

    public function postAction() {
        $posts = $this->blog->getPost();
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
