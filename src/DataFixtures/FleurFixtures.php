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
        $pivoine->setNom("Pivoine");
        $pivoine->setPhoto("pivoine.jpg");
        $pivoine->setPrix(2.50);
        $pivoine->setDescription("La pivoine c'est bla bla bla");
        $pivoine->addCouleur($this->getReference("couleur-rose"));
        $pivoine->addEvenement($this->getReference("evenement-mariage"));
        $pivoine->addSaison($this->getReference("saison-printemps"));
        $manager->persist($pivoine);

        $rose = new Fleur();
        $rose->setNom("Rose");
        $rose->setPhoto("rose.jpg");
        $rose->setPrix(2.50);
        $rose->setDescription("On aime passionnément cette brassée de roses rouges petits boutons !");
        $rose->addCouleur($this->getReference("couleur-rouge"));
        $rose->addEvenement($this->getReference("evenement-mariage"));
        $rose->addSaison($this->getReference("saison-ete"));
        $manager->persist($rose);

        $orchideepapillion = new Fleur();
        $orchideepapillion->setNom("Orchidée papillion");
        $orchideepapillion->setPhoto("orchideepapillion.jpg");
        $orchideepapillion->setPrix(39.00);
        $orchideepapillion->setDescription("Mon bouquet a sélectionné une mangifique orchidée Phaleanopsis de la variété 'So satisfed'");
        $orchideepapillion->addCouleur($this->getReference("couleur-rose"));
        $orchideepapillion->addEvenement($this->getReference("evenement-fetedesmeres"));
        $orchideepapillion->addSaison($this->getReference("saison-printemps"));
        $manager->persist($orchideepapillion);

        $phaleanopsisblanc = new Fleur();
        $phaleanopsisblanc->setNom("Phalaenopsis blanc");
        $phaleanopsisblanc->setPhoto("phaleanopsisn.jpg");
        $phaleanopsisblanc->setPrix(33.90);
        $phaleanopsisblanc->setDescription("So chic !");
        $phaleanopsisblanc->addCouleur($this->getReference("couleur-blanc"));
        $phaleanopsisblanc->addEvenement($this->getReference("evenement-mariage"));
        $phaleanopsisblanc->addSaison($this->getReference("saison-ete"));
        $manager->persist($phaleanopsisblanc);

        $germinisjaune = new Fleur();
        $germinisjaune->setNom("Germinis jaune");
        $germinisjaune->setPhoto("germinisjaune.jpg");
        $germinisjaune->setPrix(5.00);
        $germinisjaune->setDescription("Tendre et délicat, une fleur pensée pour la naissance d'un enfant");
        $germinisjaune->addCouleur($this->getReference("couleur-jaune"));
        $germinisjaune->addEvenement($this->getReference("evenement-naissance"));
        $germinisjaune->addSaison($this->getReference("saison-printemps"));
        $manager->persist($germinisjaune);

        $orchideenellyisler = new Fleur();
        $orchideenellyisler->setNom("Orchidée Nelly isler");
        $orchideenellyisler->setPhoto("orchideenelly.jpg");
        $orchideenellyisler->setPrix(29.00);
        $orchideenellyisler->setDescription("Découvrez l'odontoglesum Nelly Isler, plus connue sous le nom d'orchidée Cambria");
        $orchideenellyisler->addCouleur($this->getReference("couleur-rouge"));
        $orchideenellyisler->addEvenement($this->getReference("evenement-anniversaire"));
        $orchideenellyisler->addSaison($this->getReference("saison-ete"));
        $manager->persist($orchideenellyisler);

        $abtromeriarouge = new Fleur();
        $abtromeriarouge->setNom("Abstromeria rouge");
        $abtromeriarouge->setPhoto("abstromeriarouge.jpg");
        $abtromeriarouge->setPrix(2.10);
        $abtromeriarouge->setDescription("Offrez les fleurs aux couleurs de l'amour");
        $abtromeriarouge->addCouleur($this->getReference("couleur-rouge"));
        $abtromeriarouge->addEvenement($this->getReference("evenement-stvalentin"));
        $abtromeriarouge->addSaison($this->getReference("saison-hiver"));
        $manager->persist($abtromeriarouge);

        $oeillets = new Fleur();
        $oeillets->setNom("Oeillets rose pastel");
        $oeillets->setPhoto("oeilletrose.jpg");
        $oeillets->setPrix(3.70);
        $oeillets->setDescription("Les pétales de leurs fleurs sont généralement dentés, découpés voire laciniés");
        $oeillets->addCouleur($this->getReference("couleur-rose"));
        $oeillets->addEvenement($this->getReference("evenement-deuil"));
        $oeillets->addSaison($this->getReference("saison-automne"));
        $manager->persist($oeillets);

        $liliumoriental = new Fleur();
        $liliumoriental->setNom("Lilium oriental");
        $liliumoriental->setPhoto("liliumoriental.jpg");
        $liliumoriental->setPrix(4.10);
        $liliumoriental->setDescription("Le lis ou lys (Lilium) est une plante rustique à bulbes, composés d'écailles imbriqués, qui regroupe pas moins d'une centaine d'espèces.");
        $liliumoriental->addCouleur($this->getReference("couleur-blanc"));
        $liliumoriental->addEvenement($this->getReference("evenement-noel"));
        $liliumoriental->addSaison($this->getReference("saison-hiver"));
        $manager->persist($liliumoriental);

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
