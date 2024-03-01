<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route('/register', name: 'register')]
    public function index(Request $request, UserPasswordHasherInterface $encoder): Response
    {
        $notification = null;
        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $user_find = $this->entityManager->getRepository(User::class)->findOneByEmail($user->getEmail());

            if (!$user_find) {
                // Hasher le mot de passe
                $password = $encoder->hashPassword($user, $user->getPassword());
                $user->setPassword($password);
                $user->setRegistrationDate(new \DateTime());
                if ($form->get('usedStorageSpace')->getData()) {
                    $user->setUsedStorageSpace(20);
                }
                $this->entityManager->persist($user);
                $this->entityManager->flush();

                $notification = 'Your registration went well';
            } else {
                $notification = 'Your email already exists';
            }
        }

        return $this->render('registration/index.html.twig', [
            'form' => $form->createView(),
            'notification' => $notification,
        ]);
    }
}
