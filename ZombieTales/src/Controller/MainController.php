<?php

namespace App\Controller;

use App\Entity\Scenario;
use App\Repository\ScenarioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function homepage(ScenarioRepository $scenario): Response
    {
        return $this->render('main/homepage.html.twig', [
            'scenar_list' => $scenario->findAll(),
        ]);
    }

    /**
    * @Route("/scenario/{id}", name="scenario_read", requirements={"id"="\d+"}, methods={"GET", "POST"})
    */
    public function read(Scenario $scenario):Response
    {
        return $this->render('main/read.html.twig', [
            'scenar' => $scenario,
        ]);
    }
}
