<?php

namespace App\Controller\Admin;

use App\Entity\Note;
use App\Entity\User;
use App\Entity\Matiere;
use App\Entity\Etudiant;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Controller\Admin\EtudiantCrudController;
use App\Entity\AuditEtudiant;
use App\Entity\AuditMatiere;
use App\Entity\AuditNote;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // return parent::index();
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(EtudiantCrudController::class)->generateUrl();
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
            ->setTitle('Gestion des Notes');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home')
            ->setPermission('ROLE_EDITOR');
        yield MenuItem::linkToCrud('Etudiant', 'fas fa-user', Etudiant::class)
            ->setPermission('ROLE_EDITOR');;
        yield MenuItem::linkToCrud('Matiere', 'fas fa-user-plus', Matiere::class)
            ->setPermission('ROLE_EDITOR');;
        yield MenuItem::linkToCrud('Note', 'fas fa-car', Note::class)
            ->setPermission('ROLE_EDITOR');
        yield MenuItem::linkToCrud('User', 'fas fa-car', User::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Etudiant', 'fas fa-car', AuditEtudiant::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Matiere', 'fas fa-car', AuditMatiere::class)
            ->setPermission('ROLE_ADMIN');
        yield MenuItem::linkToCrud('Note', 'fas fa-car', AuditNote::class)
            ->setPermission('ROLE_ADMIN');
    }
}
