<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CursoRepository;
use App\Repository\GrupoRepository;
use App\Entity\Grupo;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class InscripcionController extends AbstractController
{
    #[Route('/inscripcion/{id}', name: 'inscripcion')]
    public function index(int $id, CursoRepository $cursos): Response
    {
        $curso = $cursos->find($id);

        $form = $this->createFormBuilder($curso)
            ->add('grupos',EntityType::class,
            [
                'class' => Grupo::class,
                'choices' => $curso->getGrupos()->toArray(),
                'multiple' => true,
                'expanded' => false,
            ]);
        if($curso->getDocumentos() == true)
        {
            $form->add('documentos',FileType::class,
            [
               'data_class' => null 
            ]);
        }
        $form->add('submit',SubmitType::class);

        $formularino = $form->getForm();

        return $this->render('inscripcion/index.html.twig', [
            'curso' => $curso,
            'form' => $formularino->createView()
        ]);
    }
}
