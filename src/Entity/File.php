<?php

namespace App\Entity;

use App\Repository\FileRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FileRepository::class)]
class File
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $FileID = null;

    #[ORM\Column(length: 255)]
    private ?string $FileName = null;

    #[ORM\Column(length: 255)]
    private ?string $FilePath = null;

    #[ORM\Column(length: 255)]
    private ?string $FileSize = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $UploadDate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $FileFormat = null;

    #[ORM\ManyToOne(inversedBy: 'FilesId')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $Id_User = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFileID(): ?int
    {
        return $this->FileID;
    }

    public function setFileID(int $FileID): static
    {
        $this->FileID = $FileID;

        return $this;
    }

    public function getFileName(): ?string
    {
        return $this->FileName;
    }

    public function setFileName(string $FileName): static
    {
        $this->FileName = $FileName;

        return $this;
    }

    public function getFilePath(): ?string
    {
        return $this->FilePath;
    }

    public function setFilePath(string $FilePath): static
    {
        $this->FilePath = $FilePath;

        return $this;
    }

    public function getFileSize(): ?string
    {
        return $this->FileSize;
    }

    public function setFileSize(string $FileSize): static
    {
        $this->FileSize = $FileSize;

        return $this;
    }

    public function getUploadDate(): ?\DateTimeInterface
    {
        return $this->UploadDate;
    }

    public function setUploadDate(\DateTimeInterface $UploadDate): static
    {
        $this->UploadDate = $UploadDate;

        return $this;
    }

    public function getFileFormat(): ?string
    {
        return $this->FileFormat;
    }

    public function setFileFormat(?string $FileFormat): static
    {
        $this->FileFormat = $FileFormat;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->Id_User;
    }

    public function setIdUser(?User $Id_User): static
    {
        $this->Id_User = $Id_User;

        return $this;
    }
}
