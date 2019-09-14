<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrderItemsRepository")
 */
class OrderItems
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Orders", inversedBy="orderItems")
     */
    private $order_id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Products")
     */
    private $product_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrderId(): ?Orders
    {
        return $this->order_id;
    }

    public function setOrderId(?Orders $order_id): self
    {
        $this->order_id = $order_id;

        return $this;
    }

    public function getProductId(): ?Products
    {
        return $this->product_id;
    }

    public function setProductId(?Products $product_id): self
    {
        $this->product_id = $product_id;

        return $this;
    }
}
