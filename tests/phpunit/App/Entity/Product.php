<?php

declare(strict_types=1);

namespace PHPUnitTest\App\Entity;

/**
 * Product
 *
 * @author Jean-Claude <jeanyao@ymail.com>
 *
 * @license https://github.com/jeandev84/laventure-framework/blob/master/LICENSE
 *
 * @package  PHPUnitTest\App\Entity
 */
class Product
{
    protected ?int $id      = null;
    protected ?string $name = null;
    protected ?float $price = null;


    /**
     * @return int|null
    */
    public function getId(): ?int
    {
        return $this->id;
    }





    /**
     * @return string|null
    */
    public function getName(): ?string
    {
        return $this->name;
    }




    /**
     * @param string|null $name
     * @return $this
    */
    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }





    /**
     * @return float|null
    */
    public function getPrice(): ?float
    {
        return $this->price;
    }


    /**
     * @param float|null $price
     * @return $this
    */
    public function setPrice(?float $price): static
    {
        $this->price = $price;

        return $this;
    }
}
