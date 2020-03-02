<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
//use Symfony\Component\Form\FormInterface;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SecurityController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     */
    public function registration(Request $request, EntityManagerInterface $entityManager) {
        $user = new User();
        $user->setIsConfirmed(false);

        $form = $this->createForm(RegistrationType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($user);
            $entityManager->flush();
        }

        return $this->render('security/registration.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
