<?php
namespace App\EventListener;

use App\Service\MenuBuilder;
use Symfony\Component\HttpKernel\Event\ControllerEvent;

class MenuListener
{
    private $menuBuilder;

    public function __construct(MenuBuilder $menuBuilder)
    {
        $this->menuBuilder = $menuBuilder;
    }

    public function onKernelController(ControllerEvent $event)
    {
        $menu = $this->menuBuilder->buildMenu();

        // On ajoute le menu aux requêtes
        $event->getRequest()->attributes->set('global_menu', $menu);
    }
}