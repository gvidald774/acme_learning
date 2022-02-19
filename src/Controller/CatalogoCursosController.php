<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CursoRepository;
use Symfony\Component\Serializer\SerializerInterface;

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

    #[Route('/cursos/todos/todos', name: 'trae_cursos')]
    public function traeteCursos(CursoRepository $cursos_repo, SerializerInterface $serializer): Response
    {
        $cursos = $cursos_repo->findAll();
        $cursos_serializados = $serializer->serialize($cursos, 'json', ['groups' => 'curso']);
        return new Response($cursos_serializados);
    }
}
