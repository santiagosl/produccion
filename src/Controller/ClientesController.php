<?php

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Cliente;

class ClientesController extends AbstractController 
{
    
    /**
     * @Route("/clientes", name="clientes");
     */

    public function clientes() { 

    $repositorio = $this->getDoctrine()->getRepository(Cliente::class); 
    $clientes = $repositorio->findAll();
    return $this->render('clientes.html.twig' ,array ('clientes' => $clientes));
    }
}


?>



        
