<?php

namespace App\Controller;

use App\Model\AssociationManager;
use App\Model\EventManager;

class EventAdminController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        $errors =  [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $events = array_map('trim', $_POST);
            $errors = $this->errors1($events);
            $errors1 = $this->errors2($errors);
            var_dump($errors1);
            if (empty($errors[0])) {
                $addCard = new EventManager();
                $addCard->addCard($events, $errors1[1]);
                return $this->twig->render('AdminEvent/AdminEvent.html.twig');
            }
            return $this->twig->render(
                'AdminEvent/AdminEvent.html.twig',
                ['errors' => $errors[0], 'events' => $_POST]
            );
        }
        return $this->twig->render('AdminEvent/AdminEvent.html.twig');
    }

    public function errors1(array $event)
    {
        $tmp = [];
        $errors = [];
        $sport = ['Auto', 'Moto', 'Handicar', 'Mecasport'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($event['raceName'])) {
                $errors[] = "Le titre de course est obligatoire .";
            }
            if (empty($event['date'])) {
                $errors[] = "La date est obligatoire .";
            }
            $maxLengthRaceName = 255;
            if (strlen($event['raceName']) > $maxLengthRaceName) {
                $errors[] = "Le titre de la course est trop long max " . $maxLengthRaceName . ".";
            }
            if (array_key_exists($event['sportSelect'], $sport)) {
                $errors[] = "Le sport selectionné n'existe pas .";
            }
            $tmp[] = $errors;
            return $tmp;
        }
    }

    public function errors2(array $tmp)
    {
        $nameFile = $_FILES['eventImage']['tmp_name'];
        $tmp[] = $_FILES['eventImage']['name'];
        $uploadDir = './assets/uploads/';
        $uploadFile = $uploadDir . basename($tmp[1]);
        $authorizedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
        $extension = pathinfo($_FILES['eventImage']['name'], PATHINFO_EXTENSION);
        $maxFileSize = 200000;
        if ((!in_array($extension, $authorizedExtensions))) {
            $tmp[0][] = 'Veuillez sélectionner une image de type Jpg ou Jpeg ou Png ou WebP !';
        }
        if (file_exists($nameFile) && filesize($nameFile) > $maxFileSize) {
            $tmp[0][] = "Votre fichier doit faire moins de 200ko !";
        }
        if (file_exists($uploadFile)) {
            $tmp[0][] = "le fichier existe deja";
        } else {
            move_uploaded_file($nameFile, $uploadFile);
            return $tmp;
        }
        return $tmp;
    }
}
