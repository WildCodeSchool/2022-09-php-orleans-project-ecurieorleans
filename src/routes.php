<?php

// list of accessible routes of your application, add every new route here
// key : route to match
// values : 1. controller name
//          2. method name
//          3. (optional) array of query string keys to send as parameter to the method
// e.g route '/item/edit?id=1' will execute $itemController->edit(1)
return [
    '' => ['HomeController', 'index',],
    'admin/evenement' => ['EventAdminController', 'index'],
    'admin/evenement/add' => ['EventAdminController', 'add'],
    'admin/evenement/edit' => ['EventAdminController', 'edit', ['id']],
    'admin/evenement/supprimer' => ['EventAdminController', 'delete'],
    'circuit' => ['CircuitController', 'circuit',],
    'bureau' => ['BoardController', 'index',],
    'error' => ['ErrorController', 'index', ['error']],
    'admin/bureau/add' => ['AdminBoardController', 'add',],
    'admin/bureau' => ["AdminBoardController", "index"],
    'admin/bureau/edit' => ["AdminBoardController", "edit", ["id"]],
    'admin/bureau/supprimer' => ["AdminBoardController", "delete"],
    'admin/login' => ['LoginController', 'login'],
    'admin/logout' => ['LoginController', 'logout'],
    'section' => ['SectionController', 'index', ['id']],
    'admin/sports' => ['AdminSectionController', 'index',],
    'admin/sports/add' => ['AdminSectionController', 'add',],
    'admin/sports/edit' => ['AdminSectionController', 'edit', ['id']],
    'admin/sports/supprimer' => ['AdminSectionController', 'delete'],
    'items' => ['ItemController', 'index',],
    'admin' => ['AdminController', 'index',],
    'contact' => ['FormController', 'contact', ['message']],
    'admin/partenaires' => ['AdminPartnerController', 'index',],
    'admin/partenaires/add' => ['AdminPartnerController', 'add',],
    'admin/partenaires/edition' => ['AdminPartnerController', 'edit', ['id']],
    'admin/partenaires/supprimer' => ['AdminPartnerController', 'delete',],
    'partenaires' => ['PartnerController', 'partner',]
];
