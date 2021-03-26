<?php

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\Produccion;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\DateTime;
use Symfony\Component\HttpFoundation\RedirectResponse;

class FechasFinProduccionController extends AbstractController 
{
    
   /**
    * @Route("/finProduccion/{id}", name="finProduccion");
    */

    public function finProduccion($id) 
    { 
          
        $repositorio = $this->getDoctrine()->getRepository(Produccion::class);
        $produccionActiva = $repositorio->find($id);

        //Calculo de Fechas para la mecanica
         if ($produccionActiva->getFechaInicioMecanica() != null && $produccionActiva->getFechaFinMecanica() != null )
        {
            $inicioMecanica = $produccionActiva->getFechaInicioMecanica('Europe/Paris');
            $finMecanica = $produccionActiva->getFechaFinMecanica('Europe/Paris');
            $totalMecanica = $inicioMecanica->diff($finMecanica);
            
            $produccionActiva->setTiempoMecanica($totalMecanica->format('%D:%H:%I'));
        }

        
        //Calculo de Fechas para las laminas
        if ($produccionActiva->getFechaInicioLaminas() != null && $produccionActiva->getFechaFinLaminas() != null )
        {

            $inicioLaminas = $produccionActiva->getFechaInicioLaminas('Europe/Paris');
            $finLaminas = $produccionActiva->getFechaFinLaminas('Europe/Paris');
            $totalLaminas = $inicioLaminas->diff($finLaminas);
     
            $produccionActiva->setTiempoLaminas($totalLaminas->format('%D:%H:%I'));
        }

        //Calculo de Fechas para el embalaje
         if ($produccionActiva->getFechaInicioEmbalaje() != null && $produccionActiva->getFechaFinEmbalaje() != null )
        {
            $inicioEmbalaje = $produccionActiva->getFechaInicioEmbalaje('Europe/Paris');
            $finEmbalaje = $produccionActiva->getFechaFinEmbalaje('Europe/Paris');
            $totalEmbalaje = $inicioEmbalaje->diff($finEmbalaje);

            $produccionActiva->setTiempoEmbalaje($totalEmbalaje->format('%D:%H:%I'));
        }   

        //Calculo de Fechas para el transporte
        if ($produccionActiva->getFechaInicioTransporte() != null && $produccionActiva->getFechaFinTransporte() != null )
        {
            $inicioTransporte = $produccionActiva->getFechaInicioTransporte('Europe/Paris');
            $finTransporte = $produccionActiva->getFechaFinTransporte('Europe/Paris');
            $totalTransporte = $inicioTransporte->diff($finTransporte);

            $produccionActiva->setTiempoTransporte($totalTransporte->format('%D:%H:%I'));
        }

         //Suma de todos los tiempos finalizados y lo almacenamos en la base de datos.
        $tiempoMecancia = $produccionActiva->getTiempoMecanica();
        $tiempoLaminas = $produccionActiva->getTiempoLaminas();
        $tiempoEmbalaje = $produccionActiva->getTiempoEmbalaje();
        $tiempoTransporte = $produccionActiva->getTiempoTransporte();

        //Graba la fecha y Fecha de finalizacion 
        $produccionActiva->setFechaFin(new \DateTime('Europe/Paris'));
        $produccionActiva->setFechaFin(new \DateTime('Europe/Paris'));

        
        $tiempoM = preg_split("/:/",$tiempoMecancia);
        $tiempoL = preg_split("/:/",$tiempoLaminas);
        $tiempoE = preg_split("/:/",$tiempoEmbalaje);
        $tiempoT = preg_split("/:/",$tiempoTransporte);
        

        $diasT =     (int)$tiempoM[0] + (int)$tiempoL[0] + (int)$tiempoE[0] + (int)$tiempoT[0];
        $horasT =    (int)$tiempoM[1] + (int)$tiempoL[1] + (int)$tiempoE[1] + (int)$tiempoT[1];
        $minutosT =  (int)$tiempoM[2] + (int)$tiempoL[2] + (int)$tiempoE[2] + (int)$tiempoT[2];   

        $total = ((($diasT/24)*60) + ($horasT*60) + $minutosT)/60;
        $produccionActiva->setTiempoTotal(round($total,0));

        //Preparamos los datos y los manda a la base de datos.
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($produccionActiva);

        try {
            $self = $_SERVER['PHP_SELF'];
            header("refresh:0.1; url=$self/$id");
            $entityManager->flush(); 
        } catch (Exception $e){
            return new Response ('Error al insertar datos');
        }

        $repositorio = $this->getDoctrine()->getRepository(Produccion::class); 
        $verProduccion = $repositorio->findBy(["id"=> $id]);
        return $this->render('ver_produccion.html.twig' ,array ('verProduccion' => $verProduccion));

    
    }
    

    
}

?>

