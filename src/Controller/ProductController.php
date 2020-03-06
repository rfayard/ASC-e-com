<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Products;

class ProductController extends AbstractController
{
    /**
     * @Route("/product/{id}", name="product")
     */
    public function index($id)
    {
        $repo = $this->getDoctrine()->getRepository(Products::class);
        $product = $repo->find($id);
        
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
            'product' => $product
        ]);
    }
}
