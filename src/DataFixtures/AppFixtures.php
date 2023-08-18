<?php

namespace App\DataFixtures;

use App\Entity\Clinic;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use \Faker\Generator;
use \Faker\Factory;

/**
 * Summary of AppFixtures
 */
class AppFixtures extends Fixture
{
    /**
     * Summary of faker
     * @var Generator
     */
    private Generator $faker;
    /**
     * Summary of load
     * @param ObjectManager $manager
     * @return void
     */
    public function load(ObjectManager $manager): void
    {
        $this->faker = Factory::create('fr_FR');
        for ($i=1; $i <= 50; $i++) { 
            $clinic = new Clinic();
            $clinic->setName($this->faker->sentence(4))
                    ->setEmail($this->faker->safeEmail())
                    ->setAddress($this->faker->streetName())
                    ->setNumberOfDoctors($this->faker->randomNumber())
            ;

            $manager->persist($clinic);
            
        }
        // $product = new Product();
        // $manager->persist($product);
        $manager->flush();
        
    }
}
