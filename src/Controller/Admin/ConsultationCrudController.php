<?php

namespace App\Controller\Admin;

use App\Entity\Consultation;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ConsultationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Consultation::class;
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
