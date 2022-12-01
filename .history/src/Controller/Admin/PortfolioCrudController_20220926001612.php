<?php

namespace App\Controller\Admin;

use App\Entity\Portfolio;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;

class PortfolioCrudController extends AbstractCrudController
{

    public const PORTFOLIO_BASE_PATH = 'images/uploads/images';
    public const PORTFOLIO_UPLOAD_DIR = 'public/images/uploads/images';

    public static function getEntityFqcn(): string
    {
        return Portfolio::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('title'),
            TextEditorField::new('description'),
            TextField::new('skills'),
            ImageField::new('image')->setBasePath(self::PORTFOLIO_BASE_PATH),
            TextareaField::new('imageFile')->setFormType(VichImageType::class),
            TextField::new('link'),

        ];
    }
  
}
