<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationType;
//use Symfony\Component\Form\FormInterface;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class EnSecurityController extends AbstractController
{
    /**
     * @Route("/en/register", name="en_register")
     */
    public function en_registration(Request $request, EntityManagerInterface $entityManager, UserPasswordEncoderInterface $encoder) {
        $user = new User();
        $user->setIsConfirmed(false);

        $form = $this->createForm(RegistrationType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);

            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('en_security_login');
        }

        return $this->render('en_security/en_registration.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/en/login", name="en_security_login")
     */
    public function login() {
        return $this->render('en_security/en_login.html.twig');
    }

    /**
     * @Route("/en/logout", name="en_security_logout")
     */
    public function logout() {

    }
}