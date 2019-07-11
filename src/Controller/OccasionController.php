<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class OccasionController extends AbstractController
{
    /**
     * @Route("/occasion", name="occasion")
     */
    public function index()
    {
        return $this->render('occasion/index.html.twig', [
            'controller_name' => 'OccasionController',
        ]);
    }
}
