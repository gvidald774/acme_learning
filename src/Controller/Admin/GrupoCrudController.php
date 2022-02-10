<?php

namespace App\Controller\Admin;

use App\Entity\Grupo;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class GrupoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Grupo::class;
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
