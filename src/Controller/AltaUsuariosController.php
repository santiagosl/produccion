<?php

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AltaUsuariosController extends AbstractController {
    
    /**
     * @Route("/alta_usuarios", name="alta_usuarios");
     */

    public function alta_usuarios() { 
       return $this->render('alta_usuarios.html.twig');
    }
}


?>