<?php

namespace App\Controller;

use App\Model\BoardManager;

class AdminBoardController extends AbstractController
{
    private const INPUT_MAX_LENGTH = 25;
    private const ROLES = [
        "Président d'honneur", "Président", "Vice-président", "Secrétaire", "Secrétaire adjoint",
        "Trésorier", "Trésorier adjoint", "Entraineur"
    ];

    public function add()
    {
        $membersErrors = [];
        $membersManager = new BoardManager();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $members = array_map('trim', $_POST);
            if (isset($members["boardmember"])) {
                $members['boardmember'] = 1;
            } else {
                $members['boardmember'] = 0;
            }
            $membersErrors = $this->checkErrors($members);

            if (empty($membersErrors)) {
                $membersManager->add($members);
                header('Location: /admin/bureau');
                return null;
            }
        }
        return $this->twig->render('AdminBoard/AdminAddBoard.html.twig', [
            'errors' => $membersErrors,
            'roles' => self::ROLES
        ]);
    }

    public function index()
    {
        $this->testAdmin();
        $boardManager = new BoardManager();
        $members = $boardManager->selectAll();
        return $this->twig->render("AdminBoard/AdminBoard.html.twig", ["members" => $members]);
    }


    public function edit($id)
    {
        $membersErrors = [];
        $membersManager = new BoardManager();
        $roles = [
            "Président d'honneur", "Président", "Vice-président", "Secrétaire", "Secrétaire adjoint",
            "Trésorier", "Trésorier adjoint", "Entraineur"
        ];
        $member = $membersManager->selectOneById($id);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $members = array_map('trim', $_POST);
            if (isset($members["boardmember"])) {
                $members['boardmember'] = 1;
            } else {
                $members['boardmember'] = 0;
            }
            $membersErrors = $this->checkErrors($members);

            if (empty($membersErrors)) {
                $membersManager->edit($members, $id);
                header('Location: /admin/bureau');
                return null;
            }
        }
        return $this->twig->render('AdminBoard/AdminEditBoard.html.twig', [
            'errors' => $membersErrors,
            'roles' => $roles,
            'member' => $member,
        ]);
    }
    private function checkErrors(array $member): array
    {

        $membersManager = new BoardManager();
        $roles = $membersManager->selectRoles();
        $errors = [];
        if (empty($member['lastname'])) {
            $errors[] = 'Le nom du membre est obligatoire.';
        }
        if (empty($member['firstname'])) {
            $errors[] = 'Le prénom du membre est obligatoire.';
        }
        if (!filter_var($member['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Votre adresse mail n\'est pas au bon format.';
        }

        if (in_array($member['role'], $roles)) {
            $errors[] = 'Le rôle doit être un des rôles valide.';
        }
        if (strlen($member['lastname']) > self::INPUT_MAX_LENGTH) {
            $errors[] = 'Le nom du membre doit faire moins de ' . self::INPUT_MAX_LENGTH . ' caractères.';
        }
        if (strlen($member['firstname']) > self::INPUT_MAX_LENGTH) {
            $errors[] = 'Le prénom du membre doit faire moins de ' . self::INPUT_MAX_LENGTH . ' caractères.';
        }
        return $errors;
    }

    public function delete(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = (int) trim($_POST['id']);
            $boardManager = new BoardManager();
            $boardManager->delete($id);

            header('Location:/admin/bureau');
        }
    }
}
