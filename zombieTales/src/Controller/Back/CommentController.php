<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CommentController extends AbstractController
{
    /**
     * @Route("/back/comment", name="back_comment")
     */
    public function index(): Response
    {
        return $this->render('back/comment/index.html.twig', [
            'controller_name' => 'CommentController',
        ]);
    }
}
