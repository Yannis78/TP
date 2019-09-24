<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Faker\Factory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Validator\Constraints\Image;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr-FR');

        for($i = 1; $i <= 20; $i++) {
            $article = new Article();
            $image = $faker->imageUrl(80, 80);

            $libelle = $faker->sentence();
            $description = '<p>' . join('</p><p>', $faker->paragraphs(1)) . '</p>';

            $article->setLibelle($libelle)
                ->setImage($image)
                ->setDescription($description)
                ->setPrix(mt_rand(40, 200));


            $manager->persist($article);
        }
        $manager->flush();
    }
}
