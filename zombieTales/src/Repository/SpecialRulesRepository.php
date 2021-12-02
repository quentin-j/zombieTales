<?php

namespace App\Repository;

use App\Entity\SpecialRules;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SpecialRules|null find($id, $lockMode = null, $lockVersion = null)
 * @method SpecialRules|null findOneBy(array $criteria, array $orderBy = null)
 * @method SpecialRules[]    findAll()
 * @method SpecialRules[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SpecialRulesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SpecialRules::class);
    }

    // /**
    //  * @return SpecialRules[] Returns an array of SpecialRules objects
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
    public function findOneBySomeField($value): ?SpecialRules
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
