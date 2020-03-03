<?php

namespace App\Repository;

use App\Entity\CommentsMangas;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CommentsMangas|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommentsMangas|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommentsMangas[]    findAll()
 * @method CommentsMangas[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommentsMangasRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CommentsMangas::class);
    }

    // /**
    //  * @return CommentsMangas[] Returns an array of CommentsMangas objects
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
    public function findOneBySomeField($value): ?CommentsMangas
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
