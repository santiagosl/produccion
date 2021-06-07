<?php


namespace App\Controller;

use App\Entity\Produccion;
use App\Entity\Cliente;
use App\Entity\Usuario;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;

class PdfController extends AbstractController 

{

    /**
    * @Route("/informeFinalizado ", name="informeFinalizado")
    */

    public function informeFinalizado(\Knp\Snappy\Pdf $snappy)
        {
            
        $produccion = '';
        $repositorio = $this->getDoctrine()->getRepository(Produccion::class); 

        $produccion = $repositorio->informeFinalizados();

        //Nueva orden
        $html = $this->renderView('pdf.html.twig', array('produccion' => $produccion,));

        return new PdfResponse(
        $snappy->getOutputFromHtml($html),
        'resumenProduccion.pdf'
        );
    
        }

    /**
    * @Route("/informePendientes ", name="informePendientes")
    */

    public function informePendientes(\Knp\Snappy\Pdf $snappy)
        {
            
        $produccion = '';
        $repositorio = $this->getDoctrine()->getRepository(Produccion::class); 

        $produccion = $repositorio->informePendientes();

        //Nueva orden
        $html = $this->renderView('pdf.html.twig', array('produccion' => $produccion,));

        return new PdfResponse(
        $snappy->getOutputFromHtml($html),
        'resumenProduccion.pdf'
        );
    
        }

    /**
    * @Route("/informeTodos ", name="informeTodos")
    */

    public function informeTodos(\Knp\Snappy\Pdf $snappy)
        {
            
        $produccion = '';
        $repositorio = $this->getDoctrine()->getRepository(Produccion::class); 

        $produccion = $repositorio->informeTodos();

        //Nueva orden
        $html = $this->renderView('pdf.html.twig', array('produccion' => $produccion,));

        return new PdfResponse(
        $snappy->getOutputFromHtml($html),
        'resumenProduccion.pdf'
        );
    
        }

    /**
    * @Route("/informeClientes ", name="informeClientes")
    */

    public function informeClientes(\Knp\Snappy\Pdf $snappy)
        {
            
        $produccion = '';
        $repositorio = $this->getDoctrine()->getRepository(Cliente::class); 

        $produccion = $repositorio->clientes();

        //Nueva orden
        $html = $this->renderView('clientepdf.html.twig', array('produccion' => $produccion,));

        return new PdfResponse(
        $snappy->getOutputFromHtml($html),
        'resumenCliente.pdf'
        );
    
        }

    /**
    * @Route("/informeUsuarios ", name="informeUsuarios")
    */

    public function informeUsuarios(\Knp\Snappy\Pdf $snappy)
        {
            
        $produccion = '';
        $repositorio = $this->getDoctrine()->getRepository(Usuario::class); 

        $produccion = $repositorio->usuarios();

        //Nueva orden
        $html = $this->renderView('usuariopdf.html.twig', array('produccion' => $produccion,));

        return new PdfResponse(
        $snappy->getOutputFromHtml($html),
        'resumenCliente.pdf'
        );
    
        }

}




