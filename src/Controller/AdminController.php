<?php

namespace App\Controller;

class AdminController extends AbstractController
{
    public function index(): string
    {

        $this->testAdmin();
        return $this->twig->render('Administration/home_admin.html.twig');
    }
}
