<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'profile')]
    public function index(): Response
    {
        // Habría que averiguar una manera de mostrar tu perfil o mostrar otros perfiles... quizá dos métodos? Uno que sea el normal y otro que sea perfil ajeno? no sé. Ideas
        return $this->render('profile/index.html.twig');
    }
}
