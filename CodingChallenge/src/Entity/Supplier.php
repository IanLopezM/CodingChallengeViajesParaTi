<?php

namespace App\Entity;

use App\Repository\SupplierRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SupplierRepository::class)
 */
class Supplier
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $phone;

    /**
     * @ORM\Column(type="boolean")
     */
    private $hotelSupplier;

    /**
     * @ORM\Column(type="boolean")
     */
    private $trackSupplier;

    /**
     * @ORM\Column(type="boolean")
     */
    private $complementSupplier;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive;

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

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function isHotelSupplier(): ?bool
    {
        return $this->hotelSupplier;
    }

    public function setHotelSupplier(bool $hotelSupplier): self
    {
        $this->hotelSupplier = $hotelSupplier;

        return $this;
    }

    public function isTrackSupplier(): ?bool
    {
        return $this->trackSupplier;
    }

    public function setTrackSupplier(bool $trackSupplier): self
    {
        $this->trackSupplier = $trackSupplier;

        return $this;
    }

    public function isComplementSupplier(): ?bool
    {
        return $this->complementSupplier;
    }

    public function setComplementSupplier(bool $complementSupplier): self
    {
        $this->complementSupplier = $complementSupplier;

        return $this;
    }

    public function isIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }
}
