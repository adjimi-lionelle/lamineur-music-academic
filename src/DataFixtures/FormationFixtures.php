<?php

namespace App\DataFixtures;

use App\Entity\Formation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FormationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Définir des données réelles
        $formations = [
            ['title' => 'Éveile musical', 'learner' => 'Enfants de 3 à 7 ans', 'image' => 'assets/img/blog/blog-1.jpg'],
            ["image" => "assets/img/blog/blog-2.jpg", "title" => "Piano",  "learner" => "Tout public"],
            [
                "image" => "assets/img/blog/blog-3.jpg",
                "title" => "Guitare",
                "learner" => "Tout public"
            ],
            [
                "image" => "assets/img/blog/blog-4.jpg",
                "title" => "Flûte",
                "learner" => "Tout public"
            ],
            [
                "image" => "assets/img/blog/blog-5.jpg",
                "title" => "Violon",
                "learner" => "Tout public"
            ],
            [
                "image" => "assets/img/blog/blog-2.jpg",
                "title" => "Formation vocale",
                "learner" => "Chanteurs et choristes"
            ],
            [
                "image" => "assets/img/blog/blog-3.jpg",
                "title" => "Solfège",
                "learner" => "Tout public"
            ],
            [
                "image" => "assets/img/blog/blog-5.jpg",
                "title" => "Balafons traditionnels",
                "learner" => "Tout public"
            ],
            [
                "image" => "assets/img/blog/blog-2.jpg",
                "title" => "Saxophone",
                "learner" => "Tout public"
            ],
            [
                "image" => "assets/img/blog/blog-3.jpg",
                "title" => "Batterie",
                "learner" => "Tout public"
            ],
        ];

        // Créer les objets Formation et les persister
        foreach ($formations as $data) {
            $formation = new Formation();
            $formation->setTitle($data['title']);
            $formation->setLearner($data['learner']);
            $formation->setImage($data['image']);

            $manager->persist($formation);
        }

        $manager->flush();
    }
}
