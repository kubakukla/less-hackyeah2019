<?php

namespace App\DataFixtures;

use App\Entity\Order;
use App\Entity\OrderItem;
use App\Entity\Product;
use App\Entity\Shop;
use App\Entity\User;
use App\Repository\ProductRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    const NUMBER_OF_PRODUCTS = 10;
    const SHOPS = ['Spar', 'Leclerc', 'Społem'];
    const PRODUCTS = [
        [
            'name' => 'Bananas',
            'type' => 5,
            'trash' => 100,
            'tip' => 'Banana peels are not recyclable. They are food waste and therefore must be composted instead of recycled.',
        ],
        [
            'name' => 'Notebook',
            'type' => 3,
            'trash' => 100,
            'tip' => 'The most important thing for recycling paper is that there is NO contamination in the recycling bin. If so, put it into general bin.',
        ],
        [
            'name' => 'Cotton swabs',
            'type' => 1,
            'trash' => 100,
            'tip' => 'You can recycle cotton swabs by putting them in your bio bin, just be sure to only add cotton swabs that have cardboard rather that plastic handles.',
        ],
        [
            'name' => 'Orange juice',
            'type' => 2,
            'trash' => 100,
            'tip' => 'Plastic bottles are widely collected by local authorities. You can also take them to recycling facilities.',
        ],
        [
            'name' => 'Jam',
            'type' => 4,
            'trash' => 100,
            'tip' => 'Unlike most materials that lose their quality over time, glass can be recycled infinitely with no loss in purity!',
        ],
        [
            'name' => 'Eggs',
            'type' => 5,
            'trash' => 100,
            'tip' => 'Eggshells are not recyclable. They are food waste and therefore must be composted instead of recycled.',
        ],
        [
            'name' => 'Paper bag',
            'type' => 3,
            'trash' => 100,
            'tip' => 'The most important thing for recycling paper is that there is NO contamination in the recycling bin. If so, put it into general bin.',
        ],
        [
            'name' => 'Flowers',
            'type' => 1,
            'trash' => 100,
            'tip' => 'Composting expired flowers helps to avoid environmental waste.',
        ],
        [
            'name' => 'Water bottle',
            'type' => 2,
            'trash' => 100,
            'tip' => 'Plastic bottles are widely collected by local authorities. You can also take them to recycling facilities.',
        ],
        [
            'name' => 'Wine',
            'type' => 4,
            'trash' => 100,
            'tip' => 'Unlike most materials that lose their quality over time, glass can be recycled infinitely with no loss in purity!',
        ],
    ];

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
        foreach (self::PRODUCTS as $i => $fixture) {
            $product = new Product();
            $product->setName($fixture['name']);
            $product->setTip($fixture['tip']);

            $type = $fixture['type'];
            $product->setType($type);
            $typeSetter = 'set'.ucfirst(Product::TYPES[$type]);
            $product->$typeSetter($fixture['trash']);

            $product->setCode($i + 1);

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
        $shops = [];

        foreach (self::SHOPS as $name) {
            $shop = new Shop();
            $shop->setName($name);
            $manager->persist($shop);
            $shops[] = $shop;
        }

        for ($i = 0; $i < 10; $i++) {
            $order = new Order();
            $order->setUserId(1);
            $hoursAgo = random_int(-4, -1) - $i;
            $order->setCreatedAt(new \DateTime($hoursAgo.' hours'));
            $order->setShop($shops[array_rand($shops)]);
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
