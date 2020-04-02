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
use App\Entity\Cart;
use App\Entity\Adresses;

class UIController extends AbstractController
{
    /**
     * @Route("/account", name="user_account")
     */
    public function showAccount(Request $request, EntityManagerInterface $entityManager, UserPasswordEncoderInterface $encoder, Security $security)
    {
        $user = $security->getUser();
        $adress =  $user->getAdresses()[0];

        if($adress === NULL) {
            $adress = new Adresses();
            $adress->setUser($user);
        }

        $formU = $this->createForm(UserUpdateType::class, $user);
        $formA = $this->createForm(AdressFormType::class, $adress);

        $formU->handleRequest($request);
        $formA->handleRequest($request);

        if($formU->isSubmitted() && $formU->isValid()) {
            $hash = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hash);

            $entityManager->persist($user);
            $entityManager->flush();
        }

        if($formA->isSubmitted() && $formA->isValid()) {
            $entityManager->persist($adress);
            $entityManager->flush();
        }

        return $this->render('ui/account.html.twig', [
            'formU' => $formU->createView(),
            'formA' => $formA->createView()
        ]);
    }
    /**
     * @Route("/cart", name="user_cart")
     */
    public function showCart(Security $security, EntityManagerInterface $entityManager) {
        if ($security->getUser()) {
            $user = $security->getUser();
            $cart = $user->getCart();

            if($cart === NULL) {
                $cart = new Cart();
                $cart->setUser($user);
                $entityManager->persist($cart);
                $entityManager->flush();
            }

            $cartProducts = $cart->getCartProducts();
            $cartProducts = $cartProducts->toArray();

            $products = [];

            foreach ($cartProducts as $cp) {
                array_push($products, $cp);
            }

            // $products = $cartProducts->getProducts();

            // dd($products);

            return $this->render('ui/cart.html.twig', [
                'products' => $products
            ]);
        }
        else {
            return $this->render('ui/not_connected.html.twig');
        }
    }
    /**
     * @Route("/cart/remove/{id}", name="remove_from_cart")
     */
    public function remove($id, Security $security, EntityManagerInterface $entityManager) {
        if ($security->getUser()) {
            $user = $security->getUser();
            $cart = $user->getCart();

            if($cart === NULL) {
                $cart = new Cart();
                $cart->setUser($user);
            }

            $cartProducts = $cart->getCartProducts();
            $cartProducts = $cartProducts->toArray();

            foreach($cartProducts as $cp) {
                if ($cp->getId() == $id) {
                    $cart->removeCartProduct($cp);
                    $entityManager->persist($cart);
                    $entityManager->flush();
                }
            }

            $products = [];

            foreach ($cartProducts as $cp) {
                array_push($products, $cp);
            }

            return $this->render('ui/cart.html.twig', [
                'products' => $products
            ]);
        }

        else {
            return $this->render('ui/not_connected.html.twig');
        }
    }
}
