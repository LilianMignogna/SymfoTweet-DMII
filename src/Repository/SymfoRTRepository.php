<?php

namespace App\Repository;

use App\Entity\SymfoRT;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SymfoRT|null find($id, $lockMode = null, $lockVersion = null)
 * @method SymfoRT|null findOneBy(array $criteria, array $orderBy = null)
 * @method SymfoRT[]    findAll()
 * @method SymfoRT[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SymfoRTRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SymfoRT::class);
    }

    public function findSymfoRTWithSymfotweetIdAndSymfotweetosId(int $symfotweets_id, int $symfotweetos_id): ?SymfoRT
    {
        $entityManager = $this->getEntityManager();
        return $entityManager->createQuery(
            'SELECT s
            FROM App\Entity\SymfoRT s
            WHERE s.symfotweets = :symfotweets_id AND s.symfotweetos = :symfotweetos_id'
        )
        ->setParameter('symfotweets_id', $symfotweets_id)
        ->setParameter('symfotweetos_id', $symfotweetos_id)
        ->getOneOrNullResult();
    }

    // /**
    //  * @return SymfoRT[] Returns an array of SymfoRT objects
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
    public function findOneBySomeField($value): ?SymfoRT
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
