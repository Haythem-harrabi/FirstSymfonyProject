<?php

namespace App\Controller;

use App\Entity\Student;
use App\Form\StudentType;
use App\Repository\ClassroomRepository;
use App\Repository\StudentRepository;
use Symfony\Doctrine\Persistence\ManagerRegistry;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
    #[Route('/student', name: 'app_student')]
    public function index(): Response
    {
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }


    #[Route('/fetch', name:'fetch')]
    public function fetch(StudentRepository $repo): Response
    {
        $result=$repo->findAll();
        return $this->render('student/test.html.twig', [
            'response' => $result,
        ]);
    }


    
    #[Route('/add', name:'add')]
    public function add(\Doctrine\Persistence\ManagerRegistry $mr, ClassroomRepository $repo): Response
    {
        $c=$repo->find('1');
       $s=new Student();
       $s->setNom('test');
       $s->setAge(10);
       $s->setClassroom($c);

        $em=$mr->getManager();
        $em->persist($s); //equivalent of prepare() in PHP
        $em->flush();


        // return new Response('added');
        return $this->redirectToRoute('fetch');
    }







    #[Route('/addF', name:'addF')]
    public function addF(\Doctrine\Persistence\ManagerRegistry $mr, ClassroomRepository $repo, Request $req): Response
    {
      
       $s=new Student();
   
        $form=$this->createForm( StudentType::class, $s);
        $form->handleRequest($req);


    if ($form->isSubmitted() ){
        $em=$mr->getManager();
        $em->persist($s); //equivalent of prepare() in PHP
        $em->flush();
       

        // return new Response('added');
         return $this->redirectToRoute('fetch');}
        return $this->render('student/add.html.twig', [
            'f'=>$form->createView()]);
    }



    #[Route('/remove/{id}', name:'remove')]
    public function remove(int $id, StudentRepository $repo, \Doctrine\Persistence\ManagerRegistry $mr): Response
    {
       $s=$repo->find($id);
       
       $em=$mr->getManager();
        $em->remove($s);
        $em->flush();


        // return new Response('added');
        return $this->redirectToRoute('fetch');
    }

    #[Route('/updateF/{id}', name:'updateF')]
    public function updateF(\Doctrine\Persistence\ManagerRegistry $mr, ClassroomRepository $classrepo,StudentRepository $repo, Request $req, int $id): Response
    {
        $em=$mr->getManager();
          $s=$repo->find($id);
        $form=$this->createForm( StudentType::class, $s);
        $form->handleRequest($req);


    if ($form->isSubmitted() && $form->isValid() ){
        
        // $em->persist($s); //equivalent of prepare() in PHP
        $em->flush();
       

        // return new Response('added');
         return $this->redirectToRoute('fetch');}
        return $this->render('student/update.html.twig', [
            'f'=>$form->createView()]);
    }




}
