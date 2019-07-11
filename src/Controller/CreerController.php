<?php

namespace App\Controller;


use App\Entity\Couleur;
use App\Entity\Evenement;
use App\Entity\Saison;
use App\Entity\Fleur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CreerController extends AbstractController
{
    /**
     * @Route("/creer", name="creer")
     */
    public function index()
    {

        $saisons = $this->getDoctrine()->getRepository(Saison::class)->findAll();
        $fleurs = $this->getDoctrine()->getRepository(Fleur::class)->findAll();
        $evenements = $this->getDoctrine()->getRepository(Evenement::class)->findAll();
        $couleurs = $this->getDoctrine()->getRepository(Couleur::class)->findAll();
        return $this->render('creer/index.html.twig', [
            'controller_name' => 'CreerController',
            'saisons' => $saisons,
            'fleurs' => $fleurs,
            'evenements' => $evenements,
            'couleurs' => $couleurs,
        ]);
    }

    /**
     * @Route("/composition", name="composition")
     */
    public function composition(Request $request)
    {
        $nbFleurs = $request->query->get('nb-fleurs');
        $couleurs = $request->query->get('couleurs');

        dump($couleurs);

        $fleurs = $this->getDoctrine()->getRepository(Fleur::class)->search($nbFleurs, $couleurs);

        return $this->render('creer/composition.html.twig', [
            'fleurs' => $fleurs
        ]);
    }

}


