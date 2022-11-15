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

    public function edit(int $id): ?string
    {
        $sectionManager = new SectionManager();
        $section = $sectionManager->selectOneById($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $section = array_map('trim', $_POST);

            if (empty($errors)) {
                $sectionManager->update($section);
                header('Location: /admin/sports/edit?id=' . $id);
            }


            return null;
        }

        return $this->twig->render('AdminSports/adminEditSports.twig', ['section' => $section]);
    }

    private function checkErrorText()
    {
    }
    private function checkErrorFile()
    {
    }
}
