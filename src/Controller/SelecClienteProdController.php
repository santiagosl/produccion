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



class SelecClienteProdController extends AbstractController 

{
    
  /**
  * @Route("/seleccionarClienteProd", name="selec_cliente_produccion");
  */

  public function buscarCliente(Request $request)
  {

      $buscar = '';
      $repositorio = $this->getDoctrine()->getRepository(Cliente::class); 
      $formCliente = $this->createFormBuilder()
      ->add('nombre', TextType::class, array('required' => false))
      ->add('save', SubmitType::Class, array('label' => 'Buscar'))
      ->getForm();
      
      $formCliente->handleRequest($request);
      
      if($request->server->get('REQUEST_METHOD') == 'POST')
      {

        $nombre = $formCliente->getData();
        $buscar = $repositorio->nBuscar($nombre['nombre']);

      }
  
      return $this->render(
      'selec_cliente_produccion.html.twig', array(

      'formCliente' => $formCliente->createView(),'buscar' => $buscar,
    
      ));
  }

} 

?>