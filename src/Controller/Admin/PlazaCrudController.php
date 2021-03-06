<?php

namespace App\Controller\Admin;

use App\Entity\Plaza;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PlazaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Plaza::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            // id_alumno
            AssociationField::new('id_alumno'),
            // id_curso
            AssociationField::new('id_curso'),
            // puesto
            IntegerField::new('puesto'),
            // valoracion
            NumberField::new('valoracion'),
            // documentos
            TextField::new('texto'),
            // estado
            ChoiceField::new('estado')->setChoices([ // Por determinar
                    'A' => 'A',
                    'B' => 'B',
                    'Canceladísimo' => 'C'
            ])
        ];
    }
    
}
