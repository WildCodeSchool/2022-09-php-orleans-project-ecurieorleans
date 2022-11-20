<?php

namespace App\Controller;

use App\Model\BoardManager;
use App\Model\EventManager;
use App\Model\SectionManager;

class SectionController extends AbstractController
{
    public function index(int $id): string
    {
        $sectionManager = new SectionManager();
        $section = $sectionManager->selectOneById($id);
        $eventManager = new EventManager();
        $events = $eventManager->selectAllEventsBySectionID($section['id'], 'raceDate', 'DESC');
        $memberManager = new BoardManager();
        $members = $memberManager->selectAllMembersBySectionID($section['id']);
        //var_dump($events);
        //exit();
        return $this->twig->render(
            'Section/section.html.twig',
            [
                'section' => $section,
                'events' => $events,
                'members' => $members
            ]
        );
    }
}
