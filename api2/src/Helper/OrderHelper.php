<?php

namespace App\Helper;

use App\Entity\Order;
use App\Entity\Product;

class OrderHelper
{
    /**
     * @param Order $order
     * @return array
     */
    public function calculateTrashData(Order $order) :array
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

    /**
     * @param Order $order
     * @return array
     */
    public function getPrunedTrashData(Order $order) :array
    {
        $totals = $this->calculateTrashData($order);
        foreach ($totals as $name => $value) {
            if ($value <= 0) {
                unset($totals[$name]);
            }
        }
        return $totals;
    }
}
