<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductSizeController extends AbstractController
{
    #[Route('/product/size', name: 'app_product_size')]
    public function index(): Response
    {
        return $this->render('product_size/index.html.twig', [
            'controller_name' => 'ProductSizeController',
        ]);
    }
}
