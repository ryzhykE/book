<?php

namespace app\controllers;

use app\models\User;
use myforum\core\base\AController;
use myforum\core\Validator;

class LoginController extends AController
{
    /**
     * display login form
     * check user
     */
    public function index()
    {
        $this->view->title = 'Login';
        if(isset($_SESSION['loget_user']))
        {
            header("Location: /admin"); exit();
        }
        else
        {
            $err = array();
            if(isset($_POST['submit']))
            {
                $res = User::findUserAuth($_POST['login']);
                if(isset($res->password) and $res->password == md5(md5($_POST['password']))){
                    $hash = md5(Validator::generateCode(10));
                    User::addHash($hash,$res->id);
                    $_SESSION['loget_user'] = $res;
                    header("Location: /admin"); exit();
                }
                else {
                    $err[] = "Не правильный логин или пароль";
                }
            }
            $this->view->errors = $err;
            $this->view->display(APP. '/views/login.php');
        }

    }

    /**
     * logout user
     */
    public function logout()
    {
        if(isset($_SESSION['loget_user'])) {
            unset($_SESSION['loget_user']);
            header("Location: /"); exit();
        }



    }

}