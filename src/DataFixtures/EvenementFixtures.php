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
        $this->addReference("evenement-mariage", $mariage);
        
        $anniversaire = new Evenement();
        $anniversaire->setType("Anniversaire");
        $manager->persist($anniversaire);
        $this->addReference("evenement-anniversaire", $anniversaire);
        
        $fetedesmeres = new Evenement();
        $fetedesmeres->setType("Fête des mères");
        $fetedesmeres->setMois(5);
        $manager->persist($fetedesmeres);
        $this->addReference("evenement-fetedesmeres", $fetedesmeres);

        
        $noel = new Evenement();
        $noel->setType("Noël");
        $noel->setMois(12);
        $manager->persist($noel);
        $this->addReference("evenement-noel", $noel);
        
        $naissance = new Evenement();
        $naissance->setType("Naissance");
        $manager->persist($naissance);
        $this->addReference("evenement-naissance", $naissance);
        
        $deuil = new Evenement();
        $deuil->setType("Deuil");
        $manager->persist($deuil);
        $this->addReference("evenement-deuil", $deuil);
        
        $stvalentin = new Evenement();
        $stvalentin->setType("Saint Valentin");
        $stvalentin->setMois(2);
        $manager->persist($stvalentin);
        $this->addReference("evenement-stvalentin", $stvalentin);

        $manager->flush();
    }
}
