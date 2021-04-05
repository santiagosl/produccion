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


class EstadisticasController extends AbstractController

{

  /**
   * @Route("/estadisticas", name="estadisticas");
   *
   */

    //Esta función se encarga de mandar el formulario a la vista producción.html.twig
    public function produccion(Request $request)

    {

      $produccion = '';
      $tiempoTotal='';
      $tiempoRecord='';
      $tiempoMedioMecanica='';
      $tiempoMedioLaminas='';
      $tiempoMedioEmbalaje='';
      $tiempoMedioTransporte='';

      $repositorio = $this->getDoctrine()->getRepository(Produccion::class);
      $formEstadisticas = $this->createFormBuilder()

      ->add('Desde', DateType::class, array('widget' => 'single_text', 'format' =>'yyyy-MM-dd', 'data' => new \DateTime('now - 1 month')))
      ->add('Hasta', DateType::class, array('widget' => 'single_text', 'format' =>'yyyy-MM-dd', 'data' => new \DateTime('now + 1 day')))
      ->add('save', SubmitType::Class, array('label' => 'Buscar'))
      ->getForm();

      $formEstadisticas->handleRequest($request);

      if($request->server->get('REQUEST_METHOD') == 'POST')
      {

        $Desde = $formEstadisticas->getData();
        $Hasta = $formEstadisticas->getData();

        $produccion = $repositorio->numPedidos($Desde['Desde'],$Hasta ['Hasta']);
		    $tiempoTotal = $repositorio->tiempoMedioTotal($Desde['Desde'],$Hasta ['Hasta']);
        $tiempoRecord = $repositorio->tiempoRecord($Desde['Desde'],$Hasta ['Hasta']);
        $tiempoMedioMecanica = $repositorio->tiempoMedioMecanica($Desde['Desde'],$Hasta ['Hasta']);
        $tiempoMedioLaminas = $repositorio->tiempoMedioLaminas($Desde['Desde'],$Hasta ['Hasta']);
        $tiempoMedioEmbalaje = $repositorio->tiempoMedioEmbalaje($Desde['Desde'],$Hasta ['Hasta']);
        $tiempoMedioTransporte = $repositorio->tiempoMedioTransporte($Desde['Desde'],$Hasta ['Hasta']);
      }


	  return $this->render('estadisticas.html.twig', array('formEstadisticas' => $formEstadisticas->createView(),
                                                          'produccion' => $produccion,
                                                          'tiempoTotal' => $tiempoTotal,
                                                          'tiempoRecord' => $tiempoRecord,
                                                          'tiempoMedioMecanica' => $tiempoMedioMecanica,
                                                          'tiempoMedioLaminas' => $tiempoMedioLaminas,
                                                          'tiempoMedioEmbalaje' => $tiempoMedioEmbalaje,
                                                          'tiempoMedioTransporte' => $tiempoMedioTransporte));

    }

}


?>