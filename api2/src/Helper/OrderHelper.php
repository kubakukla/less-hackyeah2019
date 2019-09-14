<?php

namespace App\Helper;

use App\Entity\Order;
use App\Entity\Product;

class OrderHelper
{
    public function calculateTrashData(Order $order)
    {
        $items = $order->getOrderItems();
        $result = [];

        foreach (Product::TYPES as $type) {
            $result[$type] = 0;
        }

        foreach ($items as $item) {
            foreach (Product::TYPES as $type) {
                $typeGetter = 'get'.ucfirst($type);
                $trashAmount = $item->getProduct()->$typeGetter();
                $quantity = $item->getQuantity();
                $result[$type] += $trashAmount * $quantity;
            }
        }

        return $result;
    }
}
