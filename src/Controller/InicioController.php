<?php

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InicioController extends AbstractController {
    
    /**
     * @Route("/", name="inicio");
     */

    public function inicio() { 
       return $this->render('resumen.html.twig');
    }

}


?>