<?php

namespace App\Controller;

use App\Model\LoginManager;
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

    protected array|false $user;

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
        $loginManager = new LoginManager();
        $this->user = isset($_SESSION['user_id']) ? $loginManager->selectOneById($_SESSION['user_id']) : false;
        $this->twig->addGlobal('user', $this->user);
    }

    public function testAdmin()
    {
        if (!$this->user) {
            header('HTTP/1.1 404 Not Found');
            header("Location: /error?error=404");
            return "";
        }
    }
}
