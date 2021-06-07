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
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

class EditarProduccionController extends AbstractController {
    
    /**
    * @Route("/editar_produccion/{id}", name="editar_produccion");
    */

    public function editar_produccion(Request $request, $id, $archivoPDF) { 

        $repositorio = $this->getDoctrine()->getRepository(Produccion::class);
        $editarProduccion = $repositorio->find($id);

        //Variables que uso en caso de editar el formulario y no se modifica uno de estos elementos, mantenga el nombre original.
        $mecanica_2 = $editarProduccion->getMecanica();
        $laminas_2 = $editarProduccion->getLaminas();
        $embalaje_2 = $editarProduccion->getEmbalaje();
        $transporte_2 = $editarProduccion->getTransporte();

        $formulario = $this->createFormBuilder($editarProduccion) 
                     
            ->add('referencia', IntegerType::class, array("label" =>"Numero de presupuesto:" , 'required' => false))
            ->add('mecanica',   FileType::class, array("label" => "Mecanica",   'required' => false, "attr" => array("class" => "table"), "data_class" => null))
            ->add('laminas',    FileType::class, array("label" => "Laminas",    'required' => false, "attr" => array("class" => "table"), "data_class" => null))
            ->add('embalaje',   FileType::class, array("label" => "Embalaje",   'required' => false, "attr" => array("class" => "table"), "data_class" => null))
            ->add('transporte', FileType::class, array("label" => "Transporte", 'required' => false, "attr" => array("class" => "table"), "data_class" => null))
            
            ->getForm();
            
            $formulario->handleRequest($request);

        if($formulario->isSubmitted() && $formulario->isValid())
        
        {

          $nuevaProduccion = $formulario->getData();
          $entityManager = $this->getDoctrine()->getManager();
          $entityManager->persist($nuevaProduccion);

          //Codigo que se encarga de copiar el archivo, cambiar el nombre y almacenarlo en el servido.
          //El nombre del archivo se cambiar y se almacena en la base de datos.
          if($mecanica = $formulario['mecanica']->getData())
          {
            $nombreMecanica = date("Ymd") . '_mecanica_' . $formulario->get("referencia")->getData() .  '.' . $mecanica->guessExtension();
            try {
              $mecanica->move($archivoPDF, $nombreMecanica);
            } catch (\FileException $e) {
                  return new Response ('Error al insertar archivo mecanica');
            }
            $nuevaProduccion->setMecanica($nombreMecanica);
          } else {

            $nuevaProduccion->setMecanica($mecanica_2);
          }  

          //Codigo que se encarga de copiar el archivo, cambiar el nombre y almacenarlo en el servido.
          //El nombre del archivo se cambiar y se almacena en la base de datos.
          if($laminas = $formulario['laminas']->getData())
          {
           
            $nombreLaminas = date("Ymd") . '_laminas_' . $formulario->get("referencia")->getData() .  '.' . $laminas->guessExtension();
            try {
              $laminas->move($archivoPDF, $nombreLaminas);
            } catch (\FileException $e) {
                return new Response ('Error al insertar archivo laminas');
            }
            $nuevaProduccion->setLaminas($nombreLaminas);
          } else {
            $nuevaProduccion->setLaminas($laminas_2);

          }

          //Codigo que se encarga de copiar el archivo, cambiar el nombre y almacenarlo en el servido.
          //El nombre del archivo se cambiar y se almacena en la base de datos.
          if($embalaje = $formulario['embalaje']->getData())
          {
           
            $nombreEmbalaje = date("Ymd") . '_embalaje_' . $formulario->get("referencia")->getData() .  '.' . $embalaje->guessExtension();
            try {
              $embalaje->move($archivoPDF, $nombreEmbalaje);
            } catch (\FileException $e) {
                  return new Response ('Error al insertar archivo embalaje'); 
            }
            $nuevaProduccion->setembalaje($nombreEmbalaje);
          } else {
            $nuevaProduccion->setEmbalaje($embalaje_2);

          }

          //Codigo que se encarga de copiar el archivo, cambiar el nombre y almacenarlo en el servido.
          //El nombre del archivo se cambiar y se almacena en la base de datos.
          if($transporte = $formulario['transporte']->getData())
          {
            
            $nombreTransporte = date("Ymd") . '_transporte_' . $formulario->get("referencia")->getData() .  '.' . $transporte->guessExtension();
            try {
              $transporte->move($archivoPDF, $nombreTransporte);
            } catch (\FileException $e) {
                 return new Response ('Error al insertar archivo transporte');
            }
            $nuevaProduccion->settransporte($nombreTransporte);
          } else {
            $nuevaProduccion->setTransporte($transporte_2);

          }
    
          try {

              $entityManager->flush(); 
          } catch (\Exception $e){

              return new Response ('Error al insertar los datos');
          }

            return $this->redirectToRoute('editar_produccion',['id' => $id]);

          }

          return $this->render('editar_produccion.html.twig', array('formulario' => $formulario->createView(), 'editarProduccion' => $editarProduccion));
          
        }


