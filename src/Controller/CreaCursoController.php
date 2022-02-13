<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreaCursoController extends AbstractController
{
    #[Route('/crea/curso', name: 'crea_curso')]
    public function index(): Response
    {
        return $this->render('crea_curso/index.html.twig', [
            'controller_name' => 'CreaCursoController',
        ]);
    }
}
