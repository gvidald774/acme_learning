<?php

namespace App\Controller\Admin;

use App\Entity\Grupo;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class GrupoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Grupo::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            // nombre
            TextField::new('nombre'),
            // plazas
            IntegerField::new('plazas'),
            // curso
            AssociationField::new('curso')
        ];
    }
    
}
