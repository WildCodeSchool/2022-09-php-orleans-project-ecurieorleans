<?php

namespace App\Controller;

use App\Model\AutoManager;

class AutoController extends AbstractController
{
    public function presentation()
    {
        $selectAuto = new AutoManager();
        $presentationAuto = $selectAuto->selectAll();
        return $this->twig->render('Auto/Auto.html.twig', ['paragraphs' => $presentationAuto]);
    }
}
