<?php

namespace App\Controller;

use App\Model\SectionManager;

class SectionController extends AbstractController
{
    public function section(int $id): string
    {
        $sectionManager = new SectionManager();
        $section = $sectionManager->selectOneById($id);

        return $this->twig->render('Section/section.html.twig', ['section' => $section]);
    }
}
