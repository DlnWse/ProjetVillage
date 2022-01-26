<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\RegistrationType;
use App\Entity\User;

class SecurityController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     */
    public function registration()
    {
            $user = new User();

       $form = $this->createForm(RegistrationType::class, $user);

       return $this->render('security/registration.html.twig', [
           'form' => $form->CreateView()
       ]);
    }
}
