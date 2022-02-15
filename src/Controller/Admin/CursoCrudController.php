<?php

namespace App\Controller\Admin;

use App\Entity\Curso;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;

class CursoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Curso::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            // titulo
            TextField::new('titulo'),
            // descripcion
            TextEditorField::new('descripcion'),
            // f_ini_inscripcion
            DateTimeField::new('f_ini_inscripcion'),
            // f_fin_inscripcion
            DateTimeField::new('f_fin_inscripcion'),
            // f_ini_reclamacion
            DateTimeField::new('f_ini_reclamacion'),
            // f_fin_reclamacion
            DateTimeField::new('f_fin_reclamacion'),
            // f_ini_baja
            DateTimeField::new('f_ini_baja'),
            // f_fin_baja
            DateTimeField::new('f_fin_baja'),
            // f_ini_curso
            DateTimeField::new('f_ini_curso'),
            // f_fin_curso
            DateTimeField::new('f_fin_curso'),
            // contenido
            TextEditorField::new('contenido'),
            // objetivos
            TextEditorField::new('objetivos'),
            // requisitos
            TextEditorField::new('requisitos'),
            // categoria
            ChoiceField::new('categoria')->setChoices(
                [
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
                ]
                ),
            // precio
            MoneyField::new('precio')->setCurrency('EUR')->setStoredAsCents(),
            // horas
            IntegerField::new('horas'),
            // documentos
            BooleanField::new('documentos'),
            // profesor
            AssociationField::new('profesor')
        ];
    }
    
}
