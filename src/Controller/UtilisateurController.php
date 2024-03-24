<?php

namespace App\Controller;

use App\Entity\ProfilRecruteur;
use App\Entity\Utilisateur;
use App\Form\UtilisateurRecruteurType;
use App\Form\ProfilRecruteurType;
use App\Repository\UtilisateurRepository;
use DateTimeZone;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[Route('/utilisateur')]
class UtilisateurController extends AbstractController
{
    #[Route('/', name: 'app_utilisateur_index', methods: ['GET'])]
    public function index(UtilisateurRepository $utilisateurRepository): Response
    {
        return $this->render('utilisateur/index.html.twig', [
            'utilisateurs' => $utilisateurRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_utilisateur_new', methods: ['GET', 'POST'])]
    public function new(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $utilisateur = new Utilisateur(); 
        $profilRecruteur = new ProfilRecruteur(); // Créez un nouvel objet ProfilRecruteur

        $form = $this->createForm(UtilisateurRecruteurType::class, $utilisateur);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
// encode the plain password
            $utilisateur ->setPassword(
                $userPasswordHasher->hashPassword(
                    $utilisateur ,
                    $form->get('plainPassword')->getData()
                )
            );
            $utilisateur = $form->getData();
            $currentDateTime = new \DateTime('now', new DateTimeZone('Europe/Paris'));
            $utilisateur->setDateCreation($currentDateTime);
            
            $profilRecruteur->setNomEntreprise($request->request->get("nomEntreprise"));
            $profilRecruteur->setAdresseEntreprise($request->request->get("addressEntreprise"));
            $utilisateur->addProfilRecruteur($profilRecruteur);

            $entityManager->persist($utilisateur);
            $entityManager->flush();

            return $this->redirectToRoute('app_utilisateur_index', [], Response::HTTP_SEE_OTHER);
        }

        // Si la condition n'est pas remplie, retourner le rendu du formulaire avec les données actuelles
        return $this->render('utilisateur/new.html.twig', [
            'utilisateur' => $utilisateur,
            'form' => $form->createView(),
        ]);
    }


    #[Route('/{id}', name: 'app_utilisateur_show', methods: ['GET'])]
    public function show($id,Utilisateur $utilisateur, EntityManagerInterface $entityManager): Response
    {   
        $profilRecruteur=$entityManager->getRepository(ProfilRecruteur::class)->findOneBy(["utilisateur" =>$id]);
        return $this->render('utilisateur/show.html.twig', [
            'utilisateur' => $utilisateur,
            'profilRecruteur' => $profilRecruteur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_utilisateur_edit', methods: ['GET', 'POST'])]
    public function edit($id,Request $request,Utilisateur $utilisateur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(UtilisateurRecruteurType::class, $utilisateur);
        $form->handleRequest($request);
        $profilRecruteur=$entityManager->getRepository(ProfilRecruteur::class)->findOneBy(["utilisateur" =>$id]);

        if ($form->isSubmitted() && $form->isValid()) {
            // // encode the plain password
            // $utilisateur ->setPassword(
            //     $userPasswordHasher->hashPassword(
            //         $utilisateur ,
            //         $form->get('plainPassword')->getData()
            //     )
            // );

            $profilRecruteur->setNomEntreprise($request->request->get("nomEntreprise"));
            $profilRecruteur->setAdresseEntreprise($request->request->get("addressEntreprise"));
            $utilisateur->addProfilRecruteur($profilRecruteur);

            $entityManager->flush();

            return $this->redirectToRoute('app_utilisateur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('utilisateur/edit.html.twig', [
            'utilisateur' => $utilisateur,
            'profilRecruteur' => $profilRecruteur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_utilisateur_delete', methods: ['POST'])]
    public function delete(Request $request, Utilisateur $utilisateur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete' . $utilisateur->getId(), $request->request->get('_token'))) {
            $entityManager->remove($utilisateur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_utilisateur_index', [], Response::HTTP_SEE_OTHER);
    }
}
