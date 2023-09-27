<?php

namespace App\Controller;

use App\Entity\Reception;
use App\Repository\ReceptionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ReceptionController extends AbstractController
{
    #[Route('/reception', name: 'app_reception')]
    public function index(): Response
    {
        return $this->render('reception/index.html.twig', [
            'controller_name' => 'ReceptionController',
        ]);
    }

    #[Route('/stock/forecast', name: 'forecast_stock')]
    public function listProductsForecastStockAllWarehouses(ReceptionRepository $receptions): Response
    {
        $stocks = $receptions->findAllForecastStockAllWarehouses();
        return $this->render('reception/forecast_stock_all_warehouses.html.twig', ['stocks' => $stocks]);
    }

    #[Route('/stock/available', name: 'available_stock')]
    public function listProductsAvailableStockAllWarehouses(ReceptionRepository $receptions): Response
    {
        $stocks = $receptions->findAllAvailableStockAllWarehouses();
        return $this->render('reception/available_stock_all_warehouses.html.twig', ['stocks' => $stocks]);
    }
}
