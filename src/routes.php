<?php

// list of accessible routes of your application, add every new route here
// key : route to match
// values : 1. controller name
//          2. method name
//          3. (optional) array of query string keys to send as parameter to the method
// e.g route '/item/edit?id=1' will execute $itemController->edit(1)
return [
    '' => ['HomeController', 'index',],
    'eventAdmin' => ['EventAdminController', 'index'],
    'circuit' => ['CircuitController', 'circuit',],
    'bureau' => ['BoardController', 'index',],
    'admin/login' => ['LoginController', 'login'],
    'admin/logout' => ['LoginController', 'logout'],
    'section' => ['SectionController', 'section', ['id']],
    'admin/sports' => ['AdminSectionController', 'index',],
    'admin/sports/edit' => ['AdminSectionController', 'edit', ['id']],
    'items' => ['ItemController', 'index',],
    'admin' => ['AdminController', 'index',],
    'items/edit' => ['ItemController', 'edit', ['id']],
    'items/show' => ['ItemController', 'show', ['id']],
    'items/add' => ['ItemController', 'add',],
    'items/delete' => ['ItemController', 'delete',],
    'contact' => ['FormController', 'contact',]
];
