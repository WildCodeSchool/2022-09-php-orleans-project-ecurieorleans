<?php

namespace App\Controller;

class HomeController extends AbstractController
{
    /**
     * Display home page
     */
    public function circuit(): string
    {
        return $this->twig->render('Home/index.html.twig');
    }
}
