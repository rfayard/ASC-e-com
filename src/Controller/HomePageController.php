<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Categories;

class HomePageController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Categories::class);

        $categories = $repo->findAll();

        return $this->render('home_page/index.html.twig', [
            'controller_name' => 'HomePageController',
            'categories' => $categories
        ]);
    }
}
