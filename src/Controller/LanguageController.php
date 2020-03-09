<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Controller\LanguageController;

class LanguageController extends AbstractController
{
    /**
     * @Route("/change-locale/{locale}", name="change_locale")
     */
    public function changelocale($locale, Request $request)
    {
        //stockage de la langue demandée
        $request->getSession()->set('_locale', $locale);
        $request->setLocale($locale);

       // retour à la page précédente
       return $this->redirect($request->headers->get('referer'));
    }
}
