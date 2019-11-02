<?php

namespace App\Repository;

use App\Entity\Refsession;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Refsession|null find($id, $lockMode = null, $lockVersion = null)
 * @method Refsession|null findOneBy(array $criteria, array $orderBy = null)
 * @method Refsession[]    findAll()
 * @method Refsession[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RefsessionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Refsession::class);
    }

    // /**
    //  * @return Refsession[] Returns an array of Refsession objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Refsession
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
