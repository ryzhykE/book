<?php


namespace app\controllers;


use app\models\User;
use myforum\core\base\AController;
use myforum\core\Validator;

class RegisterController extends AController
{
    /**
     * display register form
     * register user
     */
    public function index()
    {
        $this->view->title = 'Register';
        if(isset($_SESSION['loget_user']))
        {
            header("Location: /admin"); exit();
        }
        else
            {
                if(isset($_POST['submit'])) {

                    $err = array();
                    if(! Validator::validName($_POST['login'])) {
                        $err[] = "Логин должен быть не меньше 3-х символов";
                    }

                    $loginIsset = User::findUser($_POST['login']);
                    if($loginIsset->count > 0) {
                        $err[] = "Пользователь с таким логином уже существует";
                    }

                    if(! Validator::validPassword($_POST['password'])) {
                        $err[] = "Введите корректный пароль";
                    }

                    if(! Validator::validEmail($_POST['email'])) {
                        $err[] = "Введите не корректный email";
                    }

                    if(count($err) == 0) {
                        $user = new User();
                        $user->login = $_POST['login'];
                        $user->email = $_POST['email'];
                        $user->password = md5(md5(trim($_POST['password'])));
                        $user->save();
                        header("Location: /login"); exit();
                    }

                    else

                    {
                        $this->view->errors = $err;
                    }

                }

            }

        $this->view->display(APP. '/views/register.php');
    }

}