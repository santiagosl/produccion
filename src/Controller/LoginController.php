<?php

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Login;
use App\Entity\Usuario;
use Symfony\Component\HttpFoundation\Response;


class LoginController extends AbstractController

{

    /**
    * @Route("/login", name="login")
    */
    public function login(AuthenticationUtils $authenticationUtils, Request $request)
    {

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
        return $this->render('login.html.twig', array('error' => $error, 'lastUsername' => $lastUsername));    
    }
}

?>
