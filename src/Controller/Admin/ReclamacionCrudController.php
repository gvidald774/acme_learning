<?php

namespace App\Controller\Admin;

use App\Entity\Reclamacion;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use App\Controller\Admin\Fields\MultipleFileField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class ReclamacionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reclamacion::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            // id_plaza
            AssociationField::new('id_plaza'),
            // comentario
            TextareaField::new('comentario'),
            // documentos
            MultipleFileField::new('documentos'),
            // valoracion
            IntegerField::new('valoracion'),
        ];
    }
    
}
