<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\Utilisateur1Type;
use App\Repository\UtilisateurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
#[Route('/candidat')]
class CandidatController extends AbstractController
{
    #[Route('/', name: 'app_candidat_index', methods: ['GET'])]
    public function index(Request $request,UtilisateurRepository $utilisateurRepository, PaginatorInterface $paginator): Response
    {
        if (!$this->isGranted('ROLE_CONSULTANT')) {
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
        // $queryBuilder = $utilisateurRepository->createQueryBuilder('u')
        // ->orderBy('u.id', 'ASC');
    // Créez une requête Doctrine pour récupérer les utilisateurs (alias: u)
        $queryBuilder = $utilisateurRepository->createQueryBuilder('u')
        ->where('u.roles LIKE :role')
        ->orderBy('u.id', 'ASC')
        ->setParameter('role', '%"ROLE_CANDIDAT"%');    




        // Ajoutez une condition de recherche si un terme de recherche est spécifié
        if ($searchTerm) {
            $queryBuilder
                ->andWhere('u.email LIKE :searchTerm OR u.nom LIKE :searchTerm OR u.prenom LIKE :searchTerm OR u.status LIKE :searchTerm OR u.roles LIKE :searchTerm OR u.dateCreation LIKE :searchTerm')
                ->setParameter('searchTerm', '%'.$searchTerm.'%');
        }
        
        
    
    // Paginez les résultats
    $pagination = $paginator->paginate(
        $queryBuilder,
        $currentPage,
        $itemsPerPage
    );
    // Transférez la pagination à votre vue Twig
        
        
        
        
        return $this->render('candidat/index.html.twig', [
            'pagination' => $pagination,
        ]);
    }

    #[Route('/new', name: 'app_candidat_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        
        $utilisateur = new Utilisateur();
        $form = $this->createForm(Utilisateur1Type::class, $utilisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($utilisateur);
            $entityManager->flush();

            return $this->redirectToRoute('app_candidat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('candidat/new.html.twig', [
            'utilisateur' => $utilisateur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_candidat_show', methods: ['GET'])]
    public function show(Utilisateur $utilisateur): Response
    {
        return $this->render('candidat/show.html.twig', [
            'utilisateur' => $utilisateur,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_candidat_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Utilisateur $utilisateur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(Utilisateur1Type::class, $utilisateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_candidat_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('candidat/edit.html.twig', [
            'utilisateur' => $utilisateur,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_candidat_delete', methods: ['POST'])]
    public function delete(Request $request, Utilisateur $utilisateur, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$utilisateur->getId(), $request->request->get('_token'))) {
            $entityManager->remove($utilisateur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_candidat_index', [], Response::HTTP_SEE_OTHER);
    }
}
