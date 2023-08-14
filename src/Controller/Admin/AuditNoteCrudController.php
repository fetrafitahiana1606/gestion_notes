<?php

namespace App\Controller\Admin;

use App\Entity\AuditNote;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AuditNoteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AuditNote::class;
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
