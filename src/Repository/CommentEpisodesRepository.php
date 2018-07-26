<?php

namespace App\Repository;

use App\Entity\CommentEpisodes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CommentEpisodes|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommentEpisodes|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommentEpisodes[]    findAll()
 * @method CommentEpisodes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommentEpisodesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CommentEpisodes::class);
    }

//    /**
//     * @return CommentEpisodes[] Returns an array of CommentEpisodes objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CommentEpisodes
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
