<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Movies;
use App\Entity\Comment;

class MoviesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 20; $i++) {
            $movie = new Movies();
            $content = '<p>' . join($faker->paragraphs(2), '</p><p>') . '</p>';                 
            $movie->setTitle('movie '.$i)
                   ->setImage($faker->imageUrl())
                   ->setCreatedAt($faker->dateTimeBetween('-6 months'))
                   ->setSynopsis($content)
                   ->setVideo("//rutube.ru/play/embed/8176745?sTitle=false&amp;sAuthor=false&amp;p=9FaZLGXy2BnPxmvdRYqo-Q");
            for ($j = 0; $j < 3; $j++) {
                $comment = new comment();
                $comment->setAuthor("jean kader")
                        ->setContent($content)
                        ->setCreatedAt($faker->dateTimeBetween('-6 months'))
                        ->setMovie($movie);    
                    $manager->persist($comment);
                }       
            $manager->persist($movie);
        }
        $manager->flush();
    }
}