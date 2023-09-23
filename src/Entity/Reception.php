<?php

namespace App\Entity;

use App\Repository\ReceptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReceptionRepository::class)]
class Reception
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToMany(targetEntity: ProductSize::class, inversedBy: 'receptions')]
    private Collection $product_size_id;

    #[ORM\ManyToMany(targetEntity: Warehouse::class, inversedBy: 'receptions')]
    private Collection $warehouse_id;

    #[ORM\Column]
    private ?int $qty = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $available_at = null;

    public function __construct()
    {
        $this->product_size_id = new ArrayCollection();
        $this->warehouse_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, ProductSize>
     */
    public function getProductSizeId(): Collection
    {
        return $this->product_size_id;
    }

    public function addProductSizeId(ProductSize $productSizeId): static
    {
        if (!$this->product_size_id->contains($productSizeId)) {
            $this->product_size_id->add($productSizeId);
        }

        return $this;
    }

    public function removeProductSizeId(ProductSize $productSizeId): static
    {
        $this->product_size_id->removeElement($productSizeId);

        return $this;
    }

    /**
     * @return Collection<int, Warehouse>
     */
    public function getWarehouseId(): Collection
    {
        return $this->warehouse_id;
    }

    public function addWarehouseId(Warehouse $warehouseId): static
    {
        if (!$this->warehouse_id->contains($warehouseId)) {
            $this->warehouse_id->add($warehouseId);
        }

        return $this;
    }

    public function removeWarehouseId(Warehouse $warehouseId): static
    {
        $this->warehouse_id->removeElement($warehouseId);

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
