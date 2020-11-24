<?php

namespace App\Repository;

use App\Entity\ExperienceProUtilisateur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ExperienceProUtilisateur|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExperienceProUtilisateur|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExperienceProUtilisateur[]    findAll()
 * @method ExperienceProUtilisateur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExperienceProUtilisateurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExperienceProUtilisateur::class);
    }

    // /**
    //  * @return ExperienceProUtilisateur[] Returns an array of ExperienceProUtilisateur objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ExperienceProUtilisateur
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
