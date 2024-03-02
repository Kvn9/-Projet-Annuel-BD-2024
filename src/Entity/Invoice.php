<?php

namespace App\Entity;

use App\Repository\InvoiceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InvoiceRepository::class)]
class Invoice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $invoiceid = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $InvoiceDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $DescriptionOfItemInVoiced = null;

    #[ORM\Column]
    private ?int $UnitPriceTax = null;

    #[ORM\Column]
    private ?int $Quantity = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $VATAmount = null;

    #[ORM\Column(nullable: true)]
    private ?int $totalAmountIncludingTaxes = null;

    #[ORM\ManyToOne(inversedBy: 'Invoice_Id')]
    #[ORM\JoinColumn(nullable: false)]
    private ?user $Id_User = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInvoiceid(): ?int
    {
        return $this->invoiceid;
    }

    public function setInvoiceid(int $invoiceid): static
    {
        $this->invoiceid = $invoiceid;

        return $this;
    }

    public function getInvoiceDate(): ?\DateTimeInterface
    {
        return $this->InvoiceDate;
    }

    public function setInvoiceDate(\DateTimeInterface $InvoiceDate): static
    {
        $this->InvoiceDate = $InvoiceDate;

        return $this;
    }

    public function getDescriptionOfItemInVoiced(): ?string
    {
        return $this->DescriptionOfItemInVoiced;
    }

    public function setDescriptionOfItemInVoiced(?string $DescriptionOfItemInVoiced): static
    {
        $this->DescriptionOfItemInVoiced = $DescriptionOfItemInVoiced;

        return $this;
    }

    public function getUnitPriceTax(): ?int
    {
        return $this->UnitPriceTax;
    }

    public function setUnitPriceTax(int $UnitPriceTax): static
    {
        $this->UnitPriceTax = $UnitPriceTax;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->Quantity;
    }

    public function setQuantity(int $Quantity): static
    {
        $this->Quantity = $Quantity;

        return $this;
    }

    public function getVATAmount(): ?string
    {
        return $this->VATAmount;
    }

    public function setVATAmount(?string $VATAmount): static
    {
        $this->VATAmount = $VATAmount;

        return $this;
    }

    public function getTotalAmountIncludingTaxes(): ?int
    {
        return $this->totalAmountIncludingTaxes;
    }

    public function setTotalAmountIncludingTaxes(?int $totalAmountIncludingTaxes): static
    {
        $this->totalAmountIncludingTaxes = $totalAmountIncludingTaxes;

        return $this;
    }

    public function getIdUser(): ?user
    {
        return $this->Id_User;
    }

    public function setIdUser(?user $Id_User): static
    {
        $this->Id_User = $Id_User;

        return $this;
    }
}
