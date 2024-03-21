<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'app_dashboard')]
    public function index(): Response
    {
       
        if ($this->isGranted('ROLE_ADMIN')) {
            // Logique spécifique à l'administrateur
            return $this->render('dashboard/admin.html.twig');
        } elseif ($this->isGranted('ROLE_CONSULTANT')) {
            // Logique spécifique au consultant
            return $this->render('dashboard/consultant.html.twig');
        } elseif ($this->isGranted('ROLE_CANDIDAT')) {
            // Logique spécifique au candidat
            return $this->render('dashboard/candidat.html.twig');
        } elseif ($this->isGranted('ROLE_ENTREPRENEUR')) {
            // Logique spécifique à l'entrepreneur
            return $this->render('dashboard/entrepreneur.html.twig');
        }
      return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
        ]);   
        
    }




}
