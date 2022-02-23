<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Repository\UserRepository;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'profile')]
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        return $this->render('profile/index.html.twig',
        [
            'user' => $this->getUser()
        ]);
    }

    #[Route('/profile/{id}', name: 'profile_ajeno')]
    public function perfil_ajeno(Integer $id, UserRepository $ur): Response
    {
        $user = $ur->find($id);

        return $this->render('profile/index.html.twig',
        [
            'user' => $user
        ]);
    }
}
