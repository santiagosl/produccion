<?php

namespace App\Repository;

use App\Entity\Usuario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Usuario|null find($id, $lockMode = null, $lockVersion = null)
 * @method Usuario|null findOneBy(array $criteria, array $orderBy = null)
 * @method Usuario[]    findAll()
 * @method Usuario[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsuarioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Usuario::class);
    }

    // /**
    //  * @return Usuario[] Returns an array of Usuario objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Usuario
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

       public function nBuscar($nombre): array 
    {
       $entityManager = $this->getEntityManager(); 
       $query = $entityManager->createQuery('SELECT nombre FROM App\Entity\Usuario nombre WHERE nombre.nombre LIKE :nombre'); 
       $query->setParameter('nombre', '%' . $nombre . '%');
       return $query->getResult();
    }

        //Funcion para buscar por rango de fecha y si está finalizado o no.
        public function usuarios(): array 
    {
        $entityManager = $this->getEntityManager(); 
        $query = $entityManager->createQuery("SELECT Usuario
                                                FROM App\Entity\Usuario Usuario 
                                                ");
        
        return $query->getResult();
    }
}
