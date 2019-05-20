<?php

namespace App\DataFixtures;

use App\Entity\Couleur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class CouleurFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $rouge = new Couleur();
        $rouge->setNom("Rouge");
        $manager->persist($rouge);

        $rose = new Couleur();
        $rose->setNom("Rose");
        $manager->persist($rose);
        $this->addReference("couleur-rose", $rose);
        
        $jaune = new Couleur();
        $jaune->setNom("Jaune");
        $manager->persist($jaune);
        $this->addReference("couleur-jaune", $jaune);
        
        $vert = new Couleur();
        $vert->setNom("Vert");
        $manager->persist($vert);
        $this->addReference("couleur-vert", $vert);
        
        $violet = new Couleur();
        $violet->setNom("Violet");
        $manager->persist($violet);
        $this->addReference("couleur-violet", $violet);
        
        $bleu = new Couleur();
        $bleu->setNom("Bleu");
        $manager->persist($bleu);
        $this->addReference("couleur-bleu", $bleu);
        
        $manager->flush();
    }
}
