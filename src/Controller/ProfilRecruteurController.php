<?php

namespace App\Controller;

use App\Entity\ProfilRecruteur;
use App\Entity\Utilisateur;
use App\Form\ProfilRecruteurType;
use App\Repository\ProfilRecruteurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/profil/recruteur')]
class ProfilRecruteurController extends AbstractController
{
    #[Route('/', name: 'app_profil_recruteur_index', methods: ['GET'])]
    public function index(ProfilRecruteurRepository $profilRecruteurRepository): Response
    {
        return $this->render('profil_recruteur/index.html.twig', [
            'profil_recruteurs' => $profilRecruteurRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_profil_recruteur_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $profilRecruteur = new ProfilRecruteur();
        $form = $this->createForm(ProfilRecruteurType::class, $profilRecruteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
        $utilisateur= new Utilisateur();
        $utilisateur->setEmail($request->request->get('utilisateur'));
        // $utilisateur->setProfilRecruteur( $profilRecruteur );
        // $profilRecruteur ->addUtilisateur($utilisateur);

            $entityManager->persist($profilRecruteur);
            $entityManager->flush();

            return $this->redirectToRoute('app_profil_recruteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_recruteur/new.html.twig', [
            'profil_recruteur' => $profilRecruteur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_profil_recruteur_show', methods: ['GET'])]
    public function show(ProfilRecruteur $profilRecruteur): Response
    {
        return $this->render('profil_recruteur/show.html.twig', [
            'profil_recruteur' => $profilRecruteur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_profil_recruteur_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, ProfilRecruteur $profilRecruteur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ProfilRecruteurType::class, $profilRecruteur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_profil_recruteur_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('profil_recruteur/edit.html.twig', [
            'profil_recruteur' => $profilRecruteur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_profil_recruteur_delete', methods: ['POST'])]
    public function delete(Request $request, ProfilRecruteur $profilRecruteur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$profilRecruteur->getId(), $request->request->get('_token'))) {
            $entityManager->remove($profilRecruteur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_profil_recruteur_index', [], Response::HTTP_SEE_OTHER);
    }
}
