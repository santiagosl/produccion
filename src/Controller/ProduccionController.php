<?php

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Produccion;
use App\Entity\Cliente;
use App\Entity\Usuario;

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
use Symfony\Component\Validator\Constraints\DateTime;

class ProduccionController extends AbstractController 

{
    
  /**
   * @Route("/produccion", name="produccion");
   *
   */

    //Esta función se encarga de mandar el formulario a la vista producción.html.twig
    public function produccion(Request $request, string $archivoPDF)
  
  {
   
    $idCliente=$request->get('id');
    $repositorio = $this->getDoctrine()->getRepository(Cliente::class);
    $clienteSeleccionado = $repositorio->find($idCliente);

    $nuevaProduccion = new Produccion();

    $formulario = $this->createFormBuilder($nuevaProduccion)         
        ->add('referencia', TextType::class, array('label' => 'Referencia'))
      
        ->add('mecanica', FileType::class, 
              array('label' => 'Mecánica',
                    'required' => false))

        ->add('laminas', FileType::class, 
              array('label' => 'Laminas',
              'required' => false))

        ->add('embalaje', FileType::class, 
              array('label' => 'Embalaje',
              'required' => false))

        ->add('transporte', FileType::class,
              array('label' => 'Transporte',
              'required' => false))

        ->add('save', SubmitType::Class, array('label' => 'Enviar'))
      
        ->getForm();
      
      $formulario->handleRequest($request);

      if($formulario->isSubmitted() && $formulario->isValid())
      {

          $nuevaProduccion = $formulario->getData();
          $entityManager = $this->getDoctrine()->getManager();
          $entityManager->persist($nuevaProduccion);

          //Codigo que se encarga de subir los archivos MECANICA a la base de datos
          //En caso de introducir archivos se le asiganará una hora en incio y final de tarea.
          if($mecanica = $formulario['mecanica']->getData())
          {
            $nombreMecanica = bin2hex(random_bytes(6)). '.' . $mecanica->guessExtension();
            try {
              $mecanica->move($archivoPDF, $nombreMecanica);
            } catch (\FileException $e) {
                  return new Response ('Error al insertar archivo mecanica');
            }
            $nuevaProduccion->setMecanica($nombreMecanica);
          } else {
            $nuevaProduccion->setMecanica('');
            $nuevaProduccion->setFechaInicioMecanica(new \DateTime('Europe/Paris'));
            $nuevaProduccion->setFechaFinMecanica(new \DateTime('Europe/Paris'));
            
          }
          
          //Codigo que se encarga de subir los archivos LAMINAS a la base de datos
          //En caso de introducir archivos se le asiganará una hora en incio y final de tarea.
          if($laminas = $formulario['laminas']->getData())
          {
            $nombreLaminas = bin2hex(random_bytes(6)). '.' . $laminas->guessExtension();
            try {
              $laminas->move($archivoPDF, $nombreLaminas);
            } catch (\FileException $e) {
                return new Response ('Error al insertar archivo laminas');
            }
            $nuevaProduccion->setLaminas($nombreLaminas);
          } else {
            $nuevaProduccion->setLaminas('');
            $nuevaProduccion->setFechaInicioLaminas(new \DateTime('Europe/Paris'));
            $nuevaProduccion->setFechaFinLaminas(new \DateTime('Europe/Paris'));
          }

          //Codigo que se encarga de subir los archivos EMBALAJE a la base de datos
          //En caso de introducir archivos se le asiganará una hora en incio y final de tarea.
          if($embalaje = $formulario['embalaje']->getData())
          {
            $nombreEmbalaje = bin2hex(random_bytes(6)). '.' . $embalaje->guessExtension();
            try {
              $embalaje->move($archivoPDF, $nombreEmbalaje);
            } catch (\FileException $e) {
                  return new Response ('Error al insertar archivo embalaje'); 
            }
            $nuevaProduccion->setembalaje($nombreEmbalaje);
          } else {
            $nuevaProduccion->setEmbalaje('');
            $nuevaProduccion->setFechaInicioEmbalaje(new \DateTime('Europe/Paris'));
            $nuevaProduccion->setFechaFinEmbalaje(new \DateTime('Europe/Paris'));
          }

          //Codigo que se encarga de subir los archivos TRANSPORTE a la base de datos
          //En caso de introducir archivos se le asiganará una hora en incio y final de tarea.
          if($transporte = $formulario['transporte']->getData())
          {
            $nombreTransporte = bin2hex(random_bytes(6)). '.' . $transporte->guessExtension();
            try {
              $transporte->move($archivoPDF, $nombreTransporte);
            } catch (\FileException $e) {
                 return new Response ('Error al insertar archivo transporte');
            }
            $nuevaProduccion->settransporte($nombreTransporte);
          } else {
            $nuevaProduccion->setTransporte('');
            $nuevaProduccion->setFechaInicioTransporte(new \DateTime('Europe/Paris'));
            $nuevaProduccion->setFechaFinTransporte(new \DateTime('Europe/Paris'));
          }
          
           //Datos fijos introducidos, fecha, hora y fk de usuario y cliente
           $nuevaProduccion->setFechaCreacion(new \DateTime('Europe/Paris'));
           $nuevaProduccion->setFinalizado('NO');
           $nuevaProduccion->setIdUsuario($this->getUser());
           $nuevaProduccion->setIdCliente($clienteSeleccionado);
           
                  
          try {
              $entityManager->flush(); 
             

          } catch (\Exception $e){
              return new Response ('Error al insertar el usuario');
          }

            return $this->redirectToRoute('busca_lista_ordenes');
               
      }
        return $this->render('produccion.html.twig', array('formulario' => $formulario->createView()));
  }

} 

?>