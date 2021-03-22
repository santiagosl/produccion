<?php

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Login;
use App\Entity\Usuario;
use DateTimeInterface;





class LoginController extends AbstractController

{

/**
* @Route("/login", name="login")
*/
    public function login(Request $request, AuthenticationUtils $authenticationUtils)
    {
        
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('login.html.twig',
        array('error' => $error, 'lastUsername' => $lastUsername));
        registro();
        
    }
}

?>


<!-- 
    
        $registro = new Login();
        $registro->setNombreUsuario('santiago');
        $registro->setIdUsuario(1);
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($registro);
        $entityManager->flush(); 
 -->