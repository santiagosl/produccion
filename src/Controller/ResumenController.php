<?php

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ResumenController extends AbstractController {
    
    /**
     * @Route("/resumen", name="resumen");
     */

    public function resumen() { 
       return $this->render('resumen.html.twig');
    }
}


?>