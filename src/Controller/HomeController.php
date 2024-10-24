<?php

namespace App\Controller;

use App\Entity\Formation;
use App\Repository\FormationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(FormationRepository $FormationRepository): Response
    {
        $modules = $FormationRepository->findAll();
        $formateurs = [
            [
                "avatar" => "assets/img/team/team-1.jpg",
                "nom" => "Mr Dénis Ongolo",
                "poste" => "Fondateur"
            ],
            [
                "avatar" => "assets/img/team/team-2.jpg",
                "nom" => "Mr Yanick Mvodo",
                "poste" => "Formateur"
            ],
            [
                "avatar" => "assets/img/team/team-3.jpg",
                "nom" => "Mme Diane Ngwa",
                "poste" => "Formateur"
            ],
            [
                "avatar" => "assets/img/team/team-4.jpg",
                "nom" => "Mr Armel Mimbiang",
                "poste" => "Formateur"
            ],
        ];


        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'modules' => $modules,
            'formateurs' => $formateurs,
        ]);
    }
}
