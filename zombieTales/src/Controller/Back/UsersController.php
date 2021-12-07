<?php

namespace App\Controller\Back;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsersController extends AbstractController
{
    /**
     * @Route("/back/users", name="back_users")
     */
    public function index(): Response
    {
        return $this->render('back/users/index.html.twig', [
            'controller_name' => 'UsersController',
        ]);
    }
}
