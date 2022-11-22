<?php

namespace App\Controller;

use App\Model\AdminManager;

class AdminController extends AbstractController
{
    public function index(): string
    {
        $this->testAdmin();
        $connection = new AdminManager();
        $admin = $connection->selectOneById(1);
        return $this->twig->render('Administration/home_admin.html.twig', ['admin' => $admin,]);
    }
}
