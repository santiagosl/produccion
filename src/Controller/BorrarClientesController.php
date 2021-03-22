<?php

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\Cliente;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class BorrarClientesController extends AbstractController {
    
    /**
    * @Route("/borrar_clientes/{id}", name="borrar_clientes");
    */

    public function borrar_clientes(Request $request, $id) { 

        $entityManager = $this->getDoctrine()->getManager(); 
        $repositorio = $this->getDoctrine()->getRepository(Cliente::class); 
        $cliente = $repositorio->find($id); 
        if ($cliente) 
        {
              $entityManager->remove($cliente); 

              try {

                  $entityManager->flush(); 
              } catch(Exception $e){
                  return new Response ('Error al borrar el registro');
              }

        }
        return $this->redirectToRoute('clientes');
     }


        
    }
