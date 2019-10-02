<?php

namespace App\Repository;

use App\Entity\GenreList;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method GenreList|null find($id, $lockMode = null, $lockVersion = null)
 * @method GenreList|null findOneBy(array $criteria, array $orderBy = null)
 * @method GenreList[]    findAll()
 * @method GenreList[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GenreListRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GenreList::class);
    }

    // /**
    //  * @return GenreList[] Returns an array of GenreList objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GenreList
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
