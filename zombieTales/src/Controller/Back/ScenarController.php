<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ScenarController extends AbstractController
{
    /**
     * @Route("/back/scenar", name="back_scenar")
     */
    public function index(): Response
    {
        return $this->render('back/scenar/index.html.twig', [
            'controller_name' => 'ScenarController',
        ]);
    }
}
