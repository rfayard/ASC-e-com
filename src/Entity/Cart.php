<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CartRepository")
 */
class Cart
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", inversedBy="cart", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\Column(type="float")
     */
    private $total_price_without_taxes;

    /**
     * @ORM\Column(type="float")
     */
    private $total_price_all_taxes_included;

    /**
     * @ORM\Column(type="date")
     */
    private $last_modified;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CartProducts", mappedBy="cart", orphanRemoval=true)
     */
    private $cartProducts;

    public function __construct()
    {
        $this->cartProducts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

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

    public function getLastModified(): ?\DateTimeInterface
    {
        return $this->last_modified;
    }

    public function setLastModified(\DateTimeInterface $last_modified): self
    {
        $this->last_modified = $last_modified;

        return $this;
    }

    /**
     * @return Collection|CartProducts[]
     */
    public function getCartProducts(): Collection
    {
        return $this->cartProducts;
    }

    public function addCartProduct(CartProducts $cartProduct): self
    {
        if (!$this->cartProducts->contains($cartProduct)) {
            $this->cartProducts[] = $cartProduct;
            $cartProduct->setCart($this);
        }

        return $this;
    }

    public function removeCartProduct(CartProducts $cartProduct): self
    {
        if ($this->cartProducts->contains($cartProduct)) {
            $this->cartProducts->removeElement($cartProduct);
            // set the owning side to null (unless already changed)
            if ($cartProduct->getCart() === $this) {
                $cartProduct->setCart(null);
            }
        }

        return $this;
    }
}
