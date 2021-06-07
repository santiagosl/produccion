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
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;


class BuscaListaOrdenesController extends AbstractController 

{
    
  /**
  * @Route("/busquedaOrdenes", name="busca_lista_ordenes");
  */

  public function buscarProduccion(Request $request)
  {

      $produccion = '';
      $repositorio = $this->getDoctrine()->getRepository(Produccion::class); 
      $formProduccion = $this->createFormBuilder()
      ->add('Finalizado', ChoiceType::class, array('choices'=> array('No Finalizado' => 'NO','Finalizado' => 'SI','Todos' => 'r')))
      ->add('FechaInicio', DateType::class, array('widget' => 'single_text', 'format' =>'yyyy-MM-dd', 'data' => new \DateTime('now - 1 month')))
      ->add('FechaFinal', DateType::class, array('widget' => 'single_text', 'format' =>'yyyy-MM-dd', 'data' => new \DateTime('now + 1 day')))
      ->add('save', SubmitType::Class, array('label' => 'Buscar'))
      ->getForm();
      
      $formProduccion->handleRequest($request);
      
      if($request->server->get('REQUEST_METHOD') == 'POST')
      {
        $Finalizado = $formProduccion->getData();
        $FechaInicio = $formProduccion->getData();
        $FechaFinal = $formProduccion->getData();
        
        if($Finalizado['Finalizado'] == 'SI'){
          $produccion = $repositorio->finalizado($FechaInicio['FechaInicio'],
                                                 $FechaFinal ['FechaFinal']);
        } else if($Finalizado['Finalizado'] == 'NO')
        {
           $produccion = $repositorio->noFinalizado($FechaInicio['FechaInicio'],
                                                    $FechaFinal ['FechaFinal']);
        }
        else 
        {
          $produccion = $repositorio->todos($FechaInicio['FechaInicio'],
                                                   $FechaFinal ['FechaFinal']);
        } 

      }

      return $this->render('busca_lista_ordenes.html.twig', array('formProduccion' => $formProduccion->createView(),'produccion' => $produccion,));
  }

} 

?>