<?php

namespace App\Controller;

use App\Model\AssociationManager;
use App\Model\EventManager;

class HomeAdminController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        $associationManager = new AssociationManager();
        $association = $associationManager->selectOne();
        $eventManager = new EventManager();
        $events = $eventManager->selectAll();
        return $this->twig->render(
            'HomeAdmin/indexAdmin.html.twig',
            ["association" => $association, 'events' => $events]
        );
    }

    public function delete(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = trim($_POST['id']);
            $eventManager = new EventManager();
            $eventManager->delete((int)$id);

            header('Location:/HomeAdmi');
        }
    }
}
