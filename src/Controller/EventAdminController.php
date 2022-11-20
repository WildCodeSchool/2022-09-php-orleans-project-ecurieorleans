<?php

namespace App\Controller;

use App\Model\EventManager;

class EventAdminController extends AbstractController
{
    private const AUTHORIZED_EXTENSIONS = ['image/jpg', 'image/jpeg', 'image/webp', 'image/png', 'image/gif'];
    private const MAX_FILE_SIZE = 200000;
    public const UPLOADS_DIR_LOCATION =  './uploads/';

    public function index()
    {
        $eventsManager = new EventManager();
        $events = $eventsManager->selectAll();
        return $this->twig->render("AdminEvent/AdminEvent.html.twig", ['events' => $events]);
    }

    public function add(): string
    {
        $errors =  [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $events = array_map('trim', $_POST);
            $errorsForm = $this->errorsForm($events);
            $errorsFiles = $this->errorsFile();
            $errors = array_merge($errorsFiles, $errorsForm);
            if (empty($errors)) {
                if (empty($_FILES['eventImage']['name'])) {
                    $uniqueFiles = null;
                } else {
                    $uniqueFiles = uniqid() . $_FILES['eventImage']['name'];
                }
                move_uploaded_file($_FILES['eventImage']['tmp_name'], self::UPLOADS_DIR_LOCATION . $uniqueFiles);
                $addCard = new EventManager();
                $addCard->addCard($events, $uniqueFiles);
                header("Location: /admin/evenement");
            }
            return $this->twig->render(
                'AdminEvent/AddAdminEvent.html.twig',
                ['errors' => $errors, 'events' => $events]
            );
        }
        return $this->twig->render('AdminEvent/AddAdminEvent.html.twig');
    }

    public function edit(int $id): string
    {
        $errors =  [];
        $eventManager = new EventManager();
        $event = $eventManager->selectOneById($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $events = array_map('trim', $_POST);
            $errorsForm = $this->errorsForm($events);
            $errorsFiles = $this->errorsFile();
            $errors = array_merge($errorsFiles, $errorsForm);
            if (empty($errors)) {
                if (empty($_FILES['eventImage']['name'])) {
                    $uniqueFiles = null;
                } else {
                    $uniqueFiles = uniqid() . $_FILES['eventImage']['name'];
                }
                move_uploaded_file($_FILES['eventImage']['tmp_name'], self::UPLOADS_DIR_LOCATION . $uniqueFiles);
                $eventManager->update($events, $uniqueFiles, $event['id']);
                header("Location: /admin/evenement");
            }
            return $this->twig->render(
                'AdminEvent/AddAdminEvent.html.twig',
                ['errors' => $errors, 'events' => $events]
            );
        }
        return $this->twig->render('AdminEvent/EditAdminEvent.html.twig', ["event" => $event, "errors" => $errors]);
    }
    public function delete(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int) trim($_POST['id']);
            $eventManager = new EventManager();
            $imageName = $eventManager->selectOneById($id);
            unlink("uploads/" . $imageName['imgPath']);
            $eventManager->delete($id);

            header('Location:/admin/evenement');
        }
    }
    public function errorsForm(array $event)
    {
        $errors = [];
        $sport =  [];
        foreach ($this->sections as $section) {
            $sport[] = $section['id'];
        }
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
            $event['sportSelect'] = (int) $event['sportSelect'];
            if (!in_array($event['sportSelect'], $sport)) {
                $errors[] = "Le type de course selectionné n'existe pas .";
            }
            return $errors;
        }
    }

    public function errorsFile()
    {
        $errors = [];
        $extensions = [];
        $nameFile = $_FILES['eventImage']['tmp_name'];
        $extension = pathinfo($_FILES['eventImage']['name'], PATHINFO_EXTENSION);
        foreach (self::AUTHORIZED_EXTENSIONS as $extension) {
            $extension = substr($extension, 6);
            $extensions[] = $extension . ' ';
        }

        if (!empty($nameFile)) {
            $mime = mime_content_type($nameFile);
        } else {
            $mime = null;
        }

        if (!empty($nameFile)) {
            if ($_FILES['eventImage']['error'] != 0) {
                $errors[] = 'Problème de chargement de l\'image.';
            }
            if ((!in_array($mime, self::AUTHORIZED_EXTENSIONS))) {
                $errors[] = 'Veuillez sélectionner une image de type ' . implode(',', $extensions) . ' !';
            }
        }

        if (file_exists($nameFile) && filesize($nameFile) > self::MAX_FILE_SIZE) {
            $errors[] = "Votre fichier doit faire moins de 200ko !";
        }
        return $errors;
    }
}
