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

        //Funcion para buscar por rango de fecha y si está finalizado o no.
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


        //Funcion que devuelve todos los resultados dentro de un rango de fechas
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

        //Funcion el numero de pedidos dentro de un rango de fechas
        public function numPedidos($Desde,$Hasta)
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery("SELECT produccion FROM App\Entity\Produccion produccion
                                            WHERE produccion.fechaCreacion BETWEEN :Desde and :Hasta
                                            AND produccion.finalizado = 'SI' ");


        $query->setParameter('Desde'  , $Desde);
        $query->setParameter('Hasta'  , $Hasta);
        $array = $query->getResult();
        return count($array);
    }

        //Funcion tiempo medio total de todos los pedidos finalizados y con un rango de fechas
        public function tiempoMedioTotal($Desde,$Hasta)
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery("SELECT avg(produccion.tiempoTotal) FROM App\Entity\Produccion produccion
                                            WHERE produccion.fechaCreacion BETWEEN :Desde and :Hasta
                                            AND produccion.finalizado = 'SI' ");


        $query->setParameter('Desde'  , $Desde);
        $query->setParameter('Hasta'  , $Hasta);
        $tiempoMedio = $query->getResult();
        return $tiempoMedio[0][1];
    }

        //Funcion el mejor tiempo de todos los pedidos finalizados y con un rango de fechas
        public function tiempoRecord($Desde,$Hasta)
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery("SELECT min(produccion.tiempoTotal) FROM App\Entity\Produccion produccion
                                            WHERE produccion.fechaCreacion BETWEEN :Desde and :Hasta
                                            AND produccion.finalizado = 'SI' ");


        $query->setParameter('Desde'  , $Desde);
        $query->setParameter('Hasta'  , $Hasta);
        $tiempoRecord = $query->getResult();
        return $tiempoRecord[0][1];
    }

        //Funcion tiempo medio mecanica de todos los pedidos finalizados y con un rango de fechas
        public function tiempoMedioMecanica($Desde,$Hasta)
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery("SELECT avg(produccion.tiempoMecanica) FROM App\Entity\Produccion produccion
                                            WHERE produccion.fechaCreacion BETWEEN :Desde and :Hasta
                                            AND produccion.finalizado = 'SI' ");


        $query->setParameter('Desde'  , $Desde);
        $query->setParameter('Hasta'  , $Hasta);
        $tiempoMedio = $query->getResult();
        return $tiempoMedio[0][1];
    }

    
        //Funcion tiempo medio laminas de todos los pedidos finalizados y con un rango de fechas
        public function tiempoMedioLaminas($Desde,$Hasta)
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery("SELECT avg(produccion.tiempoLaminas) FROM App\Entity\Produccion produccion
                                            WHERE produccion.fechaCreacion BETWEEN :Desde and :Hasta
                                            AND produccion.finalizado = 'SI' ");


        $query->setParameter('Desde'  , $Desde);
        $query->setParameter('Hasta'  , $Hasta);
        $tiempoMedio = $query->getResult();
        return $tiempoMedio[0][1];
    }

        
        //Funcion tiempo medio embalaje de todos los pedidos finalizados y con un rango de fechas
        public function tiempoMedioEmbalaje($Desde,$Hasta)
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery("SELECT avg(produccion.tiempoEmbalaje) FROM App\Entity\Produccion produccion
                                            WHERE produccion.fechaCreacion BETWEEN :Desde and :Hasta
                                            AND produccion.finalizado = 'SI' ");


        $query->setParameter('Desde'  , $Desde);
        $query->setParameter('Hasta'  , $Hasta);
        $tiempoMedio = $query->getResult();
        return $tiempoMedio[0][1];
    }
            
        //Funcion tiempo medio transporte de todos los pedidos finalizados y con un rango de fechas
        public function tiempoMedioTransporte($Desde,$Hasta)
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery("SELECT avg(produccion.tiempoTransporte) FROM App\Entity\Produccion produccion
                                            WHERE produccion.fechaCreacion BETWEEN :Desde and :Hasta
                                            AND produccion.finalizado = 'SI' ");


        $query->setParameter('Desde'  , $Desde);
        $query->setParameter('Hasta'  , $Hasta);
        $tiempoMedio = $query->getResult();
        return $tiempoMedio[0][1];
    }

        //Funcion que devuelve todos los resultados para los informes
        public function informeFinalizados(): array 
    {
        $entityManager = $this->getEntityManager(); 
        $query = $entityManager->createQuery("SELECT produccion
                                                FROM App\Entity\Produccion produccion 
                                                WHERE produccion.finalizado = 'SI'");
       
        return $query->getResult();
    }

        //Funcion que devuelve los resultados pendientes para los informes
        public function informePendientes(): array 
    {
        $entityManager = $this->getEntityManager(); 
        $query = $entityManager->createQuery("SELECT produccion
                                                FROM App\Entity\Produccion produccion 
                                                WHERE produccion.finalizado = 'NO'");
       
        return $query->getResult();
    }

        //Funcion que devuelve los resultados de todos los partes para los informes
        public function informeTodos(): array 
    {
        $entityManager = $this->getEntityManager(); 
        $query = $entityManager->createQuery("SELECT produccion
                                                FROM App\Entity\Produccion produccion 
                                                ");
       
        return $query->getResult();
    }

}
