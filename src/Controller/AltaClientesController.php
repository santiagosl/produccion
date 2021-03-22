<?php

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\Cliente;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AltaClientesController extends AbstractController {
    
    /**
     * @Route("/alta_clientes", name="alta_clientes");
     */

    public function alta_clientes(Request $request) { 

         $nuevoCliente = new Cliente();
         

         $formulario = $this->createFormBuilder($nuevoCliente) 
         
            ->add('nombre', TextType::class)
            ->add('direccion', TextType::class)
            ->add('cp', IntegerType::class)
            ->add('poblacion', TextType::class)
            ->add('provincia', TextType::class)
            ->add('telefono', IntegerType::class)
            ->add('mail', TextType::class)
            ->add('cif', TextType::class)
            ->add('web', TextType::class)
            ->add('save', SubmitType::Class, array('label' => 'Enviar'))
            ->getForm();
            
            $formulario->handleRequest($request);


            if($formulario->isSubmitted() && $formulario->isValid())
            {
                   
                $nuevoCliente = $formulario->getData();
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($nuevoCliente);
 
            try {
                $entityManager->flush(); 
            } catch (Exception $e){
                return new Response ('Error al insertar el usuario');
            }

                return $this->redirectToRoute('resumen');
            }

            return $this->render('alta_clientes.html.twig', array('formulario' => $formulario->createView()));
        
        }
        
    }
