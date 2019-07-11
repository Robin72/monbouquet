<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CreerController extends AbstractController
{
    /**
     * @Route("/creer", name="creer")
     */
    public function index()
    {
        return $this->render('creer/index.html.twig', [
            'controller_name' => 'CreerController',
        ]);
    }
}
