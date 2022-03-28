<?php

namespace App\Repository;

use App\Entity\Generos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Generos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Generos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Generos[]    findAll()
 * @method Generos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GenerosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Generos::class);
    }

    // /**
    //  * @return Generos[] Returns an array of Generos objects
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
    public function findOneBySomeField($value): ?Generos
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
