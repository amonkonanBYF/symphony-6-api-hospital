<?php

namespace App\Controller\Admin;

use App\Entity\Docteur;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DocteurCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Docteur::class;
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
