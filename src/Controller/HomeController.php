<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends AbstractController
{
    #[Route('/', 'home.index',methods:['GET'])]
    public function index(Request $request): Response
    {
         // Vérifier si le paramètre 'inactive_account' est présent dans la requête
         if ($request->query->get('inactive_account')) {
            // Ajouter un message flash spécifique pour les comptes inactifs
            $this->addFlash('warning', 'Votre compte n\'est pas encore actif.');
        }
        return $this->render('home.html.twig');
    }
}
