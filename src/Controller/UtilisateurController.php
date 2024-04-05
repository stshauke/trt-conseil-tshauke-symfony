<?php

namespace App\Controller;

use App\Entity\ProfilRecruteur;
use App\Entity\ProfilCandidat;
use App\Entity\Utilisateur;
use App\Form\UtilisateurRecruteurType;
use App\Form\UtilisateurCandidatType;
use App\Form\ProfilRecruteurType;
use App\Repository\ProfilRecruteurRepository;
use DateTimeZone;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Knp\Component\Pager\PaginatorInterface;

#[Route('/utilisateur')]
class UtilisateurController extends AbstractController
{
    #[Route('/', name: 'app_utilisateur_index', methods: ['GET'])]
    public function index(Request $request,ProfilRecruteurRepository $ProfilRecruteurRepository, PaginatorInterface $paginator): Response
    {
        
        // Récupérer le terme de recherche depuis la requête
        $searchTerm = $request->query->get('search');

        // Récupérez la page actuelle à partir de la requête
        $currentPage = $request->query->getInt('page', 1);

        // Nombre d'éléments par page
        $itemsPerPage = 6;
    // Créez une requête Doctrine pour récupérer les annonces (alias: an)
        // $queryBuilder = $utilisateurRepository->createQueryBuilder('u')
        // ->orderBy('u.id', 'ASC');
         // Créez une requête Doctrine pour récupérer les annonces (alias: an)
         $queryBuilder = $ProfilRecruteurRepository->createQueryBuilder('pro')
         ->orderBy('pro.id', 'ASC');
        
        // Ajoutez une condition de recherche si un terme de recherche est spécifié
        if ($searchTerm) {
            $queryBuilder
            ->leftJoin('pro.utilisateur', 'u')
                ->andWhere('u.email LIKE :searchTerm OR u.nom LIKE :searchTerm OR u.prenom LIKE :searchTerm 
                OR u.status LIKE :searchTerm OR u.roles LIKE :searchTerm OR u.dateCreation LIKE :searchTerm
                OR pro.nomEntreprise LIKE :searchTerm ')
                ->setParameter('searchTerm', '%'.$searchTerm.'%');
        }
        
        
    
    // Paginez les résultats
    $pagination = $paginator->paginate(
        $queryBuilder,
        $currentPage,
        $itemsPerPage
    );
    // Transférez la pagination à votre vue Twig
        
        
        
        return $this->render('utilisateur/index.html.twig', [
            'pagination' => $pagination,
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
            // Cette ligne indique à Doctrine de "persister" l'entité utilisateur. 
            // Cela signifie que l'entité est ajoutée au gestionnaire d'entités et sera gérée par Doctrine par 
            // la suite. Elle est généralement utilisée pour préparer une entité à être insérée dans 
            // la base de données.
            $entityManager->flush();
            // Cette ligne déclenche effectivement l'écriture de toutes les modifications en attente 
            // des entités gérées dans la base de données. 
            return $this->redirectToRoute('app_utilisateur_index', [], Response::HTTP_SEE_OTHER);
        }

        // Si la condition n'est pas remplie, retourner le rendu du formulaire avec les données actuelles
        return $this->render('utilisateur/new.html.twig', [
            'utilisateur' => $utilisateur,
            'form' => $form->createView(),
        ]);
    }
    #[Route('/candidat/new', name: 'app_candidats_new', methods: ['GET', 'POST'])]
    public function newCandidat(Request $request, UserPasswordHasherInterface $userPasswordHasher,
     EntityManagerInterface $entityManager): Response
    {
        $utilisateur = new Utilisateur(); 
       $profilCandidat = new ProfilCandidat(); // Créez un nouvel objet ProfilCandidat

       $form = $this->createForm(UtilisateurCandidatType::class, $utilisateur, [
        'attr' => ['enctype' => 'multipart/form-data'],
        ]);

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
            // Remplir les autres champs de votre utilisateur
            $currentDateTime = new \DateTime('now', new DateTimeZone('Europe/Paris'));
            $utilisateur->setDateCreation($currentDateTime);
            $utilisateur->setStatus(0);
            $utilisateur->setRoles(['ROLE_CANDIDAT']);


            
            //$profilCandidat->setCv($request->request->get("cv"));
// Gérer le téléchargement du fichier PDF
$cvFile = $form->get('cv')->getData();

if ($cvFile) {
    $cvFileName = uniqid().'.'.$cvFile->guessExtension();
    $cvFile->move(
        $this->getParameter('cv_directory'),
        $cvFileName
    );

    $profilCandidat->setCv($cvFileName);
}





            $profilCandidat->setPoste($request->request->get("poste"));
            $utilisateur->addProfilCandidat($profilCandidat);

            $entityManager->persist($utilisateur);
            // Cette ligne indique à Doctrine de "persister" l'entité utilisateur. 
            // Cela signifie que l'entité est ajoutée au gestionnaire d'entités et sera gérée par Doctrine par 
            // la suite. Elle est généralement utilisée pour préparer une entité à être insérée dans 
            // la base de données.
            $entityManager->flush();
            // Cette ligne déclenche effectivement l'écriture de toutes les modifications en attente 
            // des entités gérées dans la base de données. 
            return $this->redirectToRoute('app_utilisateur_index', [], Response::HTTP_SEE_OTHER);
        }

        // Si la condition n'est pas remplie, retourner le rendu du formulaire avec les données actuelles
        return $this->render('candidat/new.html.twig', [
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
    public function edit($id,Request $request, UserPasswordHasherInterface $userPasswordHasher,Utilisateur $utilisateur, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(UtilisateurRecruteurType::class, $utilisateur);
        $form->handleRequest($request);
        $profilRecruteur=$entityManager->getRepository(ProfilRecruteur::class)->findOneBy(["utilisateur" =>$id]);

        if ($form->isSubmitted() && $form->isValid()) {
            // // encode the plain password
            $utilisateur ->setPassword(
                $userPasswordHasher->hashPassword(
                    $utilisateur ,
                    $form->get('plainPassword')->getData()
                )
            );

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
