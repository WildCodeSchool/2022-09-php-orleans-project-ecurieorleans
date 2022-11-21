<?php

namespace App\Controller;

use App\Model\FormManager;
use App\Model\SectionManager;

class FormController extends AbstractController
{
    public function contact()
    {
        $sectionManager = new SectionManager();
        $sections = $sectionManager->selectAll();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errors = $this->errors($sections);
            if (empty($errors)) {
                echo 'Votre message à bien été envoyé';
                $formView = new formManager();
                $formView->Insert();
                header('Location: /contact');
            }
            return $this->twig->render('/Contact/form.html.twig', ['errors' => $errors]);
        }
        return $this->twig->render('/Contact/form.html.twig', ['sections' => $sections]);
    }


    public function errors(array $sections): array
    {
        $contact = array_map('trim', $_POST);
        $errors = [];
        $maxNameLength = 255;
        $maxEmailLength = 255;
        $maxMessageLength = 255;

        if (empty($contact['name'])) {
            $errors[] = 'Votre nom est obligatoire.';
        } elseif (strlen($contact['name']) > $maxNameLength) {
            $errors[] = 'Votre nom doit faire moins de ' . $maxNameLength . ' caractères.';
        }
        if (empty($contact['email'])) {
            $errors[] = 'Votre email est obligatoire.';
        } elseif (strlen($contact['email']) > $maxEmailLength) {
            $errors[] = 'Votre email doit faire moins de ' . $maxEmailLength . ' caractères.';
        } elseif (!filter_var($contact['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Le format d\'email est incorrect.';
        }
        if (empty($contact['message'])) {
            $errors[] = "Votre message est obligatoire.";
        } elseif (strlen($contact['message']) > $maxMessageLength) {
            $errors[] = 'Votre message doit faire moins de ' . $maxMessageLength . ' caractères.';
        }

        $subjectError = $this->subjectError($sections, $contact);
        if (!empty($subjectError)) {
            $errors = array_merge($errors, $subjectError);
        }

        return $errors;
    }

    private function subjectError(array $sections, array $contact): array
    {
        $select = [];
        $subjectError = [];
        foreach ($sections as $section) {
            $select[] = $section['id'];
        }
        $select[] = 'other';

        if (!in_array($contact['subject'], $select)) {
            $subjectError[] = "Veuillez sélectionner un sujet valide.";
        }

        return $subjectError;
    }
}
