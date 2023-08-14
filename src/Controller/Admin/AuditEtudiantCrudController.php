<?php

namespace App\Controller\Admin;

use App\Entity\AuditEtudiant;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class AuditEtudiantCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return AuditEtudiant::class;
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
