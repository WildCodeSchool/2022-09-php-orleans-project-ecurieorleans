<?php

namespace App\Controller;

class HandiCarController extends AbstractController
{
    public function handiCar(): string
    {
        return $this->twig->render('Handi-car/handiCar.html.twig');
    }
}
