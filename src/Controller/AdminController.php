<?php

namespace App\Controller;

class AdminController extends AbstractController
{
    public function index(): string
    {
        if (!$this->user) {
            echo 'Unauthorized access';
            header('HTTP/1.1 401 Unauthorized');
            return "";
        }
        return $this->twig->render('Administration/home_admin.html.twig');
    }
}
