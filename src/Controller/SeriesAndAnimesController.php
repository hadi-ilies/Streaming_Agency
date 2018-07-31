<?php

namespace App\Controller;

use App\Entity\Saisons;
use App\Entity\Episodes;
use App\Form\CommentType;
use App\Entity\AnimeAndSeries;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SeriesAndAnimesController extends Controller
{
    /**
     * @Route("/series/and/animes", name="series_and_animes")
     */

    public function index(Request $request)
    {
        $repo = $this->getDoctrine()->getRepository(AnimeAndSeries::class);
        $anime_series = $repo->findAll();
        
        $paginator  = $this->get('knp_paginator')->paginate(
            $anime_series, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            5/*limit per page*/
        );
        return $this->render('series_and_animes/index.html.twig', [
            'animes_series' => $paginator,
        ]);
    }

    /**
     * @Route("/SeriesAndAnime/{id}", name="anime_serie")
     */
    
     public function show_series_or_anime($id)
     {
        $repo = $this->getDoctrine()->getRepository(AnimeAndSeries::class);
        $animes_series = $repo->find($id);
        
        /*
        ini_set('xdebug.var_display_max_depth', 5);
        ini_set('xdebug.var_display_max_children', 256);
        ini_set('xdebug.var_display_max_data', 1024);
        //var_dump($animes_series->getSaisons());       
        */

        return $this->render('series_and_animes/show.html.twig', [
            'animes_series' => $animes_series,                       
        ]);
    }    
}
