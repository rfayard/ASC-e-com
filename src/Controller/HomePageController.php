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

class HomePageController extends AbstractController
{
    /**
     * @Route("/home", name="home")
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


        return $this->render('home_page/index.html.twig', [
            'cart' => $cart,
            'categories' => $categories,
            'deals' => $deals,
            'products' => $products,
            'reviews' => $reviews,
            'user' => $user
        ]);
    }



    /**
     * @Route("/cart", name="cart")
     */

    public function gotToCart()
    {

        $em = $this->getDoctrine()->getManager();
        $cart = $em->getRepository(Cart::class)->findAll();
        $categories = $em->getRepository(Categories::class)->findAll();
        $products = $em->getRepository(Products::class)->findAll();
        $user = $em->getRepository(User::class)->findAll();

        return $this->render('cart/index.html.twig', [
            'cart' => $cart,
            'categories' => $categories,
            'products' => $products,
            'user' => $user
        ]);

    }

    /**
     * @Route("/legal", name="legal")
     */

    public function seePolicy()
    {

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository(User::class)->findAll();

        return $this->render('legal/index.html.twig', [
            'user' => $user
        ]);

    }

}