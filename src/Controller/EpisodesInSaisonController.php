<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Saisons;
use App\Entity\AnimeAndSeries;
use Symfony\Component\HttpFoundation\Request;

class EpisodesInSaisonController extends Controller
{
    /**
     * @Route("/episodes/in/saison/{id}", name="episodes_in_saison")
     */
    public function list_episode($id)
    {
        $repo = $this->getDoctrine()->getRepository(Saisons::class);
        $saison = $repo->find($id);            
        $nb_episode = $saison->getNbEpisode();
        $nb_saison = $saison->getNbSaison();
        $nb_id = $saison->GetId();        
       
        return $this->render('episodes_in_saison/index.html.twig', [
            'saison' => $saison,
            'nb_episode' => $nb_episode,
            'nb_saison' => $nb_saison,
            'nb_id' => $nb_id,
        ]);
    }
}
