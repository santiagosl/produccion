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
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Response;

class AltaUsuariosController extends AbstractController {
    
    /**
     * @Route("/alta_usuarios", name="alta_usuarios");
     */

    public function alta_usuarios(Request $request, UserPasswordEncoderInterface $encoder) { 

         $nuevoUsuario = new Usuario();
         

         $formulario = $this->createFormBuilder($nuevoUsuario) 
         
            ->add('nombre', TextType::class)
            ->add('apellidos', TextType::class)
            ->add('password', PasswordType::class)
            ->add('rol', ChoiceType::class, array('choices'=> array('Usuario' => 'ROLE_USER','Administrador' => 'ROLE_ADMIN')))
            ->add('save', SubmitType::Class, array('label' => 'Enviar'))
            ->getForm();
            
            $formulario->handleRequest($request);


            if($formulario->isSubmitted() && $formulario->isValid())
            {
                
                //Encriptamos la contraseña antes de enviarla a la BBDD.
                $passwordCodificado = $encoder->encodePassword($nuevoUsuario, $formulario->get('password')->getData()); 
                $nuevoUsuario->setPassword($passwordCodificado);
                
                $nuevoUsuario = $formulario->getData();
                $entityManager = $this->getDoctrine()->getManager();
                
                $nuevoUsuario->setIdUsuario($this->getUser());
                
                $entityManager->persist($nuevoUsuario);
 
            try {
                $entityManager->flush(); 
            } catch (\Exception $e){
                return new Response ('Error al insertar el usuario');
            }

                return $this->redirectToRoute('usuarios');
            }

            return $this->render('alta_usuarios.html.twig', array('formulario' => $formulario->createView()));
        
        }
        
    }


?>