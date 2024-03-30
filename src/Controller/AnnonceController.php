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

#[Route('/annonce')]
class AnnonceController extends AbstractController
{
    #[Route('/', name: 'app_annonce_index', methods: ['GET'])]
    public function index(Request $request,AnnonceRepository $annonceRepository, PaginatorInterface $paginator): Response
    {
        if (!$this->isGranted('ROLE_CANDIDAT') and !$this->isGranted('ROLE_CONSULTANT')) {
            $accessDeniedRoute = $this->generateUrl('app_access_denied'); // Remplacez 'access_denied' par le nom de votre route d'accès refusé
            return new RedirectResponse($accessDeniedRoute);
        }
          // Récupérer le terme de recherche depuis la requête
            $searchTerm = $request->query->get('search');

            // Récupérez la page actuelle à partir de la requête
            $currentPage = $request->query->getInt('page', 1);

            // Nombre d'éléments par page
            $itemsPerPage = 6;
        // Créez une requête Doctrine pour récupérer les annonces (alias: an)
            $queryBuilder = $annonceRepository->createQueryBuilder('an')
            ->orderBy('an.id', 'ASC');
            
            // Ajoutez une condition de recherche si un terme de recherche est spécifié
            if ($searchTerm) {
                $queryBuilder
                    ->leftJoin('an.Utilisateur', 'u')
                    ->andWhere('an.descriptionAnnonce LIKE :searchTerm OR an.posteDemandee LIKE :searchTerm
                       OR an.lieuTravail LIKE :searchTerm
                    OR an.dateAnnonce LIKE :searchTerm OR u.nom LIKE :searchTerm OR u.prenom LIKE :searchTerm')
                    ->setParameter('searchTerm', '%'.$searchTerm.'%');
            }
        
        // Paginez les résultats
        $pagination = $paginator->paginate(
            $queryBuilder,
            $currentPage,
            $itemsPerPage
        );
        // Transférez la pagination à votre vue Twig
        return $this->render('annonce/index.html.twig', [
            // 'annonces' => $annonceRepository->findAll(),
            'pagination' => $pagination,
        ]);
    }

    #[Route('/new', name: 'app_annonce_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $annonce = new Annonce();
        $form = $this->createForm(AnnonceType::class, $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
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
    public function show(Annonce $annonce): Response
    {
        return $this->render('annonce/show.html.twig', [
            'annonce' => $annonce,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_annonce_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Annonce $annonce, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AnnonceType::class, $annonce);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
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
}
