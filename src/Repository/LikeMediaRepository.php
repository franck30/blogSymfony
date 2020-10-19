<?php

namespace App\Repository;

use App\Entity\LikeMedia;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LikeMedia|null find($id, $lockMode = null, $lockVersion = null)
 * @method LikeMedia|null findOneBy(array $criteria, array $orderBy = null)
 * @method LikeMedia[]    findAll()
 * @method LikeMedia[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LikeMediaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LikeMedia::class);
    }

    // /**
    //  * @return LikeMedia[] Returns an array of LikeMedia objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LikeMedia
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
