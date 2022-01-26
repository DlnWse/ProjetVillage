<?php

namespace App\Controller;

use App\Entity\Actu;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Event;
use App\Repository\EventRepository;
use App\Repository\ActuRepository;

class VilleController extends AbstractController
{

    /**
     * @Route("/ville", name="ville")
     */
    public function index(): Response
    {
        return $this->render('ville/index.html.twig', [
            'controller_name' => 'VilleController',
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home(ActuRepository $repoActu, EventRepository $repoEvent): Response
    {
        $actu = $repoActu->findOneBy(['id' => '9']);
        $actu2 = $repoActu->findOneBy(['id' => '10']);
        $event = $repoEvent->findOneBy(['id' => '9']);
        $event2 = $repoEvent->findOneBy(['id' => '10']);
        return $this->render('ville/home.html.twig', [
            'actu' => $actu,
            'actu2' => $actu2,
            'event' => $event,
            'event2' => $event2
        ]);
    }

    /**
     * @Route("/actu", name="actu")
     */
    public function actu(ActuRepository $repoActu): Response
    {
        $actu = $repoActu->findAll();
        return $this->render('ville/actu.html.twig', [
            'actu' => $actu
        ]);
    }

    /**
     * @Route("/event", name="event")
     */
    public function event(EventRepository $repoEvent): Response
    {
        $event = $repoEvent->findAll();
        return $this->render('ville/event.html.twig', [
            'event' => $event
        ]);
    }

    /**
     * @Route("/contact", name="contact")
     */
    public function contact(): Response
    {
        return $this->render('ville/contact.html.twig', []);
    }

    /**
     * @Route("/connect", name="connect")
     */
    public function connect(): Response
    {
        return $this->render('ville/connect.html.twig', []);
    }

        /**
     * @Route("/event/new", name="createEvent")
     */
    public function createEvent(): Response
    {
        return $this->render('ville/createEvent.html.twig', []);
    }

        /**
     * @Route("/actu/new", name="createActu")
     */
    public function createActu(): Response
    {
        return $this->render('ville/createActu.html.twig', []);
    }

    /**
     * @Route("/event/{id}", name="eventShow")
     */
    public function showEvent(Event $event): Response
    {

        return $this->render('ville/eventShow.html.twig', [
            'event' => $event

        ]);
    }

    /**
     * @Route("/actu/{id}", name="actuShow")
     */
    public function showActu(Actu $actu): Response
    {

        return $this->render('ville/actuShow.html.twig', [
            'actu' => $actu

        ]);
    }
}
