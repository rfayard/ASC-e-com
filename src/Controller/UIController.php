<?php

namespace App\Controller;

use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\UserUpdateType;
use App\Form\AdressFormType;

class UIController extends AbstractController
{
    /**
     * @Route("/account", name="user_account")
     */
    public function showAccount(Request $request, EntityManagerInterface $entityManager, UserPasswordEncoderInterface $encoder, Security $security)
    {
        $user = $security->getUser();
        $adress =  $user->getAdresses()[0];

        $formU = $this->createForm(UserUpdateType::class, $user);
        $formA = $this->createForm(AdressFormType::class, $adress);

        $formU->handleRequest($request);
        $formA->handleRequest($request);

        return $this->render('ui/account.html.twig', [
            'formU' => $formU->createView(),
            'formA' => $formA->createView()
        ]);
    }
}
