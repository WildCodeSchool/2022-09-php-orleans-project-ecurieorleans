<?php

namespace App\Controller;

use App\Model\AssociationManager;
use App\Model\EventManager;
use App\Model\SectionManager;

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
        $sectionManager = new SectionManager();
        $sections = $sectionManager->selectAll('id');
        $_SESSION['sections'] = $sections;
        return $this->twig->render('Home/index.html.twig', ["association" => $association, 'events' => $events, 'sections' => $_SESSION['sections']]);
    }
}
