<?php

namespace App\Controller;

use App\Entity\Candidature;
use App\Form\CandidatureType;
use App\Repository\CandidatureRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Knp\Component\Pager\PaginatorInterface;
use App\Entity\Annonce;
use App\Entity\Utilisateur;
use Symfony\Component\HttpFoundation\JsonResponse;

#[Route('/candidature')]
class CandidatureController extends AbstractController
{
    #[Route('/', name: 'app_candidature_index', methods: ['GET'])]
    public function index(Request $request,CandidatureRepository $candidatureRepository, PaginatorInterface $paginator): Response
    {
        // Récupérer le terme de recherche depuis la requête
        $searchTerm = $request->query->get('search');

        // Récupérez la page actuelle à partir de la requête
        $currentPage = $request->query->getInt('page', 1);

        // Nombre d'éléments par page
        $itemsPerPage = 2;
    // Créez une requête Doctrine pour récupérer les annonces (alias: an)
        $queryBuilder = $candidatureRepository->createQueryBuilder('can')
        ->orderBy('can.id', 'ASC');
        
        // Ajoutez une condition de recherche si un terme de recherche est spécifié
        if ($searchTerm) {
            $queryBuilder
                ->leftJoin('can.Utilisateur', 'u')
                ->andWhere('can.dateApprobation LIKE :searchTerm OR can.approuver LIKE :searchTerm  
                OR u.nom LIKE :searchTerm OR u.prenom LIKE :searchTerm')
                ->setParameter('searchTerm', '%'.$searchTerm.'%');
        }
      
    // Paginez les résultats
    $pagination = $paginator->paginate(
        $queryBuilder,
        $currentPage,
        $itemsPerPage
    );
    // Transférez la pagination à votre vue Twig
    return $this->render('candidature/index.html.twig', [
        // 'annonces' => $annonceRepository->findAll(),
        'pagination' => $pagination,
    ]);
}


    #[Route('/new', name: 'app_candidature_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
{
    // Récupérer l'ID de l'annonce à partir de la requête
    $annonceId = $request->query->get('annonceId');

    // Récupérer l'annonce associée à l'ID
    $annonce = $entityManager->getRepository(Annonce::class)->find($annonceId);

    // Vérifier si l'annonce existe
    if (!$annonce) {
        throw $this->createNotFoundException('L\'annonce avec l\'ID '.$annonceId.' n\'existe pas.');
    }

    // Récupérer l'ID de l'utilisateur à partir de la session
    $userId = $this->getUser()->getId();

    // Récupérer l'utilisateur associé à l'ID
    $utilisateur = $entityManager->getRepository(Utilisateur::class)->find($userId);

    // Vérifier si l'utilisateur existe
    if (!$utilisateur) {
        throw $this->createNotFoundException('L\'utilisateur avec l\'ID '.$userId.' n\'existe pas.');
    }

    // Créer une nouvelle instance de Candidature
    $candidature = new Candidature();

    // Assigner l'annonce et l'utilisateur à la candidature
    $candidature->setAnnonce($annonce);
    $candidature->setUtilisateur($utilisateur);

    // Créer le formulaire
    $form = $this->createForm(CandidatureType::class, $candidature);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        // Persister la candidature
        $entityManager->persist($candidature);
        $entityManager->flush();

        // Rediriger vers la liste des candidatures
        return $this->redirectToRoute('app_candidature_index', [], Response::HTTP_SEE_OTHER);
    }

    // Rendre le formulaire
    return $this->render('candidature/new.html.twig', [
        'candidature' => $candidature,
        'form' => $form->createView(),
    ]);
}


    #[Route('/{id}', name: 'app_candidature_show', methods: ['GET'])]
    public function show(Candidature $candidature): Response
    {
        return $this->render('candidature/show.html.twig', [
            'candidature' => $candidature,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_candidature_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Candidature $candidature, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CandidatureType::class, $candidature);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_candidature_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('candidature/edit.html.twig', [
            'candidature' => $candidature,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_candidature_delete', methods: ['POST'])]
    public function delete(Request $request, Candidature $candidature, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$candidature->getId(), $request->request->get('_token'))) {
            $entityManager->remove($candidature);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_candidature_index', [], Response::HTTP_SEE_OTHER);
    }
    #[Route('/candidature/ajax/new', name: 'app_candidature_ajax_new', methods: ['POST'])]
    public function ajaxNew(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        // Récupérer les données JSON envoyées depuis le frontend
    $data = json_decode($request->getContent(), true);

    // Vérifier si les données nécessaires sont présentes dans la requête
    if (!isset($data['userId']) || !isset($data['annonceId'])) {
        return new JsonResponse(['message' => 'Paramètres manquants dans la requête'], 400);
    }

    // Récupérer l'utilisateur et l'annonce associés aux ID
    $utilisateur = $entityManager->getRepository(Utilisateur::class)->find($data['userId']);
    $annonce = $entityManager->getRepository(Annonce::class)->find($data['annonceId']);

    // Vérifier si l'utilisateur et l'annonce existent
    if (!$utilisateur || !$annonce) {
        return new JsonResponse(['message' => 'L\'utilisateur ou l\'annonce spécifiée n\'existe pas'], 404);
    }

    // Créer une nouvelle instance de Candidature
    $candidature = new Candidature();
    $candidature->setUtilisateur($utilisateur);
    $candidature->setAnnonce($annonce);

    // Enregistrer la candidature
    $entityManager->persist($candidature);
    $entityManager->flush();

    // Retourner une réponse JSON pour indiquer que la candidature a été créée avec succès
    return new JsonResponse(['message' => 'Candidature créée avec succès'], 200);
}
}
