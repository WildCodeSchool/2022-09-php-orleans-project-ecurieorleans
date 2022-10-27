<?php

namespace App\Controller;

use App\Model\AssociationManager;
use App\Model\AssociationsManager as Associations;

class HomeController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        $associationManager = new AssociationManager();
        $association = $associationManager->selectOne();

        return $this->twig->render('Home/index.html.twig', ["association" => $association]);
    }
}
