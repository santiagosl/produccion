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
   */


    public function produccion(Request $request, string $archivoPDF)
  
  {

   
    $idCliente=$request->get('id');
    $repositorio = $this->getDoctrine()->getRepository(Cliente::class);
    $clienteSeleccionado = $repositorio->find($idCliente);


    $nuevaProduccion = new Produccion();
    $formulario = $this->createFormBuilder($nuevaProduccion) 
        
    ->add('referencia', TextType::class, array('label' => 'Referencia'))
   
    ->add('mecanica', FileType::class, 
          array('label' => 'Mecánica PDF',
                'required' => false))

    ->add('laminas', FileType::class, 
          array('label' => 'Laminas PDF',
          'required' => false))

    ->add('embalaje', FileType::class, 
          array('label' => 'Embalaje PDF',
          'required' => false))

    ->add('transporte', FileType::class,
          array('label' => 'Transporte PDF',
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
          if($mecanica = $formulario['mecanica']->getData())
          {
            $nombreMecanica = bin2hex(random_bytes(6)). '.' . $mecanica->guessExtension();
            try {
              $mecanica->move($archivoPDF, $nombreMecanica);
            } catch (FileException $e) {

            }
            $nuevaProduccion->setMecanica($nombreMecanica);
          } else {
            $nuevaProduccion->setMecanica('');
            $nuevaProduccion->setFechaInicioMecanica(new \DateTime('Europe/Paris'));
            $nuevaProduccion->setFechaFinMecanica(new \DateTime('Europe/Paris'));
            
          }
          
          //Codigo que se encarga de subir los archivos LAMINAS a la base de datos
          if($laminas = $formulario['laminas']->getData())
          {
            $nombreLaminas = bin2hex(random_bytes(6)). '.' . $laminas->guessExtension();
            try {
              $laminas->move($archivoPDF, $nombreLaminas);
            } catch (FileException $e) {

            }
            $nuevaProduccion->setLaminas($nombreLaminas);
          } else {
            $nuevaProduccion->setLaminas('');
            $nuevaProduccion->setFechaInicioLaminas(new \DateTime('Europe/Paris'));
            $nuevaProduccion->setFechaFinLaminas(new \DateTime('Europe/Paris'));
          }

          //Codigo que se encarga de subir los archivos EMBALAJE a la base de datos
          if($embalaje = $formulario['embalaje']->getData())
          {
            $nombreEmbalaje = bin2hex(random_bytes(6)). '.' . $embalaje->guessExtension();
            try {
              $embalaje->move($archivoPDF, $nombreEmbalaje);
            } catch (FileException $e) {

            }
            $nuevaProduccion->setembalaje($nombreEmbalaje);
          } else {
            $nuevaProduccion->setEmbalaje('');
            $nuevaProduccion->setFechaInicioEmbalaje(new \DateTime('Europe/Paris'));
            $nuevaProduccion->setFechaFinEmbalaje(new \DateTime('Europe/Paris'));
          }

          //Codigo que se encarga de subir los archivos TRANSPORTE a la base de datos
          if($transporte = $formulario['transporte']->getData())
          {
            $nombreTransporte = bin2hex(random_bytes(6)). '.' . $transporte->guessExtension();
            try {
              $transporte->move($archivoPDF, $nombreTransporte);
            } catch (FileException $e) {

            }
            $nuevaProduccion->settransporte($nombreTransporte);
          } else {
            $nuevaProduccion->setTransporte('');
            $nuevaProduccion->setFechaInicioTransporte(new \DateTime('Europe/Paris'));
            $nuevaProduccion->setFechaFinTransporte(new \DateTime('Europe/Paris'));
          }
          
      
          //Datos fijos introducidos, fecha, hora y fk de usuario y cliente
           $nuevaProduccion->setFechaCreacion(new \DateTime('Europe/Paris'));
           
           $nuevaProduccion->setIdUsuario($this->getUser());
           $nuevaProduccion->setIdCliente($clienteSeleccionado);
           
                  
          try {
              $entityManager->flush(); 

          } catch (Exception $e){
              return new Response ('Error al insertar el usuario');
          }

            return $this->redirectToRoute('lista_ordenes');
               
      }
        return $this->render('produccion.html.twig', array('formulario' => $formulario->createView()));
  }

      /**
        * @Route("/selec_cliente_prod", name="selec_cliente_prod");
      */

      public function buscarCliente(Request $request){

          $buscar = '';
          $repositorio = $this->getDoctrine()->getRepository(Cliente::class); 
          $formCliente = $this->createFormBuilder()
          ->add('nombre', TextType::class)
          ->add('save', SubmitType::Class, array('label' => 'Buscar'))
          ->getForm();
          
          $formCliente->handleRequest($request);
          
          if($request->server->get('REQUEST_METHOD') == 'POST')
          {

            $nombre = $formCliente->getData();
            $buscar = $repositorio->nBuscar($nombre['nombre']);

          }
        
            return $this->render(
            'selec_cliente_produccion.html.twig', array
            (

            'formCliente' => $formCliente->createView(),'buscar' => $buscar,
          
            ));
        }

} 

?>