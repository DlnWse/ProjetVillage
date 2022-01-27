<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Event;
use DateTime;
use DateTimeImmutable;

class EventFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        for ($i = 1 ; $i<=10; $i++) {
            $event = new Event();
            $event->setTitle("Titre de l'event n°$i")
                  ->setContent("<p>Contenu de l'event n°$i</p>")
                  ->setImage("https://picsum.photos/1920/250?random=$i")
                  ->setCreatedAt(new DateTime());

                  $manager->persist($event);
        }

        $manager->flush();
    }
}
