<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AuthorController extends AbstractController
{
    public $authors = array(
        array('id' => 1, 'picture' => '/images/Victor-Hugo.jpg','username' => 'Victor Hugo', 'email' => 'victor.hugo@gmail.com ', 'nb_books' => 100),
        array('id' => 2, 'picture' => '/images/william-shakespeare.png','username' => ' William Shakespeare', 'email' =>  ' william.shakespeare@gmail.com', 'nb_books' => 200 ),
        array('id' => 3, 'picture' => '/images/Taha_Hussein.jpg','username' => 'Taha Hussein', 'email' => 'taha.hussein@gmail.com', 'nb_books' => 300),
        );
    #[Route('/author/list', name: 'list_author')]
    public function listAuthors():Response {

        return $this->render('author/list.html.twig',[
            'authors' => $this->authors,
         ]);
    }
    #[Route('/author/{name}', name: 'show_author')]
    public function showAuthor(string $name): Response
    {
        return $this->render('author/show.html.twig', [
            'name' => $name,
        ]);
    
    }
    #[Route('/author/details/{id}', name: 'author_details')]
    public function authorDetails(int $id   ): Response
    {foreach ($this->authors as $a) {
        if ($a['id'] === $id) {
            $author = $a;
            break;
        }
    }

        return $this->render('author/showAuthor.html.twig', [
            'author' => $author,
        ]);
    
    }
}
