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