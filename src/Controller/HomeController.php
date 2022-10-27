<?php

namespace App\Controller;

use App\Model\CardManager as Card;

class HomeController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        $selectCards = new Card();
        $cards = $selectCards->selectAll();
        return $this->twig->render('Home/index.html.twig', ['cards' => $cards]);
    }
}
