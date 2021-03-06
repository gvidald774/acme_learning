<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CursoRepository;
use App\Repository\GrupoRepository;
use App\Entity\Grupo;
use App\Entity\Plaza;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class InscripcionController extends AbstractController
{
    #[Route('/inscripcion/{id}', name: 'inscripcion')]
    public function index(int $id, CursoRepository $cursos, Request $request, ManagerRegistry $doctrine): Response
    {
        $this->denyAccessUnlessGranted('ROLE_ALUMNO');

        $entityManager = $doctrine->getManager();
        $curso = $cursos->find($id);

        $inscripcion = new Plaza();

        $form = $this->createFormBuilder($inscripcion);
        if($curso->getDocumentos() == true)
        {
            $form->add('texto',TextType::class);
        }
        $form->add('submit',SubmitType::class);

        $formularino = $form->getForm();

        $formularino->handleRequest($request);
        if ($formularino->isSubmitted() && $formularino->isValid())
        {
            $inscripcion = $formularino->getData();

            $inscripcion->setIdAlumno($this->getUser());
            $inscripcion->setIdCurso($curso);
            $inscripcion->setEstado("Inscrito");

            $entityManager->persist($inscripcion);
            $entityManager->flush();
            
            return $this->redirectToRoute('profile');
        }


        return $this->render('inscripcion/index.html.twig', [
            'curso' => $curso,
            'form' => $formularino->createView()
        ]);
    }
}
