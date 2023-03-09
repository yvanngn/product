<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
#[ApiResource(
    operations: [
        new GetCollection(normalizationContext: ['groups' => 'product:list'])
    ],
    order: ['name' => 'ASC'],
    paginationEnabled: false,
)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['product:list', 'product:item'])]
    private ?string $name = null;

    #[ORM\Column]
    #[Groups(['product:list', 'product:item'])]
    #[Assert\PositiveOrZero]
    private ?int $storage_capacity = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['product:list', 'product:item'])]
    #[Assert\PositiveOrZero]
    private ?float $price = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['product:list', 'product:item'])]
    #[Assert\PositiveOrZero]
    private ?int $stock = null;

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

    public function getStorageCapacity(): ?int
    {
        return $this->storage_capacity;
    }

    public function setStorageCapacity(int $storage_capacity): self
    {
        $this->storage_capacity = $storage_capacity;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->stock;
    }

    public function setStock(?int $stock): self
    {
        $this->stock = $stock;

        return $this;
    }
}
