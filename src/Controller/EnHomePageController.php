<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Cart;
use App\Entity\Categories;
use App\Entity\Deals;
use App\Entity\Products;
use App\Entity\Reviews;
use App\Entity\User;

class EnHomePageController extends AbstractController
{
    /**
     * @Route("/en/home", name="en_home_page")
     */
    public function index()
    {
        $em = $this->getDoctrine()->getManager();
        $cart = $em->getRepository(Cart::class)->findAll();
        $categories = $em->getRepository(Categories::class)->findAll();
        $deals = $em->getRepository(Deals::class)->findAll();
        $products = $em->getRepository(Products::class)->findAll();
        $reviews = $em->getRepository(Reviews::class)->findAll();
        $user = $em->getRepository(User::class)->findAll();

        return $this->render('en_home_page/index.html.twig', [
            'controller_name' => 'EnHomePageController',
            'cart' => $cart,
            'categories' => $categories,
            'deals' => $deals,
            'products' => $products,
            'reviews' => $reviews,
            'user' => $user
        ]);
    }

    /**
     * @Route("/en/cart", name="en_cart")
     */

    public function gotToCart()
    {

        $em = $this->getDoctrine()->getManager();
        $cart = $em->getRepository(Cart::class)->findAll();
        $categories = $em->getRepository(Categories::class)->findAll();
        $products = $em->getRepository(Products::class)->findAll();
        $user = $em->getRepository(User::class)->findAll();

        return $this->render('en_cart/index.html.twig', [
            'cart' => $cart,
            'categories' => $categories,
            'products' => $products,
            'user' => $user
        ]);

    }

    /**
     * @Route("/en/legal", name="en_legal")
     */

    public function seePolicy()
    {

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->findAll();

        return $this->render('en_legal/index.html.twig', [
            'user' => $user
        ]);

    }
}
