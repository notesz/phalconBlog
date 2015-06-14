<?php

use Phalcon\Mvc\Model;

class Blog extends Model
{
    const SOURCE  = 'blog_posts';

    public function initialize()
    {
        $this->setSource(self::SOURCE);
    }

    public function getSource()
    {
        return self::SOURCE;
    }

    public static function getPost()
    {
        $posts = array();
        $items = Blog::find(
            array(
                'order' => 'public_date DESC'
            )
        );

        foreach ($items as $item) {
            $posts[$item->id] = array(
                'id'          => $item->id,
                'title'       => $item->title,
                'lead'        => $item->lead,
                'content'     => $item->content,
                'public_date' => $item->public_date
            );
        }

        return $posts;
    }

}
