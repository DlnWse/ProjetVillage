<?php

namespace App\Controller;

use App\Entity\Actu;
use App\Entity\Event;
use App\Repository\EventRepository;
use App\Repository\ActuRepository;
use App\Form\EventType; 
use App\Form\ActuType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

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
     * @Route("/event/{id}/edit", name="editEvent")
     */
    public function formEvent(Event $event = null, Request $request, EntityManagerInterface $manager): Response

    {
        if (!$event) {
            $event = new Event();
        }

        $form = $this -> createForm(EventType::class, $event);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!$event->getId()) {
                $event->setCreatedAt(new \DateTime());
            }

            $manager->persist($event);
            $manager->flush();

            return $this->redirectToRoute('eventShow', ['id' => $event->getId()]);
        }

        return $this->render('ville/createEvent.html.twig', [
            'formEvent' => $form->createView(),
            'editMode' => $event->getId() !== null

        ]);
    }

    /**
     * @Route("/actu/new", name="createActu")
     * @Route("/actu/{id}/edit", name="editActu")
     */
    public function formActu(Actu $actu = null, Request $request, EntityManagerInterface $manager): Response
    {
        if (!$actu) {
            $actu = new Actu();
        }

        $form = $this -> createForm(ActuType::class, $actu);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!$actu->getId()) {
                $actu->setCreatedAt(new \DateTime());
            }

            $manager->persist($actu);
            $manager->flush();

            return $this->redirectToRoute('actuShow', ['id' => $actu->getId()]);
        }

        return $this->render('ville/createActu.html.twig', [
            'formActu' => $form->createView(),
            'editMode' => $actu->getId() !== null

        ]);
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
