<?php

namespace App\Entity ;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Product
 * @ORM\Table(name="Product")
 * @ORM\Entity
 */
class Product {
    /**
     * @return string
     */
    public function getSeller(): string
    {
        return $this->seller;
    }

    /**
     * @param string $seller
     */
    public function setSeller(string $seller): void
    {
        $this->seller = $seller;
    }

    /**
     * @return string
     */
    public function getCategory(): string
    {
        return $this->category;
    }

    /**
     * @param string $category
     */
    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     */
    public function setImage(string $image): void
    {
        $this->image = $image;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    /**
     * @var int
     *
     * @ORM\Column(name="Id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Seller", type="string", nullable=false)
     * @Assert\NotBlank
     * @Assert\Length(min=10)
     */
    private $seller ;

    /**
     * @var string
     *
     * @ORM\Column(name="Category", type="string", nullable=false)
     */
    private $category ;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", nullable=false)
     * @Assert\NotBlank
     * @Assert\Length(min=10)
     */
    private $name ;

    /**
     * @var string
     *
     * @ORM\Column(name="Description", type="string", nullable=true)
     */
    private $description ;

    /**
     * @var string
     *
     * @ORM\Column(name="Image", type="string", nullable=true)
     */
    private $image ;

    /**
     * @var integer
     *
     * @ORM\Column(name="Price", type="integer", nullable=false)
     * @Assert\NotBlank
     */
    private $price ;


}