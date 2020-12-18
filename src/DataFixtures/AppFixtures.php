<?php

namespace App\DataFixtures;

use App\Entity\Controles;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');
        for ($i=0; $i <= 10; $i++) 
        {
            $controle = new Controles();
            $controle->setName($faker->vat);
            $controle->setDescription($faker->sentence($nbWords = 5, $variableNbWords = false));
            $controle->setImage("https://placehold.it/1000x1000");
            $controle->setCreatedAt($faker->dateTimeBetween('-1 month', $endDate = 'now','UTC'));
            $controle->setSlug($faker->slug);
            $manager->persist($controle);
        }
        $manager->flush();
    }
}
