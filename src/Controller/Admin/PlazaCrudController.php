<?php

namespace App\Controller\Admin;

use App\Entity\Plaza;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use App\Controller\Admin\Fields\MultipleFileField;

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
            // id_grupo
            AssociationField::new('id_grupo'),
            // puesto
            IntegerField::new('puesto'),
            // valoracion
            NumberField::new('valoracion'),
            // documentos
            MultipleFileField::new('documentos'),
            // estado
            ChoiceField::new('estado')->setChoices([ // Por determinar
                'Estados' => [
                    'A' => 'A',
                    'B' => 'B',
                    'Canceladísimo' => 'C'
                ]
            ])
        ];
    }
    
}
