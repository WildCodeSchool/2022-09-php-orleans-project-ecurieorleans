<?php

namespace App\Controller;

use App\Model\SectionManager;

class AdminSectionController extends AbstractController
{
    private const INPUT_MAX_LENGHT = 25;
    private const MAX_FILE_SIZE = 200000;
    private const AUTHORIZED_EXTENSIONS = ['image/jpg', 'image/jpeg', 'image/webp', 'image/png', 'image/gif'];
    public const UPLOADS_DIR_LOCATION =  './assets/uploads/';


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
            $sectionErrors = $this->checkErrors($sectionUpdated);
            $file =  array_map('trim', $_FILES['header']);
            $fileErrors = $this->checkFilesErrors($file);
            $errors = array_merge($sectionErrors, $fileErrors);

            if (empty($errors)) {
                if (empty($file['name'])) {
                    $uniqueFileName = $section['header'];
                } else {
                    $uniqueFileName = uniqid() . $file['name'];
                }
                move_uploaded_file($file['tmp_name'], self::UPLOADS_DIR_LOCATION . $uniqueFileName);
                $sectionManager->update($sectionUpdated, $uniqueFileName);

                header('Location: /admin/sports');

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

    private function checkFilesErrors(array $file): array
    {
        $fileErrors = [];
        $extensions = [];

        if ($file['size'] > self::MAX_FILE_SIZE) {
            $fileErrors[] = 'L\'image doit faire moins de ' . self::MAX_FILE_SIZE / 1000 . ' Ko.';
        }

        foreach (self::AUTHORIZED_EXTENSIONS as $extension) {
            $extension = substr($extension, 6);
            $extensions[] = $extension . ' ';
        }
        if (!empty($file['tmp_name'])) {
            $mime = mime_content_type($file['tmp_name']);
        } else {
            $mime = null;
        }

        if (!empty($file['name'])) {
            if ($file['error'] != 0) {
                $fileErrors[] = 'Problème de chargement de l\'image.';
            }
            if (!in_array($mime, self::AUTHORIZED_EXTENSIONS)) {
                $fileErrors[] = 'Le fichier doit être de type ' . implode(',', $extensions) . '.';
            }
        }

        return $fileErrors;
    }
}
