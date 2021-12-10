<?php

namespace App\Controller\Back;

use App\Entity\Difficulty;
use App\Form\DifficultyType;
use App\Repository\DifficultyRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/back/difficulty")
 */
class DifficultyController extends AbstractController
{
    /**
     * @Route("/", name="back_difficulty_index", methods={"GET"})
     */
    public function index(DifficultyRepository $difficultyRepository): Response
    {
        return $this->render('back/difficulty/index.html.twig', [
            'difficulties' => $difficultyRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="back_difficulty_new", methods={"GET", "POST"})
     */
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $difficulty = new Difficulty();
        $form = $this->createForm(DifficultyType::class, $difficulty);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($difficulty);
            $entityManager->flush();

            return $this->redirectToRoute('back_difficulty_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/difficulty/new.html.twig', [
            'difficulty' => $difficulty,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="back_difficulty_show", methods={"GET"})
     */
    public function show(Difficulty $difficulty): Response
    {
        return $this->render('back/difficulty/show.html.twig', [
            'difficulty' => $difficulty,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="back_difficulty_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Difficulty $difficulty, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DifficultyType::class, $difficulty);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('back_difficulty_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('back/difficulty/edit.html.twig', [
            'difficulty' => $difficulty,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="back_difficulty_delete", methods={"POST"})
     */
    public function delete(Request $request, Difficulty $difficulty, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$difficulty->getId(), $request->request->get('_token'))) {
            $entityManager->remove($difficulty);
            $entityManager->flush();
        }

        return $this->redirectToRoute('back_difficulty_index', [], Response::HTTP_SEE_OTHER);
    }
}
