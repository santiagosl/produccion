<?php

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Login;
use App\Entity\Usuario;
use Symfony\Component\HttpFoundation\ParameterBag;


class LoginController extends AbstractController

{

/**
* @Route("/login", name="login")
*/
    public function login(AuthenticationUtils $authenticationUtils, Request $request)
    {

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('login.html.twig',
        array('error' => $error, 'lastUsername' => $lastUsername));    
    }
}

?>

<!--        
        // para hacer los resgistros de cada inicio de sesión en la base de datos //

          $usuarioRegistro = new Usuario();
            $registro = new Login();
            
            $registro->setNombreUsuario('santi');
            $registro->setFecha(new \DateTime());
            $registro->setHora(new \DateTime());
            $registro->setIdUsuario($request->request->get(1));
            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($registro);
            

            try {
                $entityManager->flush(); 
            } catch (Exception $e){
                return new Response ('Error al insertar el usuario');
            }
 -->