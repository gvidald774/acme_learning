<?php

namespace App\Controller\Admin;

use App\Entity\Reserva;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class ReservaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reserva::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            // id_aula
            AssociationField::new('id_aula'),
            // id_tramo
            AssociationField::new('id_tramo'),
            // precio
            MoneyField::new('precio')->setCurrency('EUR')->setStoredAsCents(),
        ];
    }
    
}
