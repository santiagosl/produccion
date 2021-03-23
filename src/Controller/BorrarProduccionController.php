<?php

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use App\Entity\Produccion;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class BorrarProduccionController extends AbstractController {
    
    /**
    * @Route("/borrar_produccion/{id}", name="borrar_produccion");
    */

    public function borrar_produccion(Request $request, $id) { 

        $entityManager = $this->getDoctrine()->getManager(); 
        $repositorio = $this->getDoctrine()->getRepository(Produccion::class); 
        $produccion = $repositorio->find($id); 
        if ($produccion) 
        {
              $entityManager->remove($produccion); 

              try {

                  $entityManager->flush(); 
              } catch(Exception $e){
                  return new Response ('Error al borrar el registro');
              }

        } else {
             return new Response ('No se puede borrar el último registro');
        }
        return $this->redirectToRoute('lista_ordenes');
     }


        
    }
