<?php

namespace App\Controller;

use App\Model\EventAdminManager;
use DateTime;

class EventAdminController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        $errors =  [];
        $event = array_map('trim', $_POST);
        $errors = $this->errors($event);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (empty($errors[0])) {
                $addCard = new EventAdminManager();

                $addCard->addCard($event, $errors[1]);
                return $this->twig->render('EventAdmin/EventAdmin.html.twig');
            }
        }
        return $this->twig->render('EventAdmin/EventAdmin.html.twig', ['errors' => $errors[0]]);
    }

    public function errors(array $event,)
    {
        $tmp = [];
        $errors = [];
        $sport = ['Auto', 'Moto', 'Handicar', 'Mecasport'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authorizedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
            $extension = pathinfo($_FILES['eventImage']['name'], PATHINFO_EXTENSION);
            $maxFileSize = 200000;

            $uploadDir = 'public/assets/images';
            $uploadFile = $uploadDir . basename($_FILES['eventImage']['name']);

            if (empty($event['raceName'])) {
                $errors[] = "Le titre de course est obligatoire .";
            }
            $maxLengthRaceName = 255;
            if (strlen($event['raceName']) > $maxLengthRaceName) {
                $errors[] = "Le titre de la course est trop long max " . $maxLengthRaceName . ".";
            }
            if (array_key_exists($event['sportSelect'], $sport)) {
                $errors[] = "Le sport selectionné n'existe pas .";
            }
            if ((!in_array($extension, $authorizedExtensions))) {
                $errors[] = 'Veuillez sélectionner une image de type Jpg ou Jpeg ou Png ou WebP !';
            }
            if (
                file_exists($_FILES['eventImage']['tmp_name']) &&
                filesize($_FILES['eventImage']['tmp_name']) > $maxFileSize
            ) {
                $errors[] = "Votre fichier doit faire moins de 200ko !";
            }
            $tmp[] = $errors;
            $tmp[] = $_FILES['eventImage']['name'];
            if (empty($errors)) {
                move_uploaded_file($_FILES['eventImage']['name'], $uploadFile);
                return $tmp;
            }
        }
        return $tmp;
    }
}
