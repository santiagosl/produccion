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
use Symfony\Component\HttpFoundation\Response;

class EditarClientesController extends AbstractController {
    
    /**
    * @Route("/editar_clientes/{id}", name="editar_clientes");
    */

    public function editar_clientes(Request $request, $id) { 

        $repositorio = $this->getDoctrine()->getRepository(Cliente::class);
        $editarClientes = $repositorio->find($id);
        
         $formulario = $this->createFormBuilder($editarClientes) 
                     
            ->add('nombre', TextType::class)
            ->add('direccion', TextType::class)
            ->add('cp', IntegerType::class)
            ->add('poblacion', TextType::class)
            ->add('provincia', TextType::class)
            ->add('telefono', IntegerType::class)
            ->add('mail', TextType::class)
            ->add('cif', TextType::class)
            ->add('web', TextType::class)
            //->add('save', SubmitType::Class, array('label' => 'Enviar'))
            ->getForm();
            
            $formulario->handleRequest($request);

            if($formulario->isSubmitted() && $formulario->isValid())
            {
                   
                $nuevoCliente = $formulario->getData();
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($nuevoCliente);
 
            try {
                $entityManager->flush(); 
            } catch (\Exception $e){
                return new Response ('Error al insertar el cliente');
            }

                return $this->redirectToRoute('clientes');
            }

            return $this->render('editar_clientes.html.twig', array('formulario' => $formulario->createView()));
        }
        
    }
