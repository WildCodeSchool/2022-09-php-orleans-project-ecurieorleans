<?php

namespace App\Controller;

use App\Model\Auto;

class AutoController extends AbstractController
{
    public function presentation()
    {
        $selectAuto = new Auto();
        $presentationAuto = $selectAuto->selectAll();
        return $this->twig->render('Home/Auto.html.twig', ['paragraph' => $presentationAuto]);
    }
}
