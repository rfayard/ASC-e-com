<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BillsRepository")
 */
class Bills
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="bills")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="float")
     */
    private $total_price_without_taxes;

    /**
     * @ORM\Column(type="float")
     */
    private $total_price_all_taxes_included;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Products", inversedBy="bills")
     */
    private $products;

    public function __construct()
    {
        $this->products = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getTotalPriceWithoutTaxes(): ?float
    {
        return $this->total_price_without_taxes;
    }

    public function setTotalPriceWithoutTaxes(float $total_price_without_taxes): self
    {
        $this->total_price_without_taxes = $total_price_without_taxes;

        return $this;
    }

    public function getTotalPriceAllTaxesIncluded(): ?float
    {
        return $this->total_price_all_taxes_included;
    }

    public function setTotalPriceAllTaxesIncluded(float $total_price_all_taxes_included): self
    {
        $this->total_price_all_taxes_included = $total_price_all_taxes_included;

        return $this;
    }

    /**
     * @return Collection|Products[]
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Products $product): self
    {
        if (!$this->products->contains($product)) {
            $this->products[] = $product;
        }

        return $this;
    }

    public function removeProduct(Products $product): self
    {
        if ($this->products->contains($product)) {
            $this->products->removeElement($product);
        }

        return $this;
    }

    public function __toString() 
    {
        return $this->getUser();
    }
}
