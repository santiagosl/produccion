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
        $produccionActiva->setHoraInicioMecanica(new \DateTime('Europe/Paris'));

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($produccionActiva);

        try {
            $entityManager->flush(); 
        } catch (Exception $e){
            return new Response ('Error al insertar datos');
        }

        $repositorio = $this->getDoctrine()->getRepository(Produccion::class); 
        $verProduccion = $repositorio->findBy(["id"=> $id]);
        //return $this->render('ver_produccion.html.twig' ,array ('verProduccion' => $verProduccion));
        return $this->redirect('http://localhost/produccion/public/lista_ordenes');
    
    }

    /**
     * @Route("/mecanicaFin/{id}", name="fechaFinMecanica");
     */

    public function fechaFinMecanica($id) 
    { 

          
        $repositorio = $this->getDoctrine()->getRepository(Produccion::class);
        $produccionActiva = $repositorio->find($id);

        $produccionActiva->setFechaFinMecanica(new \DateTime('Europe/Paris'));
        $produccionActiva->setHoraFinMecanica(new \DateTime('Europe/Paris'));
    
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($produccionActiva);

        try {
            $entityManager->flush(); 
        } catch (Exception $e){
            return new Response ('Error al insertar datos');
        }

        $repositorio = $this->getDoctrine()->getRepository(Produccion::class); 
        $verProduccion = $repositorio->findBy(["id"=> $id]);
        //return $this->render('ver_produccion.html.twig' ,array ('verProduccion' => $verProduccion));
        return $this->redirect('http://localhost/produccion/public/lista_ordenes');
    
    }
    
    /**
    * @Route("/laminasInicio/{id}", name="fechaInicioLaminas");
    */

    public function fechaInicioLaminas($id) 
    { 
          
        $repositorio = $this->getDoctrine()->getRepository(Produccion::class);
        $produccionActiva = $repositorio->find($id);

        $produccionActiva->setFechaInicioLaminas(new \DateTime());
        $produccionActiva->setHoraInicioLaminas(new \DateTime());

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

        $produccionActiva->setFechaFinLaminas(new \DateTime());
        $produccionActiva->setHoraFinLaminas(new \DateTime());

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

        $produccionActiva->setFechaInicioEmbalaje(new \DateTime());
        $produccionActiva->setHoraInicioEmbalaje(new \DateTime());

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

        $produccionActiva->setFechaFinEmbalaje(new \DateTime());
        $produccionActiva->setHoraFinEmbalaje(new \DateTime());

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

        $produccionActiva->setFechaInicioTransporte(new \DateTime());
        $produccionActiva->setHoraInicioTransporte(new \DateTime());

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

        $produccionActiva->setFechaFinTransporte(new \DateTime());
        $produccionActiva->setHoraFinTransporte(new \DateTime());

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


        $fechaInicio = $produccionActiva->getHoraInicioMecanica('Europe/Paris');
        $fechaFin = $produccionActiva->getHoraFinMecanica('Europe/Paris');
        $interval = date_diff($fechaInicio, $fechaFin);

        echo "<pre>";
        print_r($interval);
        echo "</pre>";

        $tiempo=array();

        foreach($interval as $valor){
            $tiempo[]=$valor;
        }

        $produccionActiva->setTiempoMecanica($tiempo[3]);

      
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

