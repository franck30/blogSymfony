<?php

namespace App\Repository;

use App\Entity\PaysOrigine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PaysOrigine|null find($id, $lockMode = null, $lockVersion = null)
 * @method PaysOrigine|null findOneBy(array $criteria, array $orderBy = null)
 * @method PaysOrigine[]    findAll()
 * @method PaysOrigine[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PaysOrigineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PaysOrigine::class);
    }

    // /**
    //  * @return PaysOrigine[] Returns an array of PaysOrigine objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PaysOrigine
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
