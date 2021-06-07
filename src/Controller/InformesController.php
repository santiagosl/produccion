<?php

namespace App\Controller;
use App\Entity\Login;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class InformesController extends AbstractController {
    
    /**
     * @Route("/informes", name="informes");
     * 
     */

    public function informes() { 
 
       return $this->render('informes.html.twig');
    }

}