<?php

namespace App\Controller;

use App\Entity\Movies;
use app\Entity\Comment;
use App\Form\CommentType;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MoviesController extends Controller
{
    /**
     * @Route("/movies", name="movies")
     */

    public function list_movies()
    {
        $repo = $this->getDoctrine()->getRepository(Movies::class);
        $movies = $repo->findAll();

        return $this->render('movies/list_movies.html.twig', [
            'movies' => $movies,
        ]);
    }

    /**
     * @Route("/movies/movie/{id}", name="movie")
     */

    public function movies($id, Request $request, ObjectManager $manager)
    {
        $repo = $this->getDoctrine()->getRepository(Movies::class);
        $movie = $repo->find($id);
        $comment = new comment();
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setCreatedAt( new \DateTime);
            $comment->setMovie($movie);           
            $manager->persist($comment);
            $manager->flush();
            
            return ($this->redirectToRoute('movie', [
                'id' => $id
            ]));
        }
        return $this->render('movies/show.html.twig', [
            'movie' => $movie,
            'commentForm' => $form->createView()
        ]);
    }
}
