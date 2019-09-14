<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    const NUMBER_OF_PRODUCTS = 10;

    public function load(ObjectManager $manager)
    {
        $this->loadProducts($manager);
        $this->loadUsers($manager);

        $manager->flush();
    }

    private function loadProducts(ObjectManager $manager)
    {
        for ($i = 1; $i <= self::NUMBER_OF_PRODUCTS; $i++) {
            $product = new Product();
            $product->setName("Product ${i}");

            $type = $i % 5 + 1;
            $product->setType($type);
            $typeSetter = 'set'.ucfirst(Product::TYPES[$type]);
            $product->$typeSetter(random_int(1, 100));

            $product->setCode($i);

            $manager->persist($product);
        }
    }

    private function loadUsers(ObjectManager $manager)
    {
        $user = new User();
        $user->setName('Krzysiek');
        $user->setMail('krzysiek@bluepaprica.com');
        $manager->persist($user);
    }
}
