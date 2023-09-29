<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ServiceController extends AbstractController
{
    #[Route('/service', name: 'app_service')]
    public function index(): Response
    {
        return $this->render('service/index.html.twig', [
            'controller_name' => 'ServiceController',
        ]);
    }



    //Methode showService() route paramétré
    #[Route('/service/show/{name}', name: 'app_show_service')]
    public function showService($name): Response
    {
        return $this->render('service/index.html.twig', [
            'name' => $name,
        ]);
    }



    //Methode de la redirection vers la page "Bonjour mes etudiants"
    #[Route('/service/GoToIndex', name: 'app_GoToIndex')]
    public function goToIndex()
    {
        
        return $this->redirectToRoute('app_show');
    }
}
