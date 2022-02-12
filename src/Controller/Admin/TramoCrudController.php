<?php

namespace App\Controller\Admin;

use App\Entity\Tramo;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class TramoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Tramo::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            // date
            DateField::new('fecha'), // Habría que ver las fechas de cierre
            // time
            TimeField::new('hora'), // Habría que ver las horas de apertura
        ];
    }
}
