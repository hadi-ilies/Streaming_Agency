<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\AnimeAndSeries;
use App\Entity\Episodes;
use App\Entity\Saisons;

class AnimeAndSeriesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    { 
        $faker = \Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 6; $i++) {
            $animeandseries = new AnimeAndSeries();
            $content = '<p>' . join($faker->paragraphs(2), '</p><p>') . '</p>';                 
            $animeandseries->setTitle($i % 2 == 0 ? 'serie'.$i : 'anime' .$i)
                           ->setImage($faker->imageUrl())
                           ->setCreatedAt($faker->dateTimeBetween('-6 months'))
                           ->setSynopsis($content);
                for ($j = 0; $j < 3; $j++) {
                    $saison = new Saisons();
                    $saison->setNbEpisode(12)
                           ->setEpisodes(array(
                        0 => "http://ok.ru/videoembed/38886116031", 
                        1 => "//rutube.ru/play/embed/8176745?sTitle=false&amp;sAuthor=false&amp;p=9FaZLGXy2BnPxmvdRYqo-Q",
                        2 => "//rutube.ru/play/embed/8176745?sTitle=false&amp;sAuthor=false&amp;p=9FaZLGXy2BnPxmvdRYqo-Q", 
                        3 => "//rutube.ru/play/embed/8176745?sTitle=false&amp;sAuthor=false&amp;p=9FaZLGXy2BnPxmvdRYqo-Q", 
                        4 => "//rutube.ru/play/embed/8176745?sTitle=false&amp;sAuthor=false&amp;p=9FaZLGXy2BnPxmvdRYqo-Q", 
                        5 => "//rutube.ru/play/embed/8176745?sTitle=false&amp;sAuthor=false&amp;p=9FaZLGXy2BnPxmvdRYqo-Q", 
                        6 => "//rutube.ru/play/embed/8176745?sTitle=false&amp;sAuthor=false&amp;p=9FaZLGXy2BnPxmvdRYqo-Q", 
                        7 => "//rutube.ru/play/embed/8176745?sTitle=false&amp;sAuthor=false&amp;p=9FaZLGXy2BnPxmvdRYqo-Q", 
                        8 => "//rutube.ru/play/embed/8176745?sTitle=false&amp;sAuthor=false&amp;p=9FaZLGXy2BnPxmvdRYqo-Q", 
                        9 => "//rutube.ru/play/embed/8176745?sTitle=false&amp;sAuthor=false&amp;p=9FaZLGXy2BnPxmvdRYqo-Q", 
                        10 => "//rutube.ru/play/embed/8176745?sTitle=false&amp;sAuthor=false&amp;p=9FaZLGXy2BnPxmvdRYqo-Q", 
                        11 => "//rutube.ru/play/embed/8176745?sTitle=false&amp;sAuthor=false&amp;p=9FaZLGXy2BnPxmvdRYqo-Q",
                        12 => "//rutube.ru/play/embed/8176745?sTitle=false&amp;sAuthor=false&amp;p=9FaZLGXy2BnPxmvdRYqo-Q"                         
                        ))
                           ->setAnimeAndSeries($animeandseries)
                           ->setNbSaison(3);
                    $manager->persist($saison);
            }
            $manager->persist($animeandseries);
        }
        $manager->flush();    
    }
}
