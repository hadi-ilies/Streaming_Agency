<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Saisons;
use App\Entity\AnimeAndSeries;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\CommentEpisodes;
use App\Form\CommentEpisodeType;
use Doctrine\Common\Persistence\ObjectManager;

class EpisodesInSaisonController extends Controller
{
    /**
     * @Route("/episodes/in/saison/{id}/{episode}", name="episodes_in_saison")
     */
    public function list_episode($episode, $id, ObjectManager $manager, Request $request)
    {
        $repo = $this->getDoctrine()->getRepository(Saisons::class);
        $saison = $repo->find($id);
        $nb_episode = $saison->getNbEpisode();
        $comment = new CommentEpisodes();
        $form = $this->createForm(CommentEpisodeType::class, $comment);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $comment->setCreatedAt( new \DateTime);
            $comment->setSaison($saison);           
            $manager->persist($comment);
            $manager->flush();
            
            return ($this->redirectToRoute('episodes_in_saison', [
                'id' => $id,
                'episode' => $episode,
            ]));
        }

        $prev_saison = $repo->find($id - 1);      
        $next_saison = $repo->find($id + 1);
        return $this->render('episodes_in_saison/index.html.twig', [
            'saison' => $saison,
            'next_saison' => $next_saison,
            'prev_saison' => $prev_saison,
            'episode' => $episode,
            'nb_episode' => $nb_episode,
            'commentForm' => $form->createView(),
        ]);                
    }  
} 