    // Estas funciones se encargarán de borrar el archivo.
    
    /**
    * @Route("/borrar_mecanica/{id}", name="borrar_mecanica");
    */

    public function borrar_mecanica(Request $request, $id) { 

        $entityManager = $this->getDoctrine()->getManager(); 
        $repositorio = $this->getDoctrine()->getRepository(Produccion::class); 
        $produccion = $repositorio->find($id); 
        if ($produccion) 
        {
              $produccion->setMecanica('');
              $produccion->setFechaInicioMecanica(null);
              $produccion->setFechaFinMecanica(null);
              
              try {

                  $entityManager->flush(); 
              } catch(\Exception $e){
                  return new Response ('Error al borrar el registro');
              }

              return $this->redirectToRoute('editar_produccion',['id' => $id]);
        }
        
        return $this->render('editar_produccion.html.twig', array('formulario' => $formulario->createView(), 'editarProduccion' => $editarProduccion));
     }
    

    /**
    * @Route("/borrar_laminas/{id}", name="borrar_laminas");
    */

    public function borrar_laminas(Request $request, $id) { 

        $entityManager = $this->getDoctrine()->getManager(); 
        $repositorio = $this->getDoctrine()->getRepository(Produccion::class); 
        $produccion = $repositorio->find($id); 
        if ($produccion) 
        {
              $produccion->setLaminas('');
              $produccion->setFechaInicioLaminas(null);
              $produccion->setFechaFinLaminas(null);
              
              try {

                  $entityManager->flush(); 
              } catch(\Exception $e){
                  return new Response ('Error al borrar el registro');
              }

              return $this->redirectToRoute('editar_produccion',['id' => $id]);
        }
        
        return $this->render('editar_produccion.html.twig', array('formulario' => $formulario->createView(), 'editarProduccion' => $editarProduccion));
     }

    /**
    * @Route("/borrar_transporte/{id}", name="borrar_transporte");
    */

    public function borrar_transporte(Request $request, $id) { 

        $entityManager = $this->getDoctrine()->getManager(); 
        $repositorio = $this->getDoctrine()->getRepository(Produccion::class); 
        $produccion = $repositorio->find($id); 
        if ($produccion) 
        {
              $produccion->settransporte('');
              $produccion->setFechaInicioTransporte(null);
              $produccion->setFechaFinTransporte(null);
              
              try {

                  $entityManager->flush(); 
              } catch(\Exception $e){
                  return new Response ('Error al borrar el registro');
              }

              return $this->redirectToRoute('editar_produccion',['id' => $id]);
        }
        
        return $this->render('editar_produccion.html.twig', array('formulario' => $formulario->createView(), 'editarProduccion' => $editarProduccion));
     }

     /**
    * @Route("/borrar_embalaje/{id}", name="borrar_embalaje");
    */

    public function borrar_embalaje(Request $request, $id) { 

        $entityManager = $this->getDoctrine()->getManager(); 
        $repositorio = $this->getDoctrine()->getRepository(Produccion::class); 
        $produccion = $repositorio->find($id); 
        if ($produccion) 
        {
              $produccion->setEmbalaje('');
              $produccion->setFechaInicioEmbalaje(null);
              $produccion->setFechaFinEmbalaje(null);
              
              try {

                  $entityManager->flush(); 
              } catch(\Exception $e){
                  return new Response ('Error al borrar el registro');
              }

              return $this->redirectToRoute('editar_produccion',['id' => $id]);
        }
        
        return $this->render('editar_produccion.html.twig', array('formulario' => $formulario->createView(), 'editarProduccion' => $editarProduccion));
     }
    
      }