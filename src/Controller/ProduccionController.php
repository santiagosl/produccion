<?php

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

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

    public function buscar() { 
       return new response('has hecho clic');
    }
}


?>