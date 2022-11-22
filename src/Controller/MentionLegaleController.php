<?php

namespace App\Controller;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
class MentionLegaleController
{
    protected Environment $twig;
    public function __construct()
    {
        $loader = new FilesystemLoader(APP_VIEW_PATH);
        $this->twig = new Environment(
            $loader,
            [
                'cache' => false,
                'debug' => true,
            ]
        );
    }
    public function index()
    {
        return $this->twig->render("MentionsLegale/MentionsLegale.html.twig");
    }
}
