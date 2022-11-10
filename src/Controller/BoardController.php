<?php

namespace App\Controller;

use App\Model\BoardManager;

class BoardController extends AbstractController
{
    public function index(): string
    {
        $boardManager = new BoardManager();
        $members = $boardManager->selectAll('id');

        return $this->twig->render('Bureau/bureau.html.twig', [
            "members" => $members,
        ]);
    }
}
