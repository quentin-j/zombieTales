<?php

namespace App\Repository;

use App\Entity\SpeRules;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SpeRules|null find($id, $lockMode = null, $lockVersion = null)
 * @method SpeRules|null findOneBy(array $criteria, array $orderBy = null)
 * @method SpeRules[]    findAll()
 * @method SpeRules[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpeRulesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SpeRules::class);
    }

    // /**
    //  * @return SpeRules[] Returns an array of SpeRules objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SpeRules
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
