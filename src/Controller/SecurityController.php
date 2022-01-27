<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\RegistrationType;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\Security\Core\User\UserInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/register", name="register")
     */
    public function registration(Request $request, EntityManagerInterface $manager, UserPasswordEncoderInterface $encoder)
    {
        $user = new User();

        $form = $this->createForm(RegistrationType::class, $user);

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {

            $hash = $encoder->encodePassword($user, $user->getPassword());

            $user->setPassword($hash);
            
            $manager->persist($user);
            $manager->flush();
            return $this->redirectToRoute('connect');
        }

        return $this->render('security/registration.html.twig', [
            'form' => $form->CreateView()
        ]);
    }


        /**
     * @Route("/connect", name="connect")
     */
    public function login(){
        return $this->render('ville/connect.html.twig');
    }

     /**
     * @Route("/logout", name="logout")
     */
    public function logout(){
        
    }

}
