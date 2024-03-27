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
use Symfony\Component\HttpFoundation\JsonResponse;

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
    #[Route('/update-status/{id}', name: 'update_status', methods: ['POST'])]
    public function updateStatus(Request $request, Utilisateur $utilisateur, EntityManagerInterface $entityManager): JsonResponse
    {
        // Récupérer les données JSON envoyées depuis le frontend
        $data = json_decode($request->getContent(), true);

        // Vérifier si la clé "status" est présente et si elle est à true ou false
        if (isset($data['status']) && is_bool($data['status'])) {
            // Mettre à jour le statut de l'utilisateur
            $utilisateur->setStatus($data['status']);
            $entityManager->flush();

            // Dans votre méthode updateStatus
            return new JsonResponse(['message' => 'Statut mis à jour avec succès'], 200);
        }

        // Retourner une réponse JSON indiquant qu'il y a eu une erreur dans les données envoyées
        return new JsonResponse(['message' => 'Données de statut invalides'], 200);
    }
}
