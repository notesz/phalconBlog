<?php

use Phalcon\Paginator\Adapter\NativeArray as PaginatorArray;
use Phalcon\Http\Request;

class BlogController extends ControllerBase
{

    protected $blog;

    protected $request;

    public function initialize() {
        $this->blog = new Blog();
        $this->request = new Request();
    }

    public function getPosts() {
        if ($this->redis->get('posts') === null) {
            $posts = $this->blog->getPost();

            $this->redis->save('posts', $posts);

            return posts;
        }

        return $this->redis->get('posts');
    }

    public function indexAction() {

        $posts = $this->getPosts();

        $paginator = new PaginatorArray(
            array(
                'data'  => $posts,
                'limit' => 10,
                'page'  => $this->request->get('page')
            )
        );

        $this->view->setVar('posts', $paginator->getPaginate()->items);

        $this->view->setVar('pager', array(
            'before'      => $paginator->getPaginate()->before,
            'next'        => $paginator->getPaginate()->next,
            'first'       => $paginator->getPaginate()->first,
            'last'        => $paginator->getPaginate()->last,
            'current'     => $paginator->getPaginate()->current,
            'total_pages' => $paginator->getPaginate()->total_pages,
        ));
    }

    public function postAction() {
        $posts = $this->getPosts();

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
