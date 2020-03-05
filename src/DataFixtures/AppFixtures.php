<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use app\Entity\Categories;
use App\Entity\Products;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();

        for($i = 1; $i <= 6; $i++) {
            $category = new Categories(); 
            $category->setName("Categorie n°$i");

            $manager->persist($category);    
       
            for($j = 1; $j <= 9; $j++) {
                $product = new Products();
                $product->setName("Product n°$j")
                ->setDescription($faker->paragraph())
                ->setImage($faker->imageURL())
                ->setPriceWithoutTaxes($faker->randomDigit())
                ->setPriceAllTaxesIncluded($faker->randomDigit())
                ->setIsAvailable(true)
                ->setProductStock(100)
                ->setTimesPurchased(0)
                ->setHasDifferentSizes(true)
                ->setHasDifferentColors(true)
                ->addCategory($category);

                $manager->persist($product);
            }
        // $product = new Product();
        // $manager->persist($product);
        }
        $manager->flush();
    }
}

// public function load(ObjectManager $manager)
// {
//     $faker = \Faker\Factory::create('fr_FR');

//     for($i = 1; $i <= 6; $i++) {
//         $category = new Categories(); 
//         $category->setName("Categorie n°$i");

//         $manager->persist($category);   
        
//         for($i = 1; $i <= 4; $i++) {
//             $product = new Products();
//             $product->setName("Product n°$i")
//                     ->setDescription($faker->paragraph())
//                     ->setImage($faker->imageURL())
//                     ->setPriceWithoutTaxes($faker->randomDigit())
//                     ->setPriceAllTaxesIncluded($faker->randomDigit())
//                     ->setIsAvailable(1)
//                     ->setProductStock(100)
//                     ->setTimesPurchased(0)
//                     ->setHasDifferentSizes(false)
//                     ->setHasDifferentColors(false);

//             $manager->persist($product);
//         // }
//         }
//     }
