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
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\HttpFoundation\Response;

class VerProduccionController extends AbstractController 
{
    
    /**
     * @Route("/ver_produccion", name="ver_produccion");
     */

    public function ver_produccion() 
    { 

    $repositorio = $this->getDoctrine()->getRepository(Produccion::class); 
    $verProduccion = $repositorio->findAll();
    return $this->render('ver_produccion.html.twig' ,array ('verProduccion' => $verProduccion));
    
    }

    public function test(){
        return new Response ("click");
    }
}

?>

