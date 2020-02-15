<?php

namespace App\Repository;

use App\Entity\CommentsAnimes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CommentsAnimes|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommentsAnimes|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommentsAnimes[]    findAll()
 * @method CommentsAnimes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommentsAnimesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CommentsAnimes::class);
    }

    // /**
    //  * @return CommentsAnimes[] Returns an array of CommentsAnimes objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CommentsAnimes
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
