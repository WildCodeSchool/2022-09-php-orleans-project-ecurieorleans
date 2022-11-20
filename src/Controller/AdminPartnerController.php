<?php

namespace App\Controller;

use App\Model\PartnerManager;

class AdminPartnerController extends AbstractController
{
    public const MAX_INPUT_LENGTH = 255;
    public const UPLOADS_DIR_LOCATION = './assets/uploads/';

    public function index()
    {
        $partnerManager = new PartnerManager();
        $partners = $partnerManager->selectAll('name');
        return $this->twig->render('AdminPartner/AdminPartner.html.twig', ['partners' => $partners,]);
    }

    public function add(): string
    {
        $errors = $partner = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $partner = array_map('trim', $_POST);
            $partnerErrors = $this->validate($partner);

            $image = array_map('trim', $_FILES['logo']);


            $uploadErrors = $this->validateUpload($image);

            $errors = array_merge($partnerErrors, $uploadErrors);

            if (empty($errors)) {
                if (empty($image['name'])) {
                    $uniqName = null;
                } else {
                    $uniqName = uniqid() . $image['name'];
                }

                move_uploaded_file($image['tmp_name'], self::UPLOADS_DIR_LOCATION . $uniqName);
                $partnerManager = new PartnerManager();
                $partnerManager->insert($partner, $uniqName);

                header('Location:/admin/partenaires/');
                return '';
            }
        }

        return $this->twig->render('AdminPartner/addPartner.html.twig', [
            'errors' => $errors,
            'partner' => $partner,
        ]);
    }


    private function validate(array $partner): array
    {
        $errors = [];


        if (empty($partner['name'])) {
            $errors[] = 'Le nom du Partenaire est obligatoire';
        }
        if (!empty($partner)) {
            if (strlen($partner['name']) > self::MAX_INPUT_LENGTH) {
                $errors[] = 'Le nom du Partenaire doit faire moins de ' . self::MAX_INPUT_LENGTH . ' caractères';
            }

            if (empty($partner['URL'])) {
                $errors[] = 'L\'URL du Partenaire est obligatoire';
            }

            if (strlen($partner['URL']) > self::MAX_INPUT_LENGTH) {
                $errors[] = 'L\'URL du Partenaire doit faire moins de ' . self::MAX_INPUT_LENGTH . ' caractères';
            }

            if (!filter_var($partner['URL'], FILTER_VALIDATE_URL)) {
                $errors[] = 'Veuillez verifier le format de L\'URL';
            }
        }
        return $errors;
    }

    private function validateUpload(array $file): array
    {
        $errors = [];

        //image size 1Mo
        $maxFileSize = 1000000;
        if ($file['size'] > $maxFileSize) {
            $errors[] = 'Le fichier doit faire moins de ' . $maxFileSize / 1000000 .  'Mo.';
        }
        //extension
        $authorizedMimes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        if (!empty($file['tmp_name'])) {
            $mime = mime_content_type($file['tmp_name']);
        } else {
            $mime = null;
        }

        if (!empty($file['name'])) {
            if ($file['error'] != 0) {
                $errors[] = 'Problème de chargement de l\'image.';
            }
            if (!in_array($mime, $authorizedMimes)) {
                $errors[] = 'Le format doit être ' . str_replace('image/', '', implode(', ', $authorizedMimes));
            }
        }

        return $errors;
    }


    public function edit(int $id): string
    {
        $partnerManager = new PartnerManager();
        $partners = $partnerManager->selectOneById($id);
        return $this->twig->render('AdminPartner/AdminPartner.html.twig', ['partners' => $partners,]);
    }
}
