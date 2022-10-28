<?php

namespace App\Controller;


use App\Model\AssociationManager;
use App\Model\EventManager;


class HomeController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        $associationManager = new AssociationManager();
        $association = $associationManager->selectOne();
        $eventManager = new EventManager();
        $events = $eventManager->selectAll();
        return $this->twig->render('Home/index.html.twig', ["association" => $association, 'events' => $events);
     }
}
