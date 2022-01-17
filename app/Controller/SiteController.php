<?php

namespace App\Controller;

use App\Core\BaseController;
use App\Core\Pimp;
use App\Model\User;

class SiteController extends BaseController
{
    // action<$actionName>()

    public function actionIndex()
    {
        if (!empty($_SESSION['user_id']))
        {
            echo 'Авторизован';
        }
        else
        {
            echo 'Не авторизован';
        }

        $this->renderTwig('index');
    }

    public function actionLogin()
    {
        $error = null;

        if (!empty($_POST))
        {
            $login = $_POST['login'] ?? null;
            $pass  = $_POST['password'] ?? null;


            $user = User::findByEmail($login);

            if ($user)
            {
                if ($user->password === $pass)
                {
                    $_SESSION['user_id'] = $user->id;

                    header('Location: /');
                    return null;
                }
                else
                {
                    $error = "Пароль $pass не верный.";
                }
            }
            else
            {
                $error = "Пользователя с логином $login не существует.";
            }
        }

        $this->renderTwig('login', [
            'error' => $error,
        ]);
    }

    public function actionRegistration()
    {
        $error = null;

        if( ! empty($_POST))
        {
            $email = $_POST['email'] ?? null;
            $pass  = $_POST['password'] ?? null;
            $confirmPassword = $_POST['confirmPassword'] ?? null;

            if(($email && $pass && $confirmPassword) == null)
            {
                $error = 'Что-то пошло не так.';
            }
            elseif ($pass != $confirmPassword)
            {
                $error = 'Пароли не совпадают.';
            }
            elseif( ! filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $error = "E-mail адрес $email указан неверно.";
            }
            else
            {
                $reg = User::registrationUser($email,$pass);
                if($reg == true)
                {
                    header('Location: /site/login');
                }
            }
        }

        $this->renderTwig('registration', [
            'error' => $error,
        ]);
    }
}
