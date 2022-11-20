<?php

namespace App\Controller;

use App\Model\BoardManager;

class AdminBoardController extends AbstractController
{
    public function index()
    {
        $boardManager = new BoardManager();
        $members = $boardManager->selectAll();
        return $this->twig->render("AdminBoard/AdminBoard.html.twig", ["members" => $members]);
    }
}
