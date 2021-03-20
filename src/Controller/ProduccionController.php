<?php

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class ProduccionController extends AbstractController {
    
    /**
     * @Route("/produccion", name="produccion");
     */

    public function produccion() { 
       return $this->render('produccion.html.twig');
    }

        
    /**
     * @Route("/buscarCliente", name="buscar");
     */

    public function buscar(Request $cli) { 
      $cliente = $cli->request->get('cliente'); 
      return new response($cliente);
    }


     /**
     * @Route("/generar", name="generar");
     */

    public function generar(Request $generar) { 
      $orden = $generar->request->get('referencia');
      $cliente = $generar->request->get('value');
      return new Response($orden . $cliente);
    }
}


?>