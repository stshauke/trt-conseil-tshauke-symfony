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
        $itemsPerPage = 6;
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
        $candidature = new Candidature();
        $form = $this->createForm(CandidatureType::class, $candidature);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($candidature);
            $entityManager->flush();

            return $this->redirectToRoute('app_candidature_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('candidature/new.html.twig', [
            'candidature' => $candidature,
            'form' => $form,
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
}