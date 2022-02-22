<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Aula;
use App\Entity\Curso;
use App\Entity\Grupo;
use App\Entity\Plaza;
use App\Entity\Reclamacion;
use App\Entity\Reserva;
use App\Entity\Tramo;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(UserCrudController::class)->generateUrl();

        return $this->redirect($url);

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(UserCrudController::class)->generateUrl());

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
            ->setTitle('Acme Learning');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoRoute('Back to the website', 'fas fa-home', 'home');
        yield MenuItem::linktoCrud('Usuarios', 'fas fa-solid fa-user', User::class);
        yield MenuItem::linktoCrud('Aulas', 'fas fa-solid fa-school', Aula::class);
        yield MenuItem::linktoCrud('Cursos', 'fas fa-solid fa-graduation-cap', Curso::class);
        yield MenuItem::linktoCrud('Plazas', 'fas fa-solid fa-user-graduate', Plaza::class);
        yield MenuItem::linktoCrud('Reclamaciones', 'fas fa-solid fa-pray', Reclamacion::class);
        yield MenuItem::linktoCrud('Reservas', 'fas fa-solid fa-chalkboard', Reserva::class);
        yield MenuItem::linktoCrud('Tramos', 'fas fa-solid fa-clock', Tramo::class);
    }
}
