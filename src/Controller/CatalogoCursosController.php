<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CatalogoCursosController extends AbstractController
{
    #[Route('/catalogo/cursos', name: 'catalogo_cursos')]
    public function index(): Response
    {
        return $this->render('catalogo_cursos/index.html.twig', [
            'controller_name' => 'CatalogoCursosController',
        ]);
    }
}
