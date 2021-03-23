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

class GenerarProduccionController extends AbstractController {
    
    /**
     * @Route("/generar", name="generar");
     */

    public function generar(Request $request) { 

         $nuevaProduccion = new Produccion();
         
         $formulario = $this->createFormBuilder($nuevaProduccion) 
         
            ->add('nombre', TextType::class)
            ->add('apellidos', TextType::class)
            ->add('password', PasswordType::class)
            ->add('rol', TextType::class,array('label' => 'Valores aceptados: ROLE_USER, ROLE_ADMIN'))
            ->add('save', SubmitType::Class, array('label' => 'Enviar'))
            ->getForm();
            
            $formulario->handleRequest($request);


            if($formulario->isSubmitted() && $formulario->isValid())
            {

                $produccion = $formulario->getData();
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($produccion);
 
            try {
                $entityManager->flush(); 
            } catch (Exception $e){
                return new Response ('Error al insertar el usuario');
            }

                return $this->redirectToRoute('usuarios');
            }

            return $this->render('alta_usuarios.html.twig', array('formulario' => $formulario->createView()));
        
        }
        
    }


?>