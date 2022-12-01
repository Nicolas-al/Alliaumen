<?php

namespace App\Controller\Admin;

use App\Entity\CV;
use App\Entity\Portfolio;
use App\Controller\Admin\CVCrudController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use App\Controller\Admin\PortfolioCrudController;
use App\Entity\Skills;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class AdminController extends AbstractDashboardController
{

    public function __construct(private AdminUrlGenerator $adminUrlGenerator)
    {
        
    }
    // #[IsGranted('ROLE_ADMIN')]
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
            ->setController(PortfolioCrudController::class)
            ->generateUrl();

        
            
        return $this->redirect($url);

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Portfolio');
    }

    public function configureMenuItems(): iterable
    {
            yield MenuItem::section('Portfolio');
            yield MenuItem::section('CV');
            yield MenuItem::section('Skills');
            yield MenuItem::section('User');

            yield MenuItem::subMenu('Actions', 'fas-fa bars')->setSubItems([ 
                MenuItem::linkToCrud('add project', 'fas-fa plus', Portfolio::class)->setAction(Crud::PAGE_NEW),
                MenuItem::linkToCrud('show project', 'fas-fa eyes', Portfolio::class),
            ]);

            yield MenuItem::subMenu('Actions', 'fas-fa bars')->setSubItems([ 
                MenuItem::linkToCrud('add CV', 'fas-fa plus', CV::class)->setAction(Crud::PAGE_NEW),
                MenuItem::linkToCrud('show CV', 'fas-fa eyes', CV::class),
            ]);

            yield MenuItem::subMenu('Actions', 'fas-fa bars')->setSubItems([ 
                MenuItem::linkToCrud('add skill', 'fas-fa plus', Skills::class)->setAction(Crud::PAGE_NEW),
                MenuItem::linkToCrud('show skill', 'fas-fa eyes', Skills::class),
            ]);

            yield MenuItem::subMenu('Actions', 'fas-fa bars')->setSubItems([
                MenuItem::linkToCrud('add user', 'fas-fa plus', User::class)->setAction(Crud::PAGE_NEW),
            ]);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
