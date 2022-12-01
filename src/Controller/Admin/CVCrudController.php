<?php

namespace App\Controller\Admin;

use App\Entity\CV;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CVCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CV::class;
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
