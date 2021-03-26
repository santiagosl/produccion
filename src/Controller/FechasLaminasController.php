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

class FechasLaminasController extends AbstractController 
{
    

    /**
    * @Route("/fechaInicioLaminas/{id}", name="fechaInicioLaminas");
    */

    public function fechaInicioLaminas($id) 
    { 
          
        $repositorio = $this->getDoctrine()->getRepository(Produccion::class);
        $produccionActiva = $repositorio->find($id);

        $produccionActiva->setFechaInicioLaminas(new \DateTime('Europe/Paris'));

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

    /**
    * @Route("/fechaInicioLaminas/{id}", name="fechaFinLaminas");
    */

    public function fechaFinLaminas($id) 
    { 
          
        $repositorio = $this->getDoctrine()->getRepository(Produccion::class);
        $produccionActiva = $repositorio->find($id);

        $produccionActiva->setFechaFinLaminas(new \DateTime('Europe/Paris'));
        
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

