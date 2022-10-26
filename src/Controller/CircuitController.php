<?php

namespace App\Controller;

class CircuitController extends AbstractController
{
    public function circuit(): string
    {
        return $this->twig->render('Circuit/circuit.html.twig');
    }
}
