<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\Persistence\ManagerRegistry;

class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'profile')]
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $this->denyAccessUnlessGranted('ROLE_USER');

        $user = $this->getUser();

        $form = $this->createFormBuilder($user)
            ->add('nombre', TextType::class)
            ->add('apellido1', TextType::class)
            ->add('apellido2', TextType::class)
            ->add('telefono', TelType::class)
            ->add('localidad', TextType::class)
            ->add('imageFile', VichImageType::class,
            [
                'required' => false
            ])
            ->add('guardar', SubmitType::class, ['label' => 'Guardar'])
            ->getForm();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $user = $form->getData();

            $entityManager->persist($user);
            $entityManager->flush();
        }

        return $this->render('profile/index.html.twig',
        [
            'user' => $user,
            'form' => $form->createView()
        ]);
    }

    #[Route('/profile/{id}', name: 'profile_ajeno')]
    public function perfil_ajeno(int $id, UserRepository $ur): Response
    {
        $user = $ur->find($id);

        return $this->render('profile/index.html.twig',
        [
            'user' => $user
        ]);
    }
}
