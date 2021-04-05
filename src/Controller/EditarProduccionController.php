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

class EditarProduccionController extends AbstractController {
    
    /**
    * @Route("/editar_produccion/{id}", name="editar_produccion");
    */

    public function editar_produccion(Request $request, $id) { 

        $repositorio = $this->getDoctrine()->getRepository(Produccion::class);
        $editarProduccion = $repositorio->find($id);
        
         $formulario = $this->createFormBuilder($editarProduccion) 
                     
            ->add('referencia', TextType::class, array('required' => false))
            ->add('mecanica',   FileType::class, array("label" => "Mecanica",   'required' => false, "attr" => array("class" => "table"), "data_class" => null))
            ->add('laminas',    FileType::class, array("label" => "Laminas",    'required' => false,    "attr" => array("class" => "table"), "data_class" => null))
            ->add('embalaje',   FileType::class, array("label" => "Embalaje",   'required' => false,   "attr" => array("class" => "table"), "data_class" => null))
            ->add('transporte', FileType::class, array("label" => "Transporte", 'required' => false, "attr" => array("class" => "table"), "data_class" => null))
            ->add('save',       SubmitType::Class, array('label' => 'Enviar'))
            ->getForm();
            
            $formulario->handleRequest($request);

            if($formulario->isSubmitted() && $formulario->isValid())
            {
                   
                $nuevaProduccion = $formulario->getData();
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($nuevaProduccion);
 
            try {
                $entityManager->flush(); 
            } catch (\Exception $e){
                return new Response ('Error al insertar la produccion');
            }

                return $this->redirectToRoute('lista_ordenes');
            }

            return $this->render('editar_produccion.html.twig', array('formulario' => $formulario->createView()));
        }
        
    }
