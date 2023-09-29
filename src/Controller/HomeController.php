<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }


    //Methode qui permet d'afficher Bonjour mes étudiants
    #[Route('/show', name: 'app_show')]
    public function show(): Response
    {
        return new Response('<h1> Bonjour mes étudiants </h1>');
    }

    #[Route ('/msg', name: 'msg')]
    public function showmsg():  Response
    {
        return $this->render('home/msg.html.twig');
    }
}
