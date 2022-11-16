<?php

namespace App\Controller;

use App\Model\LoginManager;

class LoginController extends AbstractController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $informationUser = array_map('trim', $_POST);
            $loginManager = new LoginManager();
            $user = $loginManager->selectOneByEmail($informationUser['email']);
            if ($user && password_verify($informationUser['password'], $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                header('Location: /admin');
                return "";
            } else {
                header('Location: /admin/login');
                return "";
            }
        }
        return $this->twig->render("Login/Login.html.twig");
    }
}
