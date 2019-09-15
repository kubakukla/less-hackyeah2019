<?php

namespace App\Repository;

use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use App\Helper\ProductHelper;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    /** @var string  */
    const ITEMS = "items";

    /** @var ProductHelper  */
    protected $helper;

    /**
     * ProductRepository constructor.
     * @param ManagerRegistry $registry
     * @param ProductHelper $helper
     */
    public function __construct(ManagerRegistry $registry, ProductHelper $helper)
    {
        parent::__construct($registry, Product::class);
        $this->helper = $helper;
    }

    public function getProductHelper() :ProductHelper
    {
        return $this->helper;
    }

    /**
     * @param Product $product
     * @param int $qty
     * @return array
     */
    public function calculateProductTrash(Product $product, int $qty = 1) :array
    {
        return $this->helper->calculateProductTrash($product, $qty);
    }

    /**
     * @param Product $product
     * @param int $qty
     * @return array
     */
    public function getPrunedProductTrash(Product $product, int $qty = 1) :array
    {
        return $this->helper->getPrunedProductTrash($product, $qty);
    }

    /**
     * @param Product $product
     * @param int $qty
     * @param array $data
     * @return array
     */
    public function addProductTrashData(Product $product, int $qty = 1, array $data = [])
    {
        $data[self::ITEMS][$product->getId()] =
            [
                'name' => $product->getName(),
                'tip' => $product->getTip(),
                'totals_trash' => $this->getPrunedProductTrash($product, $qty)
            ];
        return $data;
    }
}
