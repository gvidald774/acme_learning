<?php

namespace App\Controller\Admin;

use App\Entity\Plaza;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PlazaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Plaza::class;
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
