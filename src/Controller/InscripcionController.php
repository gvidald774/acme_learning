<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Curso;

class InscripcionController extends AbstractController
{
    #[Route('/inscripcion', name: 'inscripcion')]
    public function index(Curso $curso): Response
    {
        return $this->render('inscripcion/index.html.twig', [
            'curso' => 'curso',
        ]);
    }
}
