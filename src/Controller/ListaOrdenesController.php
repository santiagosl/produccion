<?php

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ListaOrdenesController extends AbstractController {
    
    /**
     * @Route("/lista_ordenes", name="lista_ordenes");
     */

    public function lista_ordenes() { 
       return $this->render('lista_ordenes.html.twig');
    }
}


?>