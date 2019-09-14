<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\OneToMany(targetEntity="App\Entity\Orders", mappedBy="orderItems")
     */
    private $order_id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Products", mappedBy="orderItems")
     */
    private $product_id;

    public function __construct()
    {
        $this->order_id = new ArrayCollection();
        $this->product_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Orders[]
     */
    public function getOrderId(): Collection
    {
        return $this->order_id;
    }

    public function addOrderId(Orders $orderId): self
    {
        if (!$this->order_id->contains($orderId)) {
            $this->order_id[] = $orderId;
            $orderId->setOrderItems($this);
        }

        return $this;
    }

    public function removeOrderId(Orders $orderId): self
    {
        if ($this->order_id->contains($orderId)) {
            $this->order_id->removeElement($orderId);
            // set the owning side to null (unless already changed)
            if ($orderId->getOrderItems() === $this) {
                $orderId->setOrderItems(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Products[]
     */
    public function getProductId(): Collection
    {
        return $this->product_id;
    }

    public function addProductId(Products $productId): self
    {
        if (!$this->product_id->contains($productId)) {
            $this->product_id[] = $productId;
            $productId->setOrderItems($this);
        }

        return $this;
    }

    public function removeProductId(Products $productId): self
    {
        if ($this->product_id->contains($productId)) {
            $this->product_id->removeElement($productId);
            // set the owning side to null (unless already changed)
            if ($productId->getOrderItems() === $this) {
                $productId->setOrderItems(null);
            }
        }

        return $this;
    }
}
