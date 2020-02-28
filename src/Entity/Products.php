<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductsRepository")
 */
class Products
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="float")
     */
    private $price_without_taxes;

    /**
     * @ORM\Column(type="float")
     */
    private $price_all_taxes_included;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_available;

    /**
     * @ORM\Column(type="integer")
     */
    private $product_stock;

    /**
     * @ORM\Column(type="integer")
     */
    private $times_purchased;

    /**
     * @ORM\Column(type="boolean")
     */
    private $has_different_sizes;

    /**
     * @ORM\Column(type="boolean")
     */
    private $has_different_colors;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reviews", mappedBy="product", orphanRemoval=true)
     */
    private $reviews;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Cart", mappedBy="products")
     */
    private $carts;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Bills", mappedBy="products")
     */
    private $bills;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Categories", mappedBy="products")
     */
    private $categories;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Deals", mappedBy="products")
     */
    private $deals;

    public function __construct()
    {
        $this->reviews = new ArrayCollection();
        $this->carts = new ArrayCollection();
        $this->bills = new ArrayCollection();
        $this->categories = new ArrayCollection();
        $this->deals = new ArrayCollection();
    }

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getPriceWithoutTaxes(): ?float
    {
        return $this->price_without_taxes;
    }

    public function setPriceWithoutTaxes(float $price_without_taxes): self
    {
        $this->price_without_taxes = $price_without_taxes;

        return $this;
    }

    public function getPriceAllTaxesIncluded(): ?float
    {
        return $this->price_all_taxes_included;
    }

    public function setPriceAllTaxesIncluded(float $price_all_taxes_included): self
    {
        $this->price_all_taxes_included = $price_all_taxes_included;

        return $this;
    }

    public function getIsAvailable(): ?bool
    {
        return $this->is_available;
    }

    public function setIsAvailable(bool $is_available): self
    {
        $this->is_available = $is_available;

        return $this;
    }

    public function getProductStock(): ?int
    {
        return $this->product_stock;
    }

    public function setProductStock(int $product_stock): self
    {
        $this->product_stock = $product_stock;

        return $this;
    }

    public function getTimesPurchased(): ?int
    {
        return $this->times_purchased;
    }

    public function setTimesPurchased(int $times_purchased): self
    {
        $this->times_purchased = $times_purchased;

        return $this;
    }

    public function getHasDifferentSizes(): ?bool
    {
        return $this->has_different_sizes;
    }

    public function setHasDifferentSizes(bool $has_different_sizes): self
    {
        $this->has_different_sizes = $has_different_sizes;

        return $this;
    }

    public function getHasDifferentColors(): ?bool
    {
        return $this->has_different_colors;
    }

    public function setHasDifferentColors(bool $has_different_colors): self
    {
        $this->has_different_colors = $has_different_colors;

        return $this;
    }

    /**
     * @return Collection|Reviews[]
     */
    public function getReviews(): Collection
    {
        return $this->reviews;
    }

    public function addReview(Reviews $review): self
    {
        if (!$this->reviews->contains($review)) {
            $this->reviews[] = $review;
            $review->setProduct($this);
        }

        return $this;
    }

    public function removeReview(Reviews $review): self
    {
        if ($this->reviews->contains($review)) {
            $this->reviews->removeElement($review);
            // set the owning side to null (unless already changed)
            if ($review->getProduct() === $this) {
                $review->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Cart[]
     */
    public function getCarts(): Collection
    {
        return $this->carts;
    }

    public function addCart(Cart $cart): self
    {
        if (!$this->carts->contains($cart)) {
            $this->carts[] = $cart;
            $cart->addProduct($this);
        }

        return $this;
    }

    public function removeCart(Cart $cart): self
    {
        if ($this->carts->contains($cart)) {
            $this->carts->removeElement($cart);
            $cart->removeProduct($this);
        }

        return $this;
    }

    /**
     * @return Collection|Bills[]
     */
    public function getBills(): Collection
    {
        return $this->bills;
    }

    public function addBill(Bills $bill): self
    {
        if (!$this->bills->contains($bill)) {
            $this->bills[] = $bill;
            $bill->addProduct($this);
        }

        return $this;
    }

    public function removeBill(Bills $bill): self
    {
        if ($this->bills->contains($bill)) {
            $this->bills->removeElement($bill);
            $bill->removeProduct($this);
        }

        return $this;
    }

    /**
     * @return Collection|Categories[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(Categories $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->addProduct($this);
        }

        return $this;
    }

    public function removeCategory(Categories $category): self
    {
        if ($this->categories->contains($category)) {
            $this->categories->removeElement($category);
            $category->removeProduct($this);
        }

        return $this;
    }

    /**
     * @return Collection|Deals[]
     */
    public function getDeals(): Collection
    {
        return $this->deals;
    }

    public function addDeal(Deals $deal): self
    {
        if (!$this->deals->contains($deal)) {
            $this->deals[] = $deal;
            $deal->addProduct($this);
        }

        return $this;
    }

    public function removeDeal(Deals $deal): self
    {
        if ($this->deals->contains($deal)) {
            $this->deals->removeElement($deal);
            $deal->removeProduct($this);
        }

        return $this;
    }
}
