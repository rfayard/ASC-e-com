<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Categories;
use App\Entity\Products;


class CategoryController extends AbstractController
{
    /**
     * @Route("/category/{id}", name="category")
     */
    public function index($id)
    {
        $repo = $this->getDoctrine()->getRepository(Categories::class);
        $category = $repo->find($id);

        // $repo1 = $this->getDoctrine()->getRepository(Products::class);
        $products = $category->getProducts();

        return $this->render('category/index.html.twig', [
            'controller_name' => 'CategoryController',
            'category' => $category,
            'products' => $products
        ]);
    }
}
