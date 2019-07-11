<?php

namespace App\Controller;

use App\Entity\Saison;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index()
    {

        $saisons = $this->getDoctrine()->getRepository(Saison::class)->findAll();

        return $this->render('default/index.html.twig', [
            'saisons' => $saisons,
        ]);
    }

}
