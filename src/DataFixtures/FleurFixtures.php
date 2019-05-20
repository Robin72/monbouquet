<?php

namespace App\DataFixtures;

use App\Entity\Fleur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class FleurFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $pivoine = new Fleur();
        $pivoine->setPhoto("pivoine.jpg");
        $pivoine->setPrix(2.50);
        $pivoine->setDescription("La pivoine c'est bla bla bla");
        $pivoine->addCouleur($this->getReference("couleur-rose"));
        $manager->persist($pivoine);

        $manager->flush();
    }

    public function getDependencies(): array {
        return [
            CouleurFixtures::class,
            EvenementFixtures::class,
            SaisonFixtures::class
        ];
    }

}
