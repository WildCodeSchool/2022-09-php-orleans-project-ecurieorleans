<?php

namespace App\Controller;

class MentionLegaleController extends AbstractController
{
    public function index()
    {
        return $this->twig->render("MentionsLegale/MentionsLegale.html.twig");
    }
}
