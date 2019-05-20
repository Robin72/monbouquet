<?php

namespace App\DataFixtures;

use App\Entity\Evenement;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class EvenementFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $mariage = new Evenement();
        $mariage->setType("Mariage");
        $manager->persist($mariage);
        
        $anniversaire = new Evenement();
        $anniversaire->setType("Anniversaire");
        $manager->persist($anniversaire);
        
        $fetedesmeres = new Evenement();
        $fetedesmeres->setType("Fête des mères");
        $fetedesmeres->setMois(5);
        $manager->persist($fetedesmeres);
        
        $noel = new Evenement();
        $noel->setType("Noël");
        $noel->setMois(12);
        $manager->persist($noel);
        
        $naissance = new Evenement();
        $naissance->setType("Naissance");
        $manager->persist($naissance);
        
        $deuil = new Evenement();
        $deuil->setType("Deuil");
        $manager->persist($deuil);
        
        $stvalentin = new Evenement();
        $stvalentin->setType("Saint Valentin");
        $stvalentin->setMois(2);
        $manager->persist($stvalentin);

        $manager->flush();
    }
}
