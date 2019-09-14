<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 */
class Product
{
    const TYPES = [
        1 => 'general',
        2 => 'plastic',
        3 => 'paper',
        4 => 'glass',
        5 => 'bio'
    ];

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $type;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $general;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $plastic;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $paper;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $glass;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $bio;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $code;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getGeneral(): ?int
    {
        return $this->general;
    }

    public function setGeneral(?int $general): self
    {
        $this->general = $general;

        return $this;
    }

    public function getPlastic(): ?int
    {
        return $this->plastic;
    }

    public function setPlastic(?int $plastic): self
    {
        $this->plastic = $plastic;

        return $this;
    }

    public function getPaper(): ?int
    {
        return $this->paper;
    }

    public function setPaper(?int $paper): self
    {
        $this->paper = $paper;

        return $this;
    }

    public function getGlass(): ?int
    {
        return $this->glass;
    }

    public function setGlass(?int $glass): self
    {
        $this->glass = $glass;

        return $this;
    }

    public function getBio(): ?int
    {
        return $this->bio;
    }

    public function setBio(?int $bio): self
    {
        $this->bio = $bio;

        return $this;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    public function setCode(string $code): self
    {
        $this->code = $code;

        return $this;
    }
}
