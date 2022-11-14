<?php

namespace App\Controller;

use App\Model\SectionManager;

class AdminSectionController extends AbstractController
{
    public function index(): string
    {
        $sectionManager = new SectionManager();
        $sections = $sectionManager->selectAll('id');
        return $this->twig->render(
            'AdminSports/adminSports.html.twig',
            ['sections' => $sections]
        );
    }
}
