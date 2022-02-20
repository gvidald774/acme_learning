<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InscripcionController extends AbstractController
{
    #[Route('/inscripcion', name: 'inscripcion')]
    public function index(): Response
    {
        return $this->render('inscripcion/index.html.twig', [
            'controller_name' => 'InscripcionController',
        ]);
    }
}
