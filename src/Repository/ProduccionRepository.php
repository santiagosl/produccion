<?php

namespace App\Repository;

use App\Entity\Produccion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

use Doctrine\ORM\Tools\Pagination\Paginator;

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

    //Funcion para buscar por rango de fecha y si está finalizado o no.
       public function finalizado($fechaInicio,$fechaFinal): array 
    {
        $entityManager = $this->getEntityManager(); 
        $query = $entityManager->createQuery("SELECT produccion
                                                FROM App\Entity\Produccion produccion 
                                                WHERE produccion.finalizado = 'SI'
                                                AND produccion.fechaCreacion BETWEEN :fechaInicio and :fechaFinal");
        
        $query->setParameter('fechaInicio' , $fechaInicio) ;
        $query->setParameter('fechaFinal'  , $fechaFinal)  ;
        

        
        return $query->getResult();
    }

        public function noFinalizado($fechaInicio,$fechaFinal): array 
    {
        $entityManager = $this->getEntityManager(); 
        $query = $entityManager->createQuery("SELECT produccion
                                                FROM App\Entity\Produccion produccion 
                                                WHERE produccion.finalizado = 'NO'
                                                AND produccion.fechaCreacion BETWEEN :fechaInicio and :fechaFinal");
        
        $query->setParameter('fechaInicio' , $fechaInicio) ;
        $query->setParameter('fechaFinal'  , $fechaFinal)  ;
        

        
        return $query->getResult();
    }

          public function todos($fechaInicio,$fechaFinal): array 
    {
        $entityManager = $this->getEntityManager(); 
        $query = $entityManager->createQuery("SELECT produccion
                                                FROM App\Entity\Produccion produccion 
                                                WHERE produccion.fechaCreacion BETWEEN :fechaInicio and :fechaFinal");
        
        $query->setParameter('fechaInicio' , $fechaInicio) ;
        $query->setParameter('fechaFinal'  , $fechaFinal)  ;
        

        
        return $query->getResult();
    }

}

/* 

    public function nBuscar($nombre): array 
    {
       $entityManager = $this->getEntityManager(); 
       $query = $entityManager->createQuery('SELECT nombre FROM App\Entity\Cliente nombre WHERE nombre.nombre LIKE :nombre'); 
       $query->setParameter('nombre', '%' . $nombre . '%');
       return $query->getResult();
    }
    
*/

