<?php

class BlogController extends ControllerBase
{

    public function indexAction() {
        $posts = array(
            '30' => array(
                'title'       => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'lead'        => 'Suspendisse justo neque, mollis sed tincidunt non, hendrerit mollis elit. Curabitur maximus ex erat, nec lobortis nisl aliquam id. Sed velit odio, mollis nec arcu a, lobortis finibus ante. Vestibulum mollis sem eget elit scelerisque posuere. Fusce pharetra feugiat ante sed venenatis. Nullam volutpat, nunc in eleifend tincidunt, ex dui fermentum ipsum, non cursus nisl erat a augue. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.',
                'public_date' => 'September 24, 2014'
            ),
            '31' => array(
                'title'       => 'Pellentesque interdum faucibus velit id ullamcorper',
                'lead'        => 'usce dictum ligula odio, nec egestas neque dignissim vel. Integer orci felis, egestas ut feugiat vitae, suscipit eu ipsum. Pellentesque efficitur, nibh non hendrerit commodo, dui erat dictum purus, vel mollis nisi magna at augue. Vestibulum posuere sit amet risus semper aliquet. Mauris interdum nunc id est cursus, non varius ex luctus.',
                'public_date' => 'September 24, 2014'
            ),
            '32' => array(
                'title'       => 'Interdum et malesuada fames ac ante ipsum primis in faucibus',
                'lead'        => 'Donec mattis risus vel ante viverra cursus. Integer orci ex, vehicula ut eros nec, ornare ullamcorper tellus. Vestibulum vitae justo a nisi porta auctor. Donec at mi non ex posuere vulputate. Donec in lorem in dolor pharetra elementum vel et ante. Sed interdum tincidunt leo, id imperdiet felis suscipit at. Curabitur in rutrum lectus. Mauris nibh mauris, imperdiet in faucibus ut, vulputate nec orci.',
                'public_date' => 'September 24, 2014'
            ),
            '33' => array(
                'title'       => 'Curabitur porttitor bibendum semper',
                'lead'        => '404 page not found test. Nulla. Nulla iaculis gravida hendrerit. Ut auctor rhoncus turpis, id elementum purus scelerisque ac. Aenean semper nunc et elit egestas, placerat consequat tortor finibus. Curabitur turpis dui, malesuada quis dolor sit amet, aliquam cursus turpis. Proin et quam non metus mollis tincidunt eu at justo.',
                'public_date' => 'September 24, 2014'
            ),
            '34' => array(
                'title'       => 'Pellentesque habitant morbi tristique senectus et netus',
                'lead'        => 'Proin faucibus diam orci, id sollicitudin dui porttitor nec. Duis sollicitudin turpis a interdum convallis. Aenean egestas faucibus cursus. Sed eros purus, consequat sed tristique sed, bibendum eget arcu. Nam eu lacus mollis, suscipit erat eget, imperdiet ligula. Integer justo turpis, scelerisque nec ligula at, luctus efficitur ante.',
                'public_date' => 'September 24, 2014'
            )
        );

        $this->view->setVar('posts', $posts);
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
