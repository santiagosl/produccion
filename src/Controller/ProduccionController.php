<?php

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Produccion;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use Symfony\Component\Form\Extension\Core\Type\FileType;

use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;


class ProduccionController extends AbstractController 

{
    
  /**
   * @Route("/produccion", name="produccion");
   */

    public function buscarCliente(Request $request)
  
  {
        
    $nuevaProduccion = new Produccion();
    $formulario = $this->createFormBuilder($nuevaProduccion) 

      
    ->add('referencia', TextType::class, array('label' => 'Referencia'))
    ->add('mecanica', FileType::class, array('label' => 'Mecánica PDF'))
    ->add('laminas', FileType::class, array('label' => 'Laminas PDF'))
    ->add('embalaje', FileType::class, array('label' => 'Embalaje PDF'))
    ->add('transporte', FileType::class, array('label' => 'Transporte PDF'))
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
              return new Response ('Error al insertar el usuario');
          }

            return $this->redirectToRoute('produccion');
      }

            return $this->render('produccion.html.twig', array('formulario' => $formulario->createView()));
        
  }
       
} 

?>