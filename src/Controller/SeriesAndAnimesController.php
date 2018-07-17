<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SeriesAndAnimesController extends Controller
{
    /**
     * @Route("/series/and/animes", name="series_and_animes")
     */
    public function index()
    {
        return $this->render('series_and_animes/index.html.twig', [
            'controller_name' => 'SeriesAndAnimesController',
        ]);
    }
}
