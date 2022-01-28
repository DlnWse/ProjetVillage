<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\EventRepository;
use App\Repository\ActuRepository;
use App\Entity\Event;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\EventType; 
use App\Form\ActuType;


class DashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function index(): Response
    {
        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
            
        ]);
    }

        /**
     * @Route("/dashboard/crudTemplate", name="crudTemplate")
     */
    public function crudTemplate(): Response
    {
        return $this->render('crudTemplate.html.twig', [

        ]);
    }

    /**
     * @Route("/dashboard/crudEvent", name="crudEvent")
     */
    public function event(EventRepository $repoEvent): Response
    {
        $event = $repoEvent->findAll();
        return $this->render('dashboard/crudEvent.html.twig', [
            'event' => $event,
            
        ]);
    }

        /**
     * @Route("/dashboard/crudActu", name="crudActu")
     */
    public function actu(ActuRepository $repoActu): Response
    {
        $actu = $repoActu->findAll();
        return $this->render('dashboard/crudActu.html.twig', [
            'actu' => $actu,
            
        ]);
    }



}
