<?php

namespace App\Repository;

use App\Entity\Symfotweets;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Symfotweets|null find($id, $lockMode = null, $lockVersion = null)
 * @method Symfotweets|null findOneBy(array $criteria, array $orderBy = null)
 * @method Symfotweets[]    findAll()
 * @method Symfotweets[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SymfotweetsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Symfotweets::class);
    }

    // /**
    //  * @return Symfotweets[] Returns an array of Symfotweets objects
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
    public function findOneBySomeField($value): ?Symfotweets
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
