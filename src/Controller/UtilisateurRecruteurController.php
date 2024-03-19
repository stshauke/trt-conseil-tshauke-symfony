<?php

namespace App\Controller;
use App\Entity\ProfilRecruteur;
use App\Form\UtilisateurRecruteurType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class UtilisateurRecruteurController extends AbstractController
{
    #[Route('/utilisateur/recruteur', name: 'app_utilisateur_recruteur')]
    public function index(Request $request): Response
    {
        $profilRecruteur = new ProfilRecruteur();
        $form = $this->createForm(UtilisateurRecruteurType::class, $profilRecruteur);
    
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Les données du formulaire sont valides, vous pouvez les traiter ici
            // Par exemple, enregistrer l'utilisateur et le profil recruteur en base de données
            
            // Rediriger ou afficher un message de succès
            return $this->redirectToRoute('nom_de_la_route_de_redirection');
        }
    
        return $this->render('utilisateur_recruteur/index.html.twig', [
            'form' => $form->createView(),
        ]); 
        
        
        // return $this->render('utilisateur_recruteur/index.html.twig', [
        //     'controller_name' => 'UtilisateurRecruteurController',
        // ]);
    }

}
