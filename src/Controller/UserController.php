<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserController extends AbstractController
{
    #[Route('/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        $errors = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('admin/login.html.twig', [
            'controller_name' => 'UserController',
            'last_username' => $lastUsername,
            'errors' => $errors,
        ]);
    }

    #[Route("/logout", name: "app_logout")]
    public function logout(): void
    {
        // Le contrôleur de déconnexion est géré par Symfony
    }

    #[Route('/admin', name: 'app_home')]
    public function home(): Response
    {
        return $this->render('admin/home.html.twig');
    }

     
     #[Route("/create-user", name: "create_user")]
    public function createUser(EntityManagerInterface $entityManager): Response
    {
        // Créez un nouvel utilisateur
        $user = new User();
        $user->setEmail('admin@gmail.com');
        $user->setPassword(password_hash('lamineur', PASSWORD_BCRYPT)); // Assurez-vous que la méthode de hachage est correcte

        // Enregistrez l'utilisateur dans la base de données
        $entityManager->persist($user);
        $entityManager->flush();
       // Récupérez le dernier ID inséré
       $lastInsertedId = $user->getId();

       return new Response('User created with ID '.$lastInsertedId);
    }
}
