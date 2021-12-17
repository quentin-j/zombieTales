<?php

namespace App\Controller\Front\Form;

use App\Entity\SpecialRules;
use App\Form\SpecialRulesType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SpeRulesController extends AbstractController
{
      /**
     * @Route("/new/speRule/{id}", name="speRules_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $speRules = new SpecialRules();
        $form = $this->createForm(SpecialRulesType::class, $speRules);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($speRules);
            $entityManager->flush();

            return $this->redirectToRoute('speRules_new', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('front/form/objectifs/new.html.twig', [
            'speRules' => $speRules,
            'form' => $form,
        ]);
    }
}
