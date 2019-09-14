<?php

namespace App\DataFixtures;

use App\Entity\Products;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    const NUMBER_OF_PRODUCTS = 10;

    public function load(ObjectManager $manager)
    {
        $this->loadProducts($manager);

        $manager->flush();
    }

    private function loadProducts(ObjectManager $manager)
    {
        for ($i = 1; $i <= self::NUMBER_OF_PRODUCTS; $i++) {
            $product = new Products();
            $product->setName("Product ${i}");
            $product->setType($i % 5 + 1);
            $product->setCode($i);
            $manager->persist($product);
        }
    }
}
