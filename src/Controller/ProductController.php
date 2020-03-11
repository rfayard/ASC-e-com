<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Products;
use App\Entity\Categories;


class ProductController extends AbstractController
{
    /**
     * @Route("/product/{id}", name="product")
     */
    public function index($id, Request $request)
    {
        $cat_id = $request->query->getInt('cat_id', 90);

        $repo = $this->getDoctrine()->getRepository(Products::class);
        $product = $repo->find($id);

        $repo1 = $this->getDoctrine()->getRepository(Categories::class);
        $category = $repo1->find($cat_id);
        $products = $category->getProducts();
        
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
            'product' => $product,
            'otherproducts' => $products,
            'category' => $category
        ]);
    }
}
