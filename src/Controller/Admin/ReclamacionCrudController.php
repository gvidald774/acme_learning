<?php

namespace App\Controller\Admin;

use App\Entity\Reclamacion;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ReclamacionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reclamacion::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
