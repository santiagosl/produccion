<?php

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProduccionController extends AbstractController {
    
    /**
     * @Route("/produccion", name="produccion");
     */

    public function produccion() { 
       return $this->render('produccion.html.twig');
    }
}


?>