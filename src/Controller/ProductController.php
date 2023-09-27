<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use App\Repository\ReceptionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    /*#[Route('/product', name: 'app_product')]
    public function index(): Response
    {
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
        ]);
    }*/

    #[Route('/product/unavailable', name: 'out_of_stock_products')]
    public function listProductUnavailable(ProductRepository $products): Response
    {
        $productsUnavailable = $products->findAllOutOfStock();
        return $this->render('product/products_unavailable.html.twig', ['products' => $productsUnavailable]);
    }

    #[Route('/product/{id<\d+>}', name: 'product_detail', methods: ['GET'])]
    public function listWarehouseDetailsByProduct(Product $product, ReceptionRepository $receptions): Response
    {
        $productReceptions = $receptions->findAllReceptionsForProduct($product);
        return $this->render('product/product_detail.html.twig', ['product' => $product, 'productReceptions' => $productReceptions]);
    }

}
