<?php

namespace App\DataFixtures;

use App\Entity\Order;
use App\Entity\OrderItem;
use App\Entity\Product;
use App\Entity\User;
use App\Repository\ProductRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    const NUMBER_OF_PRODUCTS = 10;

    /** @var ProductRepository */
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function load(ObjectManager $manager)
    {
        $this->loadProducts($manager);
        $this->loadUsers($manager);
        $manager->flush();

        $this->loadOrders($manager);
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

    private function loadOrders(ObjectManager $manager)
    {
        for ($i = 0; $i < 10; $i++) {
            $order = new Order();
            $order->setUserId(1);
            $hoursAgo = random_int(-4, -1) - $i;
            $order->setCreatedAt(new \DateTime($hoursAgo.' hours'));
            $manager->persist($order);

            $productCount = random_int(2, 5);
            for ($j = 0; $j < $productCount; $j++) {
                $item = new OrderItem();

                $productId = random_int(1, self::NUMBER_OF_PRODUCTS);
                $product = $this->productRepository->find($productId);

                $item->setProduct($product);
                $item->setQuantity(random_int(1, 3));
                $item->setOrder($order);
                $manager->persist($item);
            }
        }
    }
}
