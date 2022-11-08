<?php

namespace App\Controller;

use App\Model\BureauManager;
use App\Model\ConseilAdministrationManager;

class BureauController extends AbstractController
{
    /**
     * Display home page
     */
    public function bureau(): string
    {
        $bureauManager = new BureauManager();
        $members = $bureauManager->selectAll('id');
        $conseilAdminManager = new ConseilAdministrationManager();
        $conseilAdmin = $conseilAdminManager->selectAll('id');
        return $this->twig->render('Bureau/bureau.html.twig', [
            "members" => $members,
            "conseilAdminstrateurs" => $conseilAdmin,
        ]);
    }
}
