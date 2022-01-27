<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Actu;
use DateTime;

class ActuFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
       
        for ($i = 1 ; $i<=10; $i++) {
            $actu = new Actu();
            $actu->setTitle("Titre de l'actu n°$i")
                  ->setContent("<p>Contenu de l'actu n°$i</p>")
                  ->setImage("https://picsum.photos/1920/250?random=$i")
                  ->setCreatedAt(new DateTime());

                  $manager->persist($actu);
        }

        $manager->flush();
    }
}
