<?php

namespace App\Controller;

class ErrorController extends AbstractController
{
    public function index($error)
    {
        return $this->twig->render("/Error/Error.html.twig", ["error" => $error]);
    }
}
