<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CursoRepository;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;


class CatalogoCursosController extends AbstractController
{
    #[Route('/cursos', name: 'catalogo_cursos')]
    public function index(): Response
    {
        return $this->render('catalogo_cursos/index.html.twig');
    }

    #[Route('/cursos/{id}', name: 'detalles_curso')]
    public function detalles(CursoRepository $cursos_repo, int $id): Response
    {
        $curso = $cursos_repo->find($id);

        return $this->render('catalogo_cursos/detalle.html.twig',
                            ['curso' => $curso]);
    }

    #[Route('/cursos/todos/todos', name: 'trae_cursos')]
    public function traeteCursos(CursoRepository $cursos_repo, SerializerInterface $serializer): Response
    {
        $cursos = $cursos_repo->findAll();
        $cursos_serializados = $serializer->serialize($cursos, 'json', [
            'circular_reference_handler' => function($object) {
                return $object->getId();
            }
        ]);
        return new Response(var_dump($cursos_serializados));
    }
}
