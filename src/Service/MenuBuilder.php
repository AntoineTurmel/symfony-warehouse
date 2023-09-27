<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class MenuBuilder
{
    private $requestStack;
    private $urlGenerator;

    public function __construct(RequestStack $requestStack, UrlGeneratorInterface $urlGenerator)
    {
        $this->requestStack = $requestStack;
        $this->urlGenerator = $urlGenerator;
    }

    public function buildMenu()
    {
        $menu = [
            ['label' => 'Accueil', 'route' => 'app_home'],
            ['label' => 'Stocks prévisionnels', 'route' => 'forecast_stock'],
            ['label' => 'Stocks disponibles', 'route' => 'available_stock'],
            ['label' => 'Produits n\'ayant aucune disponibilité', 'route' => 'out_of_stock_products'],
        ];

        return $menu;
    }
}