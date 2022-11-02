<?php

namespace App\Controller;

class EventAdminController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        return $this->twig->render('EventAdmin/EventAdmin.html.twig');
    }
}
