<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DasboardController extends AbstractController
{
    /**
     * @Route("/dasboard", name="dasboard")
     *
     * @IsGranted("ROLE_USER")
     * )
     */
    public function index()
    {
        return $this->render('dasboard/index.html.twig', [
            'controller_name' => 'DasboardController',
        ]);
    }
}
