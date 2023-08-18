<?php

namespace App\Controller\Admin;

use App\Entity\Clinic;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ClinicCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Clinic::class;
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
