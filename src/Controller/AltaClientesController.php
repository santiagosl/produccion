<?php

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AltaClientesController extends AbstractController {
    
    /**
     * @Route("/alta_clientes", name="alta_clientes");
     */

    public function alta_clientes() { 
       return $this->render('alta_clientes.html.twig');
    }
}


?>