<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CategoriesRepository")
 */
class Categories
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categories", inversedBy="categories")
     */
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Categories", mappedBy="parent")
     */
    private $categories;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Products", inversedBy="categories")
     */
    private $products;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Deals", mappedBy="categories")
     */
    private $deals;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->products = new ArrayCollection();
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

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    public function addCategory(self $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->setParent($this);
        }

        return $this;
    }

    public function removeCategory(self $category): self
    {
        if ($this->categories->contains($category)) {
            $this->categories->removeElement($category);
            // set the owning side to null (unless already changed)
            if ($category->getParent() === $this) {
                $category->setParent(null);
            }
        }

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
            $deal->addCategory($this);
        }

        return $this;
    }

    public function removeDeal(Deals $deal): self
    {
        if ($this->deals->contains($deal)) {
            $this->deals->removeElement($deal);
            $deal->removeCategory($this);
        }

        return $this;
    }
}
