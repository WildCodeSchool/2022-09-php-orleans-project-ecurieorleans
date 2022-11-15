<?php

namespace App\Controller;

use App\Model\SectionManager;

class AdminSectionController extends AbstractController
{
    private const INPUT_MAX_LENGHT = 25;

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
        $errors = [];
        $sectionManager = new SectionManager();
        $section = $sectionManager->selectOneById($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sectionUpdated = array_map('trim', $_POST);
            $errors = $this->checkErrors($sectionUpdated);
            if (empty($errors)) {
                $sectionManager->update($section);
                header('Location: /admin/sports/edit?id=' . $id);

                return null;
            }
        }

        return $this->twig->render('AdminSports/adminEditSports.twig', [
            'section' => $section,
            'errors' => $errors,
        ]);
    }

    private function checkErrors(array $sectionUpdated): array
    {
        $errors = [];
        if (empty($sectionUpdated['name'])) {
            $errors[] = 'Le nom de la section est obligatoire.';
        }

        if (empty($sectionUpdated['presentation'])) {
            $errors[] = 'La présentation de la section est obligatoire.';
        }

        if (strlen($sectionUpdated['name']) > self::INPUT_MAX_LENGHT) {
            $errors[] = 'Le nom de la section doit faire moins de ' . self::INPUT_MAX_LENGHT . ' caractères.';
        }

        return $errors;
    }
}
