<?php

namespace App\Controller\Admin;

use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

class UserCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return User::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            // email
            EmailField::new('email'),
            // roles
            ChoiceField::new('roles')->allowMultipleChoices()->setChoices([
                //'Roles' => [
                    'Admin' => 'Admin',
                    'Profesor' => 'Profesor',
                    'Alumno' => 'Alumno',
                //]
            ]),
            // password
            TextField::new('password'),
            // dni
            TextField::new('dni'), // Habría que validarlo
            // nombre
            TextField::new('nombre'),
            // apellido1
            TextField::new('apellido1'),
            // apellido2
            TextField::new('apellido2'),
            // foto
            ImageField::new('foto')->setUploadDir('assets\images'),
            // AÑADIR PAÍS (?)
            // localidad
            TextField::new('localidad'),
            // cursos
            // al ser Many To One no se puede poner
            // plazas
            // lo mismo de arriba
            // genero
            ChoiceField::new('genero')->setChoices([
                //'Géneros' => [
                    'Masculino' => 'M',
                    'Femenino' => 'F',
                    'Otros' => 'X',
                //]
            ])->renderExpanded(),
            // isVerified
            BooleanField::new('isVerified'),
        ];
    }
}
