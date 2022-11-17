<?php

namespace App\Controller;

use App\Model\PartnerManager;

class PartnerController extends AbstractController
{
    public function partner()
    {
        $partnerManager = new PartnerManager();
        $partners = $partnerManager->selectAll('name');
        return $this->twig->render('/Partners/partner.html.twig', ['partners' => $partners,]);
    }
}
