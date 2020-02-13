<?php

namespace App\Repository;

use App\Entity\ScoreRelationManga;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ScoreRelationManga|null find($id, $lockMode = null, $lockVersion = null)
 * @method ScoreRelationManga|null findOneBy(array $criteria, array $orderBy = null)
 * @method ScoreRelationManga[]    findAll()
 * @method ScoreRelationManga[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScoreRelationMangaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ScoreRelationManga::class);
    }

    // /**
    //  * @return ScoreRelationManga[] Returns an array of ScoreRelationManga objects
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
    public function findOneBySomeField($value): ?ScoreRelationManga
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
