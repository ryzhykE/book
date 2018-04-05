<?php
/**
 * Created by PhpStorm.
 * User: evgeniy
 * Date: 05.04.2018
 * Time: 16:07
 */

namespace app\controllers;


use app\models\Post;
use myforum\core\base\AController;
use myforum\core\Validator;

class AdminController extends AController
{
    /**
     * display main admin page
     */
    public function index()
    {
        $this->view->title = 'Aдминка';
        $posts = Post::findAll();
        if(isset($_SESSION['loget_user']))
        {
            $this->view->posts = $posts;
            $this->view->display(APP.  '/views/admin.php');
        }
        else
        {
            header("Location: /register"); exit();
        }
    }

    /**
     * add post in db
     */
    public function addPost()
    {
        $this->view->title = 'Add post';
        if(isset($_POST['submit'])) {
            $err = array();
            if(! Validator::validText($_POST['title']))
            {
                $err[] = "Заголовок должен быть не меньше 3-х символов";
            }
            if(! Validator::validDescript($_POST['description']))
            {
                $err[] = "Описание должен быть не меньше 3-х символов";
            }
            if(! Validator::validText($_POST['text']))
            {
                $err[] = "Текст должен быть не меньше 3-х символов";
            }
            if(count($err) == 0) {
                $article = new Post();
                $article->author_id = $_SESSION['loget_user']->id;
                $article->title = $_POST['title'];
                $article->description = $_POST['description'];
                $article->text = $_POST['text'];
                if (!empty($_FILES['img']['error'])) {
                    $err[] = "Большой размер изображения";
                }
                if (!move_uploaded_file($_FILES['picture']['tmp_name'], 'img/' . $_FILES['picture']['name'])) {
                    $err[] = "Ошибка загрузки изображения";
                }
                $article->img = $_FILES['picture']['name'];
                $article->save();
                header("Location: /"); exit();
            }
            else

            {
                $this->view->errors = $err;
            }
        }
        $this->view->display(APP.  '/views/addpost.php');

    }

    /**
     * update post
     * @param $id
     */
    public function updatePost($id)
    {
        $this->view->title = 'Update post';
        $article = Post::findByid($id);
        $this->view->article = $article;

        if(isset($_POST['submit'])) {
            $err = array();
            if (!Validator::validText($_POST['title'])) {
                $err[] = "Заголовок должен быть не меньше 3-х символов";
            }
            if (!Validator::validDescript($_POST['description'])) {
                $err[] = "Описание должен быть не меньше 3-х символов";
            }
            if (!Validator::validText($_POST['text'])) {
                $err[] = "Текст должен быть не меньше 3-х символов";
            }
            if (count($err) == 0) {
                $article = new Post();
                $article->id = $id;
                $article->author_id = $_SESSION['loget_user']->id;
                $article->title = $_POST['title'];
                $article->description = $_POST['description'];
                $article->text = $_POST['text'];
                if (!empty($_FILES['img']['error'])) {
                    $err[] = "Большой размер изображения";
                }
                if (!move_uploaded_file($_FILES['picture']['tmp_name'], 'img/' . $_FILES['picture']['name'])) {
                    $err[] = "Ошибка загрузки изображения";
                }
                $article->img = $_FILES['picture']['name'];
                $article->save();
                header("Location: /");
                exit();
            } else {
                $this->view->errors = $err;
            }
        }

        $this->view->display(APP.  '/views/updatepost.php');

    }

    /**
     * delete post
     * @param $id
     */
    public function deletePost($id)
    {
        $article= new Post();
        $article->id = $id;
        if (isset($id)) {
            $article->delete();
            header('Location: /admin');
        }
    }

}