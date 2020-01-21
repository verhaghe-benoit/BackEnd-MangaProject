<?php

namespace App\Repository;

use App\Entity\ScoreRelation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ScoreRelation|null find($id, $lockMode = null, $lockVersion = null)
 * @method ScoreRelation|null findOneBy(array $criteria, array $orderBy = null)
 * @method ScoreRelation[]    findAll()
 * @method ScoreRelation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScoreRelationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ScoreRelation::class);
    }

    // /**
    //  * @return ScoreRelation[] Returns an array of ScoreRelation objects
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
    public function findOneBySomeField($value): ?ScoreRelation
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
