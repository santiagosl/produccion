<?php

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\Usuario;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Response;


class BorrarUsuariosController extends AbstractController 
{
    
    /**
    * @Route("/borrar_usuarios/{id}", name="borrar_usuarios");
    */

    public function borrar_usuarios(Request $request, $id) 
    { 

        $entityManager = $this->getDoctrine()->getManager(); 
        $repositorio = $this->getDoctrine()->getRepository(Usuario::class); 
        $usuario = $repositorio->find($id); 

        if ($usuario) 
        {
              $entityManager->remove($usuario); 

              try {

                  $entityManager->flush(); 
              } catch(\Exception $e){
                  return new Response ('No puede borrar el registro seleccionado');
              }
        }
        return $this->redirectToRoute('usuarios');
     }

        
}
