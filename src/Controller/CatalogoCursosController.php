<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CursoRepository;

class CatalogoCursosController extends AbstractController
{
    #[Route('/cursos', name: 'catalogo_cursos')]
    public function index(): Response
    {
        return $this->render('catalogo_cursos/index.html.twig');
    }

    #[Route('/cursos/{id}', name: 'detalles_curso')]
    public function detalles(int $id): Response
    {
        // Id curso y sacar el curso a partir de ahí... sí.
    }

    #[Route(name: 'trae_cursos')]
    public function traeteCursos(CursoRepository $cursos_repo): Response
    {
        $cursos = $cursos_repo->findAll();
        return new Response($cursos);
    }
}
