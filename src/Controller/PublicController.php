<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PublicController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('public/index.html.twig');
    }

    #[Route('/2', name: 'home2')]
    public function index_two(): Response
    {
        return $this->render('public/index2.html.twig');
    }
}
