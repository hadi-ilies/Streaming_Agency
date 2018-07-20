<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\AnimesAndSeries;
use App\Entity\Episodes;
use App\Entity\Saisons;

class AnimeAndSeriesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    { 
        $faker = \Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 2; $i++) {
            $animeandseries = new AnimesAndSeries();
            $content = '<p>' . join($faker->paragraphs(2), '</p><p>') . '</p>';                 
            $animeandseries->setTitle($i % 2 == 0 ? 'serie'.$i : 'anime' .$i)
                           ->setImage($faker->imageUrl())
                           ->setCreatedAt($faker->dateTimeBetween('-6 months'))
                           ->setSynopsis($content);
                for ($j = 0; $j < 1; $j++) {
                    $saison = new Saisons();
                      for ($k = 0; $k < 1; $k++) {
                                $episode = new Episodes();
                                $episode->setSynopsis($content)
                                        ->setVideo("//rutube.ru/play/embed/8176745?sTitle=false&amp;sAuthor=false&amp;p=9FaZLGXy2BnPxmvdRYqo-Q")
                                        ->setSaisons($saison);                           
                           $manager->persist($episode);
                       }
                       $saison->setNbSaison($j)
                              ->setAnimesAndSeries($animeandseries);
                       $manager->persist($saison);
            }
            $manager->persist($animeandseries);
        }
        $manager->flush();    
    }
}
