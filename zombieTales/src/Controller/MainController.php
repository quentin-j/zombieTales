<?php

namespace App\Controller;

use App\Entity\Version;
use App\Repository\CommentRepository;
use App\Repository\ScenarioRepository;
use App\Repository\VersionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage(ScenarioRepository $scenarioRepo, VersionRepository $versionRepo): Response
    {
        $allScenar = $scenarioRepo->findAll();
        $allVersion = $versionRepo->findAll();
        return $this->render('main/index.html.twig', [
            'scenar_list' => $allScenar,
            'version_list' => $allVersion,
        ]);
    }
    /**
     * @Route("/scenar/{id}", name="scenar_read", requirements={"id"="\d+"})
     */
    public function read($id, ScenarioRepository $scenarioRepo, VersionRepository $versionRepo): Response
    {
        $scenar = $scenarioRepo->find($id);
        $allVersion = $versionRepo->findAll();
        return $this->render('main/read.html.twig', [
            'scenar' => $scenar,
            'version_list' => $allVersion,
        ]);
    }
    /**
     * @Route("/version/{id}", name="article_list_by_version", requirements={"id"="\d+"})
     */
    public function articleByVersion ($id, ScenarioRepository $scenarioRepo, VersionRepository $versionRepo, Version $version)
    {
        $versionB = $versionRepo->find($id);
        $allVersion = $versionRepo->findAll();
        $scenarBy = $scenarioRepo->findBy(['version' => $version]);
        return $this->render('main/version.html.twig', [
            "version" => $versionB,
            'version_list' => $allVersion,
            "scenar_list" => $scenarBy,
        ]);
    }
}
