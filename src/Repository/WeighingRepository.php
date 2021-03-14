<?php

namespace App\Repository;

use App\Entity\Weighing;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Weighing|null find($id, $lockMode = null, $lockVersion = null)
 * @method Weighing|null findOneBy(array $criteria, array $orderBy = null)
 * @method Weighing[]    findAll()
 * @method Weighing[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WeighingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Weighing::class);
    }

    // /**
    //  * @return Weighing[] Returns an array of Weighing objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Weighing
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

     /**
      * @return Weighing[] Returns an array of Weighing objects
      */
    public function findAllMilestoneOrderedByNewest(): array
    {
        return $this->addIsMilestoneQueryBuilder()
            ->orderBy('q.registeredAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    private function addIsMilestoneQueryBuilder(QueryBuilder $qb = null) : QueryBuilder
    {
        return $this->getOrCreateQueryBuilder($qb)
            ->andWhere('q.isMilestone = 1');
    }

    private function getOrCreateQueryBuilder(QueryBuilder $qb = null): QueryBuilder
    {
        return $qb ?: $this->createQueryBuilder('q');
    }
}
