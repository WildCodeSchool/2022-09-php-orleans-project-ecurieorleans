<?php

namespace App\Controller;

use App\Model\EventManager;

class HomeController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        $eventManager = new EventManager();
        $events = $eventManager->selectAllEventsWithSections();
        // var_dump($events);
        //exit();
        return $this->twig->render(
            'Home/index.html.twig',
            ['events' => $events,]
        );
    }
}
