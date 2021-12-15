<?php

namespace App\Controller\Back;

use App\Entity\SpecialRules;
use App\Form\SpecialRulesType;
use App\Repository\SpecialRulesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/special/rules")
 */
class SpecialRulesController extends AbstractController
{
    /**
     * @Route("/", name="special_rules_index", methods={"GET"})
     */
    public function index(SpecialRulesRepository $specialRulesRepository): Response
    {
        return $this->render('special_rules/index.html.twig', [
            'special_rules' => $specialRulesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="special_rules_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $specialRule = new SpecialRules();
        $form = $this->createForm(SpecialRulesType::class, $specialRule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($specialRule);
            $entityManager->flush();

            return $this->redirectToRoute('special_rules_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('special_rules/new.html.twig', [
            'special_rule' => $specialRule,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="special_rules_show", methods={"GET"})
     */
    public function show(SpecialRules $specialRule): Response
    {
        return $this->render('special_rules/show.html.twig', [
            'special_rule' => $specialRule,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="special_rules_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, SpecialRules $specialRule, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SpecialRulesType::class, $specialRule);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('special_rules_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('special_rules/edit.html.twig', [
            'special_rule' => $specialRule,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="special_rules_delete", methods={"POST"})
     */
    public function delete(Request $request, SpecialRules $specialRule, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$specialRule->getId(), $request->request->get('_token'))) {
            $entityManager->remove($specialRule);
            $entityManager->flush();
        }

        return $this->redirectToRoute('special_rules_index', [], Response::HTTP_SEE_OTHER);
    }
}
