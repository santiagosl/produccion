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

class VerProduccionController extends AbstractController {
    
    /**
    * @Route("/ver_produccion/{id}", name="ver_produccion");
    */

    public function ver_produccion(Request $request, $id) { 

        $repositorio = $this->getDoctrine()->getRepository(Produccion::class);
        $editarProduccion = $repositorio->find($id);
        
         $formulario = $this->createFormBuilder($editarProduccion) 
                     
            ->add('referencia', TextType::class)
           
            ->add('save', SubmitType::Class, array('label' => 'Enviar'))
            ->getForm();
            
            $formulario->handleRequest($request);

            if($formulario->isSubmitted() && $formulario->isValid())
            {
                   
                $nuevaProduccion = $formulario->getData();
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($nuevaProduccion);
 
            try {
                $entityManager->flush(); 
            } catch (Exception $e){
                return new Response ('Error al insertar la produccion');
            }

                return $this->redirectToRoute('lista_ordenes');
            }

            return $this->render('editar_produccion.html.twig', array('formulario' => $formulario->createView()));
        }
        
    }
