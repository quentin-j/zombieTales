<?php

namespace App\Controller\Front\Form;

use App\Entity\Scenario;
use App\Form\ScenarioType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ScenarioController extends AbstractController
{
    /**
     * @Route("/new", name="scenario_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $scenario = new Scenario();
        $form = $this->createForm(ScenarioType::class, $scenario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($scenario);
            $entityManager->flush();
            dump($form);
            // return $this->redirectToRoute('objectifs_new', [], Response::HTTP_SEE_OTHER);
        }
        return $this->renderForm('front/form/scenario/new.html.twig', [
            'scenario' => $scenario,
            'form' => $form,
        ]);
    }
}
