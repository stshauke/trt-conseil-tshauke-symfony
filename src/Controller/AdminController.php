<?php
namespace App\Controller;

use App\Entity\ProfilConsultant;
use App\Form\AdminFormulaireType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\Persistence\ManagerRegistry;

class AdminController extends AbstractController
{
    private $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    #[Route('/admin', name: 'app_admin')]
    public function index(Request $request): Response
    {
        // Créez une nouvelle instance de votre entité
        $profilConsultant = new ProfilConsultant();

        // Créez le formulaire en utilisant le type de formulaire que vous avez créé
        $form = $this->createForm(AdminFormulaireType::class, $profilConsultant);

        // Traitez la soumission du formulaire
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Récupérez l'entity manager à partir de ManagerRegistry
            $entityManager = $this->doctrine->getManager();
            
            // Enregistrez les données
            $entityManager->persist($profilConsultant);
            $entityManager->flush();

            // Redirigez l'utilisateur vers une autre page ou affichez un message de succès
            return $this->redirectToRoute('app_admin');
        }

        // Affichez le formulaire dans votre vue
        return $this->render('admin/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
