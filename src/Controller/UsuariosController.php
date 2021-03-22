<?php

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Usuario;

class UsuariosController extends AbstractController {
    
    /**
     * @Route("/usuarios", name="usuarios");
     */

    public function usuarios() { 

    $repositorio = $this->getDoctrine()->getRepository(Usuario::class); 
    $usuarios = $repositorio->findAll();
    return $this->render('usuarios.html.twig' ,array ('usuarios' => $usuarios));
    }
}


?>



        
