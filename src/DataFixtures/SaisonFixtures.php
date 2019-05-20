<?php

namespace App\DataFixtures;

use App\Entity\Saison;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class SaisonFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $printemps = new Saison();
        $printemps->setNom("Printemps");
        $printemps->setMoisDebut(3);
        $printemps->setMoisFin(5);
        $manager->persist($printemps);
        
        $ete = new Saison();
        $ete->setNom("Eté");
        $ete->setMoisDebut(6);
        $ete->setMoisFin(8);
        $manager->persist($ete);
        
        $automne = new Saison();
        $automne->setNom("Automne");
        $automne->setMoisDebut(7);
        $automne->setMoisFin(9);
        $manager->persist($automne);

        $hiver = new Saison();
        $hiver->setNom("Hiver");
        $hiver->setMoisDebut(10);
        $hiver->setMoisFin(2);
        $manager->persist($hiver);

        $manager->flush();
    }
}
