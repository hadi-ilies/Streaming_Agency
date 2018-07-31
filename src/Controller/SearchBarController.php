<?php

namespace App\Controller;

use App\Entity\Movies;
use App\Entity\AnimeAndSeries;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SearchBarController extends Controller
{
    /**
     * @Route("/search/bar", name="search_bar")
     */

    public function index(ObjectManager $manager, Request $request)
    {
        $repo = $this->getDoctrine()->getRepository(Movies::class);
        $keyword = $request->get('keyword'); 
        $query = $repo->createQueryBuilder('f')
                 ->where('f.Title like :Title')
                 ->setParameter('Title', $keyword.'%')
                 ->orderBy('f.Title', 'ASC')
                 ->getQuery();   

                                                                                    /*$movie = $repo->findby(
                                                                                        ['Title' => $keyword] //display one movie exactly what you wrote in the search bar          
                                                                                    );*/     

        $movie = $query->getResult();
        if ($movie == null) {
            $repo = $this->getDoctrine()->getRepository(AnimeAndSeries::class);
            $keyword = $request->get('keyword'); 
            $query = $repo->createQueryBuilder('m')
                 ->where('m.Title like :Title')
                 ->setParameter('Title', $keyword.'%')
                 ->orderBy('m.Title', 'ASC')
                 ->getQuery();   
            $serie = $query->getResult();                                    
                                                                                    /*$serie = $repo->findby(
                                                                                        ['Title' => $keyword]
                                                                                    );*/
            if ($serie != null)
                return $this->render('search_bar/serie.html.twig', [
                    'animes_series' => $serie,
                ]);
             else
                return $this->render('search_bar/error_search_bar.html.twig');                            
        } else
            return $this->render('search_bar/movie.html.twig', [
                'movies' => $movie,
             ]);
    }
}
