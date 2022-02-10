<?php

namespace App\Controller\Admin;

use App\Entity\Aula;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AulaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Aula::class;
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
