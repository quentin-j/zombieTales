<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class VersionController extends AbstractController
{
    /**
     * @Route("/back/version", name="back_version")
     */
    public function index(): Response
    {
        return $this->render('back/version/index.html.twig', [
            'controller_name' => 'VersionController',
        ]);
    }
}
