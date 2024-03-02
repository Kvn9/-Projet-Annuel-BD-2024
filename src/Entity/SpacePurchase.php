<?php

namespace App\Entity;

use App\Repository\SpacePurchaseRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpacePurchaseRepository::class)]
class SpacePurchase
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $Purchase_ID = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $PurchaseDate = null;

    #[ORM\Column(length: 255)]
    private ?string $PurchasedSpace = null;

    #[ORM\Column]
    private ?int $TotalAmount = null;

    #[ORM\ManyToOne(inversedBy: 'user_SpacePurchaseID')]
    private ?user $Id_user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPurchaseID(): ?int
    {
        return $this->Purchase_ID;
    }

    public function setPurchaseID(int $Purchase_ID): static
    {
        $this->Purchase_ID = $Purchase_ID;

        return $this;
    }

    public function getPurchaseDate(): ?\DateTimeInterface
    {
        return $this->PurchaseDate;
    }

    public function setPurchaseDate(\DateTimeInterface $PurchaseDate): static
    {
        $this->PurchaseDate = $PurchaseDate;

        return $this;
    }

    public function getPurchasedSpace(): ?string
    {
        return $this->PurchasedSpace;
    }

    public function setPurchasedSpace(string $PurchasedSpace): static
    {
        $this->PurchasedSpace = $PurchasedSpace;

        return $this;
    }

    public function getTotalAmount(): ?int
    {
        return $this->TotalAmount;
    }

    public function setTotalAmount(int $TotalAmount): static
    {
        $this->TotalAmount = $TotalAmount;

        return $this;
    }

    public function getIdUser(): ?user
    {
        return $this->Id_user;
    }

    public function setIdUser(?user $Id_user): static
    {
        $this->Id_user = $Id_user;

        return $this;
    }
}
