<?php

namespace App\Repository;

use App\Entity\Canciones;
use App\Controller\PersistirDatosController;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Config\Doctrine\Orm\EntityManagerConfig\DqlConfig;

/**
 * @method Canciones|null find($id, $lockMode = null, $lockVersion = null)
 * @method Canciones|null findOneBy(array $criteria, array $orderBy = null)
 * @method Canciones[]    findAll()
 * @method Canciones[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CancionesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Canciones::class);
    }

public function BuscarCancion($generoCancion)
{
        return
        $this->getEntityManager()
        ->createQuery("SELECT canciones.id,canciones.nombreCancion,canciones.tematica, canciones.tonalidad,canciones.genero, canciones.tempo
            FROM app\Entity\Canciones canciones
            WHERE canciones.genero LIKE '%$generoCancion%'"
            
        /* Otra manera de hacerlo cuandos son valores <>, =, etc
        se puede hacer con getParameter como se muestra a continuacion:

          WHERE canciones.genero =:identificacion"
        )   
        ->setParameter('identificacion',$generoCancion)*/
        )
        ->getResult();

}

public function BuscarTodasLasCanciones()
{
        return
        $this->getEntityManager()
        ->createQuery("SELECT canciones.id,canciones.nombreCancion,canciones.tematica, canciones.tonalidad,canciones.genero, canciones.tempo
            FROM app\Entity\Canciones canciones"
        )
        ->getResult();
        

}

    // /**
    //  * @return Canciones[] Returns an array of Canciones objects
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
    public function findOneBySomeField($value): ?Canciones
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
