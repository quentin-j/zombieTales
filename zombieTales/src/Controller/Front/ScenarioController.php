<?php

namespace App\Controller\Front;

use App\Entity\Scenario;
use App\Form\ScenarioType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ScenarioController extends AbstractController
{
    /**
     * @Route("/scenar/edit/{id}", name="scenar_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, EntityManagerInterface $em): Response    //<= Cette route est facultative, on l'a met ici car on fait du BREAD
    {

        $scenar = new Scenario();
        $form = $this->createForm(ScenarioType::class, $scenar);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {

            $scenar->setUpdatedAt(new \DateTime());
            $em ->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('front/edit.html.twig', [
            'form' => $form->createView(),
            'scenar' => $scenar
        ]);
    }
    /**
     * @Route("/scenar/add", name="scenario_add")
     */
    public function add(Request $request, EntityManagerInterface $em) :Response
    {
        $scenar = new Scenario();

        $form = $this->createForm(ScenarioType::class, $scenar);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($scenar);
            $em->flush();

            return $this->redirectToRoute('homepage');
        }
       
        return $this->render('front/add.html.twig', [
            "form" => $form->createView(),
        ]);
    }
}