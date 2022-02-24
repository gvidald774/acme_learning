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
    public function index(CursoRepository $cursos_repo): Response
    {
        $cursos = $cursos_repo->findAll();
        return $this->render('catalogo_cursos/index.html.twig',
                             ['cursos' => $cursos]);
    }

    #[Route('/cursos/{id}', name: 'mis_cursos')]
    public function mis_cursos(CursoRepository $cursos_repo): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');

        $cursos = $cursos_repo->findAll();

        if (in_array('profesor', $this->getUser()->getRoles(), true)) {
            $cursos = $cursos_repo->findBy(array('profesor' => $this->getUser()->getId()));
        }
        else if (in_array('alumno', $this->getUser()->getRoles(), true)) {
            $cursos = $cursos_repo->findAll();
        }


        return $this->render('catalogo_cursos/index.html.twig',
                             ['cursos' => $cursos]);
    }

    #[Route('/cursos/d/{id}', name: 'detalles_curso')]
    public function detalles(CursoRepository $cursos_repo, int $id): Response
    {
        $curso = $cursos_repo->find($id);

        return $this->render('catalogo_cursos/detalle.html.twig',
                            ['curso' => $curso]);
    }

    #[Route('/cursos/todos/todos', options: ['expose' => 'true'],  name: 'trae_cursos')]
    public function traeteCursos(CursoRepository $cursos_repo, SerializerInterface $serializer, Request $request): Response
    {

        $json = array();

        if ($request->isXmlHttpRequest()) {
            // Check if Blah, blah, blah (?)
            // Tendría que pasarle los parámetros y tal y pascual, ¿no?
        }
        $cursos = $cursos_repo->findAll();
        $cursos_serializados = $serializer->serialize($cursos, 'json', [
            'circular_reference_handler' => function($object) {
                return $object->getId();
            }
        ]);
        return new Response($cursos_serializados);
    }
}
