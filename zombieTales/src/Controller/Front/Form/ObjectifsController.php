<?php

namespace App\Controller\Front\Form;

use App\Entity\Objectifs;
use App\Form\ObjectifsType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ObjectifsController extends AbstractController
{
   /**
     * @Route("/new/objectifs/{id}", name="objectif_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $objectif = new Objectifs();
        $form = $this->createForm(ObjectifsType::class, $objectif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($objectif);
            $entityManager->flush();

            return $this->redirectToRoute('speRules_new', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('front/form/objectifs/new.html.twig', [
            'objectif' => $objectif,
            'form' => $form,
        ]);
    }
}
