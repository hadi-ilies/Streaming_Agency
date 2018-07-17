<?php

namespace App\Repository;

use App\Entity\AnimesAndSeries;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method AnimesAndSeries|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnimesAndSeries|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnimesAndSeries[]    findAll()
 * @method AnimesAndSeries[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnimesAndSeriesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, AnimesAndSeries::class);
    }

//    /**
//     * @return AnimesAndSeries[] Returns an array of AnimesAndSeries objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?AnimesAndSeries
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
