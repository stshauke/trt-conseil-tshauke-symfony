<?php

namespace App\Controller;

use App\Entity\Annonce;
use App\Form\AnnonceType;
use App\Repository\AnnonceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Entity\Utilisateur;
use App\Entity\Candidature;

use Symfony\Component\Security\Core\Security;

use DateTimeZone;

#[Route('/annonce')]
class AnnonceController extends AbstractController
{
    #[Route('/', name: 'app_annonce_index', methods: ['GET'])]
    public function index(Request $request,AnnonceRepository $annonceRepository, PaginatorInterface $paginator): Response
    {
        // if (!$this->isGranted('ROLE_CANDIDAT') and !$this->isGranted('ROLE_CONSULTANT')) {
        //     $accessDeniedRoute = $this->generateUrl('app_access_denied'); // Remplacez 'access_denied' par le nom de votre route d'accès refusé
        //     return new RedirectResponse($accessDeniedRoute);
        // }
          // Récupérer l'utilisateur actuellement connecté
        $user = $this->getUser();

        // Récupérer le rôle de l'utilisateur connecté
        $role = $user->getRoles()[0]; // Prendre le premier rôle de l'utilisateur (supposons qu'un utilisateur a un seul rôle)

        // Récupérer le terme de recherche depuis la requête
        $searchTerm = $request->query->get('search');

        // Récupérer la page actuelle à partir de la requête
        $currentPage = $request->query->getInt('page', 1);

        // Nombre d'éléments par page
        $itemsPerPage = 2;

        // Créer une requête Doctrine pour récupérer les annonces
        $queryBuilder = $annonceRepository->createQueryBuilder('an');

        // Filtrer les annonces en fonction du rôle de l'utilisateur connecté
        if ($role === 'ROLE_RECRUTEUR') {
            // Si l'utilisateur est un recruteur, afficher uniquement ses propres annonces
            $queryBuilder
                ->where('an.Utilisateur = :user')
                ->setParameter('user', $user);
        }

        // Ajouter une condition de recherche si un terme de recherche est spécifié
        if ($searchTerm) {
            $queryBuilder
                ->andWhere('an.descriptionAnnonce LIKE :searchTerm OR an.posteDemandee LIKE :searchTerm
                OR an.lieuTravail LIKE :searchTerm OR an.dateAnnonce LIKE :searchTerm')
                ->setParameter('searchTerm', '%'.$searchTerm.'%');
        }

        // Ordonner les annonces par ID (ou une autre propriété si nécessaire)
        $queryBuilder->orderBy('an.id', 'ASC');

        // Paginez les résultats
        $pagination = $paginator->paginate(
            $queryBuilder->getQuery(),
            $currentPage,
            $itemsPerPage
        );

        // Transférez la pagination à votre vue Twig
        return $this->render('annonce/index.html.twig', [
            'pagination' => $pagination,
        ]);
    }
    

    #[Route('/new', name: 'app_annonce_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $annonce = new Annonce();
        $utilisateur = new Utilisateur(); 
       
        $form = $this->createForm(AnnonceType::class, $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //  // Remplir les autres champs de votre utilisateur           
            // Définir une date par défaut pour la date de l'annonce
            $annonce = $form->getData();
            $currentDateTime = new \DateTime('now', new DateTimeZone('Europe/Paris'));
            $annonce->setDateAnnonce($currentDateTime);        
            $annonce->setStatus(0);
             
           // Récupérer l'utilisateur courant
            $utilisateurCourant =$this->getUser();
          
            // Vérifier si un utilisateur est authentifié
            if ($utilisateurCourant !== null) {
                // Associer l'utilisateur courant à l'annonce
                $annonce->setUtilisateur($utilisateurCourant);
            }


            $entityManager->persist($annonce);
            $entityManager->flush();

            return $this->redirectToRoute('app_annonce_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('annonce/new.html.twig', [
            'annonce' => $annonce,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_annonce_show', methods: ['GET'])]
    public function show(Annonce $annonce, EntityManagerInterface $entityManager): Response
    {
           // Récupérer l'utilisateur actuellement connecté
        $user = $this->getUser();

        // Récupérer le repository des candidatures
        $candidatureRepository = $entityManager->getRepository(Candidature::class);

        // Vérifier si l'utilisateur est inscrit pour cette annonce
        $isUserRegistered = $candidatureRepository->findOneBy(['Annonce' => $annonce, 'Utilisateur' => $user]);

        return $this->render('annonce/show.html.twig', [
            'annonce' => $annonce,
            'isUserRegistered' => $isUserRegistered,
        ]);
        
        // return $this->render('annonce/show.html.twig', [
        //     'annonce' => $annonce,
        // ]);
    }

    #[Route('/{id}/edit', name: 'app_annonce_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Annonce $annonce, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AnnonceType::class, $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            //  // Remplir les autres champs de votre utilisateur           
            // Définir une date par défaut pour la date de l'annonce
            $annonce = $form->getData();
            $currentDateTime = new \DateTime('now', new DateTimeZone('Europe/Paris'));
            $annonce->setDateAnnonce($currentDateTime);        
            $annonce->setStatus(0);
             
           // Récupérer l'utilisateur courant
            $utilisateurCourant =$this->getUser();
          
            // Vérifier si un utilisateur est authentifié
            if ($utilisateurCourant !== null) {
                // Associer l'utilisateur courant à l'annonce
                $annonce->setUtilisateur($utilisateurCourant);
            }

            $entityManager->flush();

            return $this->redirectToRoute('app_annonce_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('annonce/edit.html.twig', [
            'annonce' => $annonce,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_annonce_delete', methods: ['POST'])]
    public function delete(Request $request, Annonce $annonce, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$annonce->getId(), $request->request->get('_token'))) {
            $entityManager->remove($annonce);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_annonce_index', [], Response::HTTP_SEE_OTHER);
    }
    // #[Route('/candidature/ajax/new', name: 'app_candidature_ajax_new', methods: ['POST'])]
    // public function ajaxNew(Request $request, EntityManagerInterface $entityManager): JsonResponse
    // {
    //    // Log message to server logs
    // error_log('ajaxNew method is executed.');
    //     // Récupérez l'utilisateur actuellement authentifié
    //     $user = $this->getUser();
        
    //     // Vérifiez si l'utilisateur est connecté
    //     if (!$user) {
    //         return new JsonResponse(['message' => 'Vous devez être connecté pour créer une candidature'], 403);
    //     }
    
    //     // Récupérez l'ID de l'utilisateur et l'ID de l'annonce à partir de la requête AJAX
    //     $userId = $user->getId();
    //     $annonceId = $request->request->get('annonceId');
    
    //     // Récupérez l'utilisateur et l'annonce associés aux ID
    //     $utilisateur = $entityManager->getRepository(Utilisateur::class)->find($userId);
    //     $annonce = $entityManager->getRepository(Annonce::class)->find($annonceId);
    
    //     // Vérifiez si l'utilisateur et l'annonce existent
    //     if (!$utilisateur || !$annonce) {
    //         return new JsonResponse(['message' => 'L\'utilisateur ou l\'annonce spécifiée n\'existe pas'], 404);
    //     }
    
    //     // Créez une nouvelle instance de Candidature
    //     $candidature = new Candidature();
    //     $candidature->setUtilisateur($utilisateur);
    //     $candidature->setAnnonce($annonce);
    
    //     // Enregistrez la candidature
    //     $entityManager->persist($candidature);
    //     $entityManager->flush();
    
    //     // Retournez une réponse JSON pour indiquer que la candidature a été créée avec succès
    //     return new JsonResponse(['message' => 'Candidature créée avec succès'], 200);
    // }
    
}