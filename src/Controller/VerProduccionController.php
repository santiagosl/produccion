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

class VerProduccionController extends AbstractController 
{
    
    /**
     * @Route("/{id}", name="ver_produccion");
     */

    public function ver_produccion(Request $request, $id) 
    { 

    $repositorio = $this->getDoctrine()->getRepository(Produccion::class); 
    $verProduccion = $repositorio->findBy(["id"=> $id]);
    return $this->render('ver_produccion.html.twig' ,array ('verProduccion' => $verProduccion));
    
    }

     /**
     * @Route("/fechaInicioMecanica/{id}", name="fechaInicioMecanica");
     */

    public function fechaInicioMecanica($id) 
    { 

          
        $repositorio = $this->getDoctrine()->getRepository(Produccion::class);
        $produccionActiva = $repositorio->find($id);

        $produccionActiva->setFechaInicioMecanica(new \DateTime('Europe/Paris'));
        

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($produccionActiva);

        try {
            $entityManager->flush(); 
        } catch (Exception $e){
            return new Response ('Error al insertar datos');
        }

        $repositorio = $this->getDoctrine()->getRepository(Produccion::class); 
        $verProduccion = $repositorio->findBy(["id"=> $id]);
        return $this->render('ver_produccion.html.twig' ,array ('verProduccion' => $verProduccion));

    
    }

    /**
     * @Route("/mecanicaFin/{id}", name="fechaFinMecanica");
     */

    public function fechaFinMecanica($id) 
    { 

          
        $repositorio = $this->getDoctrine()->getRepository(Produccion::class);
        $produccionActiva = $repositorio->find($id);

        $produccionActiva->setFechaFinMecanica(new \DateTime('Europe/Paris'));
        
    
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($produccionActiva);

        try {
            $entityManager->flush(); 
        } catch (Exception $e){
            return new Response ('Error al insertar datos');
        }

        $repositorio = $this->getDoctrine()->getRepository(Produccion::class); 
        $verProduccion = $repositorio->findBy(["id"=> $id]);
        return $this->render('ver_produccion.html.twig' ,array ('verProduccion' => $verProduccion));
    
    }
    
    /**
    * @Route("/laminasInicio/{id}", name="fechaInicioLaminas");
    */

    public function fechaInicioLaminas($id) 
    { 
          
        $repositorio = $this->getDoctrine()->getRepository(Produccion::class);
        $produccionActiva = $repositorio->find($id);

        $produccionActiva->setFechaInicioLaminas(new \DateTime('Europe/Paris'));
      

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($produccionActiva);

        try {
            $entityManager->flush(); 
        } catch (Exception $e){
            return new Response ('Error al insertar datos');
        }

        $repositorio = $this->getDoctrine()->getRepository(Produccion::class); 
        $verProduccion = $repositorio->findBy(["id"=> $id]);
        return $this->render('ver_produccion.html.twig' ,array ('verProduccion' => $verProduccion));
    
    }

    /**
    * @Route("/laminasFin/{id}", name="fechaFinLaminas");
    */

    public function fechaFinLaminas($id) 
    { 
          
        $repositorio = $this->getDoctrine()->getRepository(Produccion::class);
        $produccionActiva = $repositorio->find($id);

        $produccionActiva->setFechaFinLaminas(new \DateTime('Europe/Paris'));
        

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($produccionActiva);

        try {
            $entityManager->flush(); 
        } catch (Exception $e){
            return new Response ('Error al insertar datos');
        }

        $repositorio = $this->getDoctrine()->getRepository(Produccion::class); 
        $verProduccion = $repositorio->findBy(["id"=> $id]);
        return $this->render('ver_produccion.html.twig' ,array ('verProduccion' => $verProduccion));
    
    }

    /**
    * @Route("/embalajeInicio/{id}", name="fechaInicioEmbalaje");
    */

    public function fechaInicioEmbalaje($id) 
    { 
          
        $repositorio = $this->getDoctrine()->getRepository(Produccion::class);
        $produccionActiva = $repositorio->find($id);

        $produccionActiva->setFechaInicioEmbalaje(new \DateTime('Europe/Paris'));


        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($produccionActiva);

        try {
            $entityManager->flush(); 
        } catch (Exception $e){
            return new Response ('Error al insertar datos');
        }

        $repositorio = $this->getDoctrine()->getRepository(Produccion::class); 
        $verProduccion = $repositorio->findBy(["id"=> $id]);
        return $this->render('ver_produccion.html.twig' ,array ('verProduccion' => $verProduccion));
    
    }

