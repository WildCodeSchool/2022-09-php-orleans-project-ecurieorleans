<?php

namespace App\Controller;

use App\Model\SectionManager;

class AdminSectionController extends AbstractController
{
    public function index(): string
    {
        $sectionManager = new SectionManager();
        $sections = $sectionManager->selectAll('id');
        return $this->twig->render(
            'AdminSports/adminSports.html.twig',
            ['sections' => $sections]
        );
    }
    
    public function add(): ?string
    {
        return $this->twig->render('AdminSports/adminAddSports.html.twig');

    public function edit(int $id): string
    {
        $sectionManager = new SectionManager();
        $section = $sectionManager->selectOneById($id);

        return $this->twig->render('AdminSports/adminEditSports.twig', ['section' => $section]);
    }
}
