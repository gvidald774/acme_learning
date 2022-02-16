<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Curso;
use FOS\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;


class CreaCursoController extends AbstractController
{
    #[Route('/crea/curso', name: 'crea_curso')]
    public function index(): Response
    {
        $curso = new Curso();
        $form = $this->createFormBuilder($curso)
            ->add('titulo', TextType::class)
            ->add('descripcion', CKEditorType::class)
            ->add('f_ini_inscripcion', DateTimeType::class,
            [
                'widget' => 'single_text',
                'data' => new \DateTime(),
                'html5' => false,
            ])
            ->add('f_fin_inscripcion', DateTimeType::class,
            [
                'widget' => 'single_text',
                'data' => new \DateTime(),
                'html5' => false,
            ]) 
            ->add('f_ini_reclamacion', DateTimeType::class,
            [
                'widget' => 'single_text',
                'data' => new \DateTime(),
                'html5' => false,   
            ])
            ->add('f_fin_reclamacion', DateTimeType::class,
            [
                'widget' => 'single_text',
                'data' => new \DateTime(),
                'html5' => false,
            ])
            ->add('f_ini_baja', DateTimeType::class,
            [
                'widget' => 'single_text',
                'data' => new \DateTime(),
                'html5' => false,   
            ])
            ->add('f_fin_baja', DateTimeType::class,
            [
                'widget' => 'single_text',
                'data' => new \DateTime(),
                'html5' => false,    
            ])
            ->add('f_ini_curso', DateTimeType::class,
            [
                'widget' => 'single_text',
                'data' => new \DateTime(),
                'html5' => false,    
            ])
            ->add('f_fin_curso', DateTimeType::class,
            [
                'widget' => 'single_text',
                'data' => new \DateTime(),
                'html5' => false,
            ])
            ->add('categoria', ChoiceType::class, 
            [
                'choices' => [
                    '000 - Ciencias de la Computación, Información y Obras Generales' => 0,
                    '100 - Filosofía y Psicología' => 1,
                    '200 - Religión, Teología' => 2,
                    '300 - Ciencias Sociales' => 3,
                    '400 - Lenguas' => 4,
                    '500 - Ciencias Básicas' => 5,
                    '600 - Tecnología y Ciencias Aplicadas' => 6,
                    '700 - Artes y Recreación' => 7,
                    '800 - Literatura' => 8,
                    '900 - Historia y Geografía' => 9,
                ],
            ])
            ->add('precio', MoneyType::class, [
                'currency' => 'EUR',
                'divisor' => 100,
            ])
            ->add('horas', IntegerType::class)
            ->add('documentos', CheckboxType::class, [
                'label' => '¿Requiere documentación?',
                'required' => false,
            ])
            ->add('contenido', CKEditorType::class)
            ->add('objetivos', CKEditorType::class)
            ->add('requisitos', CKEditorType::class)
            ->getForm();

        return $this->renderForm('crea_curso/index.html.twig', [
            'form' => $form
        ]);
    }
}
