<?php

namespace App\Controller\Admin;

use App\Entity\AuditMatiere;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AuditMatiereCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AuditMatiere::class;
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
