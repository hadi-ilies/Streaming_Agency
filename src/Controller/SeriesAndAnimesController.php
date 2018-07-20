<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Form\CommentType;
use App\Entity\AnimesAndSeries;
use App\Entity\Saisons;
use App\Entity\Episodes;

class SeriesAndAnimesController extends Controller
{
    /**
     * @Route("/series/and/animes", name="series_and_animes")
     */

    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(AnimesAndSeries::class);
        $anime_series = $repo->findAll();

        return $this->render('series_and_animes/index.html.twig', [
            'animes_series' => $anime_series,
        ]);
    }

    /**
     * @Route("/SeriesAndAnime/{id}", name="anime_serie")
     */
    
     public function show_series_or_anime($id)
     {
        $repo = $this->getDoctrine()->getRepository(AnimesAndSeries::class);
        $animes_series = $repo->find($id);

        ini_set('xdebug.var_display_max_depth', 5);
        ini_set('xdebug.var_display_max_children', 256);
        ini_set('xdebug.var_display_max_data', 1024);

        var_dump($animes_series->$getSaisons());
 //       die();

        return $this->render('series_and_animes/show.html.twig', [
            'animes_series' => $animes_series,            
        ]);
    }    
}
