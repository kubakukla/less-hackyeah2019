<?php

namespace App\Helper;

use App\Entity\Product;

class ProductHelper
{
    /**
     * @param Product $product
     * @param int $qty
     * @return array
     */
    public function calculateProductTrash(Product $product, int $qty = 1) :array
    {
        $result = [];
        foreach (Product::TYPES as $type) {
            $typeGetter = 'get'.ucfirst($type);
            $trashAmount = $product->$typeGetter();
            $result[$type] = $trashAmount * $qty;
        }
        return $result;
    }

    /**
     * @param Product $product
     * @param int $qty
     * @return array
     */
    public function getPrunedProductTrash(Product $product, int $qty = 1) :array
    {
        $totals = $this->calculateProductTrash($product, $qty);
        foreach ($totals as $name => $value) {
            if ($value <= 0) {
                unset($totals[$name]);
            }
        }
        return $totals;
    }
}
