<?php

namespace App\Controller;
use App\Entity\Login;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class InicioController extends AbstractController {
    
    /**
     * @Route("/", name="inicio");
     * 
     */

    public function inicio() { 
 
       return $this->render('resumen.html.twig');
    }

}
