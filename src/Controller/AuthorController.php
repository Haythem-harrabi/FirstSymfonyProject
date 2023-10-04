<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController

{
    
    #[Route('/author', name: 'app_author')]
    public function index(): Response
    {
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
        ]);
    }




    #[Route('/author/showAuthor/{name}', name: 'app_show_author')]
    public function showAuthor($name): Response
    {
      
    $authors = array(
        array('id' => 1, 'picture' => '/images/Victor-Hugo.jpg','username' => 'Victor Hugo', 'email' =>
        'victor.hugo@gmail.com ', 'nb_books' => 0),
        array('id' => 2, 'picture' => '/images/william-shakespeare.jpg','username' => ' William Shakespeare', 'email' =>
        ' william.shakespeare@gmail.com', 'nb_books' => 200 ),
        array('id' => 3, 'picture' => '/images/Taha_Hussein.jpg','username' => 'Taha Hussein', 'email' =>
        'taha.hussein@gmail.com', 'nb_books' => 300),
        );

        return $this->render('author/index.html.twig', [
            'name' => $name,
            'tableau'=>$authors
        ]);
    }





// #[Route('/details', name:'d')]
// public function details(): Response{
//     return new Response('<h1> Authors </h1>');
// }


// #[Route('/details/{id}', name:'d')]
//  public function details($id): Response{
//      return new Response('<h1> Authors </h1>'.$id);
// }



#[Route('/details/{username}', name:'d')]
 public function details($username): Response{
    $authors = array(
        array('id' => 1, 'picture' => '/images/Victor-Hugo.jpg','username' => 'Victor Hugo', 'email' =>
        'victor.hugo@gmail.com ', 'nb_books' => 0),
        array('id' => 2, 'picture' => '/images/william-shakespeare.jpg','username' => ' William Shakespeare', 'email' =>
        ' william.shakespeare@gmail.com', 'nb_books' => 200 ),
        array('id' => 3, 'picture' => '/images/Taha_Hussein.jpg','username' => 'Taha Hussein', 'email' =>
        'taha.hussein@gmail.com', 'nb_books' => 300),
        );

        foreach ($authors as $a) {
            if ($a['username'] == $username) {
                $author = $a;
                break;
            }
        }





    return $this->render('author/showAuthor.html.twig', [
        'author' => $author,
    ]);
}
}
