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

class FechasEmbalajeController extends AbstractController 
{
    

     /**
    * @Route("/fechaInicioEmbalaje/{id}", name="fechaInicioEmbalaje");
    */

    public function fechaInicioEmbalaje($id) 
    { 
          
        $repositorio = $this->getDoctrine()->getRepository(Produccion::class);
        $produccionActiva = $repositorio->find($id);

        $produccionActiva->setFechaInicioEmbalaje(new \DateTime('Europe/Paris'));

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($produccionActiva);

        if($produccionActiva)
        {

            try {
                $self = $_SERVER['PHP_SELF'];
                header("refresh:0.1; url=$self/$id");
                $entityManager->flush(); 
            } catch (\Exception $e){
                return new Response ('Error al insertar datos');
            }
            return $this->redirectToRoute('ver_produccion',['id' => $id]);
        }

        $repositorio = $this->getDoctrine()->getRepository(Produccion::class); 
        $verProduccion = $repositorio->findBy(["id"=> $id]);
        return $this->render('ver_produccion.html.twig' ,array ('verProduccion' => $verProduccion));
    
    }

    /**
    * @Route("/fechaFinEmbalaje/{id}", name="fechaFinEmbalaje");
    */

    public function fechaFinEmbalaje($id) 
    { 
          
        $repositorio = $this->getDoctrine()->getRepository(Produccion::class);
        $produccionActiva = $repositorio->find($id);

        $produccionActiva->setFechaFinEmbalaje(new \DateTime('Europe/Paris'));
        $produccionActiva->setUsuarioFinEmbalaje($this->getUser());
       
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($produccionActiva);

        if($produccionActiva)
        {

            try {
     
                $entityManager->flush(); 
            } catch (\Exception $e){
                return new Response ('Error al insertar datos');
            }
            return $this->redirectToRoute('ver_produccion',['id' => $id]);
        }

        $repositorio = $this->getDoctrine()->getRepository(Produccion::class); 
        $verProduccion = $repositorio->findBy(["id"=> $id]);
        return $this->render('ver_produccion.html.twig' ,array ('verProduccion' => $verProduccion));
    
    }

    
}

?>

