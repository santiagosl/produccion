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
            $totalMecanica = date_diff($inicioMecanica,$finMecanica);
             
            $tiempoM = $totalMecanica->format('%D:%H:%I');
            $tiempoMecanica = preg_split("/:/",$tiempoM);
            $diasMecanica = $tiempoMecanica[0];
            $horasMecanica = $tiempoMecanica[1];
            $minMecanica = $tiempoMecanica[2];

            $totalMecanica =  ((($diasMecanica*24)*60) + ($horasMecanica*60) + $minMecanica)/60;

            $produccionActiva->setTiempoMecanica($totalMecanica);
        }

        
        //Calculo de Fechas para las laminas
        if ($produccionActiva->getFechaInicioLaminas() != null && $produccionActiva->getFechaFinLaminas() != null )
        {

            $inicioLaminas = $produccionActiva->getFechaInicioLaminas('Europe/Paris');
            $finLaminas = $produccionActiva->getFechaFinLaminas('Europe/Paris');
            $totalLaminas = $inicioLaminas->diff($finLaminas);
     
            $tiempoL = $totalLaminas->format('%D:%H:%I');
            $tiempoLaminas = preg_split("/:/",$tiempoL);
            $diasLaminas = $tiempoLaminas[0];
            $horasLaminas = $tiempoLaminas[1];
            $minLaminas = $tiempoLaminas[2];

            $totalLaminas =  ((($diasLaminas*24)*60) + ($horasLaminas*60) + $minLaminas)/60;

            $produccionActiva->setTiempoLaminas($totalLaminas);
        }

        //Calculo de Fechas para el embalaje
         if ($produccionActiva->getFechaInicioEmbalaje() != null && $produccionActiva->getFechaFinEmbalaje() != null )
        {
            $inicioEmbalaje = $produccionActiva->getFechaInicioEmbalaje('Europe/Paris');
            $finEmbalaje = $produccionActiva->getFechaFinEmbalaje('Europe/Paris');
            $totalEmbalaje = $inicioEmbalaje->diff($finEmbalaje);

            $tiempoE = $totalEmbalaje->format('%D:%H:%I');
            $tiempoEmbalaje = preg_split("/:/",$tiempoE);
            $diasEmbalaje = $tiempoEmbalaje[0];
            $horasEmbalaje = $tiempoEmbalaje[1];
            $minEmbalaje = $tiempoEmbalaje[2];

            $totalEmbalaje =  ((($diasEmbalaje*24)*60) + ($horasEmbalaje*60) + $minEmbalaje)/60;

            $produccionActiva->setTiempoEmbalaje($totalEmbalaje);
        }   

        //Calculo de Fechas para el transporte
        if ($produccionActiva->getFechaInicioTransporte() != null && $produccionActiva->getFechaFinTransporte() != null )
        {
            $inicioTransporte = $produccionActiva->getFechaInicioTransporte('Europe/Paris');
            $finTransporte = $produccionActiva->getFechaFinTransporte('Europe/Paris');
            $totalTransporte = $inicioTransporte->diff($finTransporte);

            $tiempoT = $totalTransporte->format('%D:%H:%I');
            $tiempoTransporte = preg_split("/:/",$tiempoT);
            $diasTransporte = $tiempoTransporte[0];
            $horasTransporte = $tiempoTransporte[1];
            $minTransporte = $tiempoTransporte[2];

            $totalTransporte =  ((($diasTransporte*24)*60) + ($horasTransporte*60) + $minTransporte)/60;

            $produccionActiva->setTiempoTransporte($totalTransporte);
        }

        //Recogemos todos los datos de la base de datos y los almacenamos en variables
        $tiempoMecancia = $produccionActiva->getTiempoMecanica();
        $tiempoLaminas = $produccionActiva->getTiempoLaminas();
        $tiempoEmbalaje = $produccionActiva->getTiempoEmbalaje();
        $tiempoTransporte = $produccionActiva->getTiempoTransporte();

        //Graba la fecha y Hora de finalizacion 
        $produccionActiva->setFechaFin(new \DateTime('Europe/Paris'));
        $produccionActiva->setFechaFin(new \DateTime('Europe/Paris'));
       

        //Hacemos la conversión a horas.
        $total = $tiempoMecancia + $tiempoEmbalaje + $tiempoTransporte + $tiempoLaminas;
        $produccionActiva->setTiempoTotal(round($total,0));

        //Preparamos los datos y los manda a la base de datos.
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($produccionActiva);

        try {
           
            $produccionActiva->setFinalizado('SI') ;
            $entityManager->flush();
            
        } catch (\Exception $e){

            return new Response ('Error al insertar datos');
        }

        $repositorio = $this->getDoctrine()->getRepository(Produccion::class); 
        $verProduccion = $repositorio->findBy(["id"=> $id]);
        return $this->render('ver_produccion.html.twig' ,array ('verProduccion' => $verProduccion));

    
    }
    

    
}

?>

