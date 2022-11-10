<?php

namespace App\Controller;

use App\Model\FormManager;

class FormController extends AbstractController
{
    public function contact()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errors = $this->errors();
            if (empty($errors)) {
                echo 'Votre message à bien été envoyer';
                $formView = new formManager();
                $formView->Insert();
                header('Location: /contact');
            }
            return $this->twig->render('/Item/_form.html.twig', ['errors' => $errors]);
        }
        return $this->twig->render('/Item/_form.html.twig');
    }


    public function errors()
    {
        $contact = array_map('trim', $_POST);
        $errors = [];
        $maxNameLength = 255;
        $maxEmailLength = 255;
        $maxMessageLength = 255;
        $select = ['Auto', 'Moto', 'HandiCar', 'Mécasport', 'Question', 'Other'];

        if (empty($contact['name'])) {
            $errors[] = 'Votre nom est obligatoire';
        } elseif (strlen($contact['name']) > $maxNameLength) {
            $errors[] = 'Votre nom doit faire moins de ' . $maxNameLength . ' caractères';
        }
        if (empty($contact['email'])) {
            $errors[] = 'Votre email est obligatoire';
        } elseif (strlen($contact['email']) > $maxEmailLength) {
            $errors[] = 'Votre email doit faire moins de ' . $maxEmailLength . ' caractères';
        } elseif (!filter_var($contact['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Le format d\'email est incorrect';
        }
        if (empty($contact['message'])) {
            $errors[] = "Votre message est obligatoire";
        } elseif (strlen($contact['message']) > $maxMessageLength) {
            $errors[] = 'Votre message doit faire moins de ' . $maxMessageLength . ' caractères';
        }
        if (!in_array($contact['subject'], $select)) {
            $errors[] = "Veuillez séléctionner un sujet valide";
        }
        return $errors;
    }
}
