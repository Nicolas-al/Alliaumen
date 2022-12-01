<?php

namespace App\Controller\Admin;

use App\Entity\Skills;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class SkillsCrudController extends AbstractCrudController
{
    public const SKILLS_BASE_PATH = '/images/uploads/logos';
    public const SKILLS_UPLOAD_DIR = 'public/images/uploads/logos';

    public static function getEntityFqcn(): string
    {
        return Skills::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            ImageField::new('logo')
                    ->setBasePath(self::SKILLS_BASE_PATH)
                    ->setUploadDir(self::SKILLS_UPLOAD_DIR),
            ChoiceField::new('type')->setChoices([
                'Frontend' => 'Frontend',
                'Backend' => 'Backend',
            ]),
            IntegerField::new('percent'),
            TextField::new('color'),
        ];
    }
    
}
