<?php

namespace App\Controller;

use App\Model\EventManager;

class EventAdminController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        $eventManager = new EventManager();
        $events = $eventManager->selectAll();
        return $this->twig->render(
            'AdminEvent/AdminEvent.html.twig',
            ['events' => $events,]
        );
    }
}
