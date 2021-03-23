<?php

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Produccion;
use App\Entity\Cliente;

class ListaOrdenesController extends AbstractController 
{
    
    /**
     * @Route("/lista_ordenes", name="lista_ordenes");
     */

    public function lista_ordenes() 
    { 

    $repositorio = $this->getDoctrine()->getRepository(Produccion::class); 
    $ordenesProd = $repositorio->findAll();
    return $this->render('lista_ordenes.html.twig' ,array ('ordenesProd' => $ordenesProd));
    
    }
}

?>

