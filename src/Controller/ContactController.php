<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(): Response
    {
        return $this->render('contact/index.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }
    #[Route('/faqs', name: 'app_faqs')]
        public function indexFaqs(): Response
        {
            return $this->render('contact/index_faqs.html.twig', [
                'controller_name' => 'ContactController',
            ]);
        }
    #[Route('/help', name: 'app_help')]
    public function indexhelp(): Response
    {
        return $this->render('contact/index_help.html.twig', [
            'controller_name' => 'ContactController',
        ]);
    }
}