<?php

namespace App\Repository;

use App\Entity\Produccion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Produccion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produccion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produccion[]    findAll()
 * @method Produccion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduccionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produccion::class);
    }

    // /**
    //  * @return Produccion[] Returns an array of Produccion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Produccion
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