    /**
    * @Route("/embalajeFin/{id}", name="fechaFinEmbalaje");
    */

    public function fechaFinEmbalaje($id) 
    { 
          
        $repositorio = $this->getDoctrine()->getRepository(Produccion::class);
        $produccionActiva = $repositorio->find($id);

        $produccionActiva->setFechaFinEmbalaje(new \DateTime('Europe/Paris'));
       

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($produccionActiva);

        try {
            $entityManager->flush(); 
        } catch (Exception $e){
            return new Response ('Error al insertar datos');
        }

        $repositorio = $this->getDoctrine()->getRepository(Produccion::class); 
        $verProduccion = $repositorio->findBy(["id"=> $id]);
        return $this->render('ver_produccion.html.twig' ,array ('verProduccion' => $verProduccion));
    
    }

    /**
    * @Route("/transporteInicio/{id}", name="fechaInicioTransporte");
    */

    public function fechaInicioTransporte($id) 
    { 
          
        $repositorio = $this->getDoctrine()->getRepository(Produccion::class);
        $produccionActiva = $repositorio->find($id);

        $produccionActiva->setFechaInicioTransporte(new \DateTime('Europe/Paris'));


        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($produccionActiva);

        try {
            $entityManager->flush(); 
        } catch (Exception $e){
            return new Response ('Error al insertar datos');
        }

        $repositorio = $this->getDoctrine()->getRepository(Produccion::class); 
        $verProduccion = $repositorio->findBy(["id"=> $id]);
        return $this->render('ver_produccion.html.twig' ,array ('verProduccion' => $verProduccion));
    
    }

    /**
    * @Route("/transporteFin/{id}", name="fechaFinTransporte");
    */

    public function fechaFinTransporte($id) 
    { 
          
        $repositorio = $this->getDoctrine()->getRepository(Produccion::class);
        $produccionActiva = $repositorio->find($id);

        $produccionActiva->setFechaFinTransporte(new \DateTime('Europe/Paris'));
  

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($produccionActiva);

        try {
            $entityManager->flush(); 
        } catch (Exception $e){
            return new Response ('Error al insertar datos');
        }

        $repositorio = $this->getDoctrine()->getRepository(Produccion::class); 
        $verProduccion = $repositorio->findBy(["id"=> $id]);
        return $this->render('ver_produccion.html.twig' ,array ('verProduccion' => $verProduccion));
    
    }

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

        }

            $produccionActiva->setTiempoMecanica($totalMecanica->format('%D dias - %H:%I:%S'));
        
        //Calculo de Fechas para las laminas
        if ($produccionActiva->getFechaInicioLaminas() != null && $produccionActiva->getFechaFinLaminas() != null )
        {

            $inicioLaminas = $produccionActiva->getFechaInicioLaminas('Europe/Paris');
            $finLaminas = $produccionActiva->getFechaFinLaminas('Europe/Paris');
            $totalLaminas = $inicioLaminas->diff($finLaminas);
     
            $produccionActiva->setTiempoLaminas($totalLaminas->format('%D dias - %H:%I:%S'));
      
        }

        //Calculo de Fechas para el embalaje
         if ($produccionActiva->getFechaInicioEmbalaje() != null && $produccionActiva->getFechaFinEmbalaje() != null )
        {
            $inicioEmbalaje = $produccionActiva->getFechaInicioEmbalaje('Europe/Paris');
            $finEmbalaje = $produccionActiva->getFechaFinEmbalaje('Europe/Paris');
            $totalEmbalaje = $inicioEmbalaje->diff($finEmbalaje);


            $produccionActiva->setTiempoEmbalaje($totalEmbalaje->format('%D dias - %H:%I:%S'));
        }   

        //Calculo de Fechas para el transporte
        if ($produccionActiva->getFechaInicioTransporte() != null && $produccionActiva->getFechaFinTransporte() != null )
        {
            $inicioTransporte = $produccionActiva->getFechaInicioTransporte('Europe/Paris');
            $finTransporte = $produccionActiva->getFechaFinTransporte('Europe/Paris');
            $totalTransporte = $inicioTransporte->diff($finTransporte);

            $produccionActiva->setTiempoTransporte($totalTransporte->format('%D dias - %H:%I:%S'));
        }

        //Graba la fecha y Fecha de finalizacion 

        $produccionActiva->setFechaFin(new \DateTime('Europe/Paris'));
        $produccionActiva->setFechaFin(new \DateTime('Europe/Paris'));




        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($produccionActiva);

        try {
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

