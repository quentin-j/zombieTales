<?php

namespace App\Controller\Back;

use App\Entity\Scenario;
use App\Form\ScenarioType;
use App\Repository\ScenarioRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/back/scenario")
 */
class ScenarioController extends AbstractController
{
    /**
     * @Route("/", name="back_scenario_index", methods={"GET"})
     */
    public function index(ScenarioRepository $scenarioRepository): Response
    {
        return $this->render('back/scenario/index.html.twig', [
            'scenarios' => $scenarioRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="back_scenario_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $scenario = new Scenario();
        $form = $this->createForm(ScenarioType::class, $scenario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($scenario);
            $entityManager->flush();

            return $this->redirectToRoute('back_scenario_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/scenario/new.html.twig', [
            'scenario' => $scenario,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="back_scenario_show", methods={"GET"})
     */
    public function show(Scenario $scenario): Response
    {
        return $this->render('back/scenario/show.html.twig', [
            'scenario' => $scenario,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="back_scenario_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Scenario $scenario, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ScenarioType::class, $scenario);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('back_scenario_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/scenario/edit.html.twig', [
            'scenario' => $scenario,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="back_scenario_delete", methods={"POST"})
     */
    public function delete(Request $request, Scenario $scenario, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$scenario->getId(), $request->request->get('_token'))) {
            $entityManager->remove($scenario);
            $entityManager->flush();
        }

        return $this->redirectToRoute('back_scenario_index', [], Response::HTTP_SEE_OTHER);
    }
}
