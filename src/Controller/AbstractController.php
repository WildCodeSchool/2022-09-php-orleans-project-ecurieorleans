<?php

namespace App\Controller;

use Twig\Environment;
use App\Model\SectionManager;
use App\Model\PartnerManager;
use Twig\Loader\FilesystemLoader;
use Twig\Extension\DebugExtension;

/**
 * Initialized some Controller common features (Twig...)
 */
abstract class AbstractController
{
    protected Environment $twig;

    protected array|false $sections;

    protected array|false $partners;

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
        $this->twig->addExtension(new DebugExtension());
        $sectionManager = new SectionManager();
        $this->sections = $sectionManager->selectAll('id');
        $this->twig->addGlobal('sections', $this->sections);
        $partnerManager = new PartnerManager();
        $this->partners = $partnerManager->selectAll('id');
        $this->twig->addGlobal('partners', $this->partners);
    }
}
