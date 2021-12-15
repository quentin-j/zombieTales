<?php

namespace App\Controller\Back;

use App\Entity\Objectifs;
use App\Form\ObjectifsType;
use App\Repository\ObjectifsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/objectifs")
 */
class ObjectifsController extends AbstractController
{
    /**
     * @Route("/", name="objectifs_index", methods={"GET"})
     */
    public function index(ObjectifsRepository $objectifsRepository): Response
    {
        return $this->render('objectifs/index.html.twig', [
            'objectifs' => $objectifsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="objectifs_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $objectif = new Objectifs();
        $form = $this->createForm(ObjectifsType::class, $objectif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($objectif);
            $entityManager->flush();

            return $this->redirectToRoute('objectifs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('objectifs/new.html.twig', [
            'objectif' => $objectif,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="objectifs_show", methods={"GET"})
     */
    public function show(Objectifs $objectif): Response
    {
        return $this->render('objectifs/show.html.twig', [
            'objectif' => $objectif,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="objectifs_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Objectifs $objectif, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ObjectifsType::class, $objectif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('objectifs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('objectifs/edit.html.twig', [
            'objectif' => $objectif,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="objectifs_delete", methods={"POST"})
     */
    public function delete(Request $request, Objectifs $objectif, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$objectif->getId(), $request->request->get('_token'))) {
            $entityManager->remove($objectif);
            $entityManager->flush();
        }

        return $this->redirectToRoute('objectifs_index', [], Response::HTTP_SEE_OTHER);
    }
}
