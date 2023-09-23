<?php

namespace App\Entity;

use App\Repository\ReceptionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReceptionRepository::class)]
class Reception
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'receptions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ProductSize $product_size_id = null;

    #[ORM\ManyToOne(inversedBy: 'receptions')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Warehouse $warehouse_id = null;

    #[ORM\Column]
    private ?int $qty = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $available_at = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProductSizeId(): ?ProductSize
    {
        return $this->product_size_id;
    }

    public function setProductSizeId(?ProductSize $product_size_id): static
    {
        $this->product_size_id = $product_size_id;

        return $this;
    }

    public function getWarehouseId(): ?Warehouse
    {
        return $this->warehouse_id;
    }

    public function setWarehouseId(?Warehouse $warehouse_id): static
    {
        $this->warehouse_id = $warehouse_id;

        return $this;
    }

    public function getQty(): ?int
    {
        return $this->qty;
    }

    public function setQty(int $qty): static
    {
        $this->qty = $qty;

        return $this;
    }

    public function getAvailableAt(): ?\DateTimeImmutable
    {
        return $this->available_at;
    }

    public function setAvailableAt(?\DateTimeImmutable $available_at): static
    {
        $this->available_at = $available_at;

        return $this;
    }
}
