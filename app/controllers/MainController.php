<?php
/**
 * Created by PhpStorm.
 * User: evgeniy
 * Date: 24.03.2018
 * Time: 8:00
 */

namespace app\controllers;


use app\models\Post;
use myforum\core\base\AController;
use myforum\core\Pagination;

class MainController extends AController
{
    /**
     * display main page
     * @param $page
     */
    public function index($page)
    {

        $this->view->title = 'Главная';
        $total = Post::getTotal();
        $pagination = new Pagination($total->count,$page,1);
        $this->view->pagination = $pagination;

        if (isset($page) and !empty($page)) {
            $news = Post::getOffset($page);
        } else {
            $news = Post::getOffset(1);
        }
        $this->view->post = $news;
        $this->view->display(APP. '/views/main.php');
    }

    /**
     * display one article
     * @param int $id
     */
    public function article(int $id)
    {
        $article = Post::findByid($id);
        $this->view->article = $article;
        $this->view->title = $article->title;
        $this->view->display(APP.  '/views/article.php');
    }

}