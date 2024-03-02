<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $firstname = null;

    #[ORM\Column(length: 255)]
    private ?string $postalAddress = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $registrationDate = null;

    #[ORM\Column(nullable: true)]
    private ?int $usedStorageSpace = null;

    #[ORM\OneToMany(targetEntity: File::class, mappedBy: 'Id_User')]
    private Collection $FilesId;

    #[ORM\OneToMany(targetEntity: SpacePurchase::class, mappedBy: 'Id_user')]
    private Collection $user_SpacePurchaseID;

    #[ORM\OneToMany(targetEntity: Invoice::class, mappedBy: 'Id_User')]
    private Collection $Invoice_Id;

    public function __construct()
    {
        $this->FilesId = new ArrayCollection();
        $this->user_SpacePurchaseID = new ArrayCollection();
        $this->Invoice_Id = new ArrayCollection();
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     *
     * @return list<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): static
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getPostalAddress(): ?string
    {
        return $this->postalAddress;
    }

    public function setPostalAddress(string $postalAddress): static
    {
        $this->postalAddress = $postalAddress;

        return $this;
    }

    public function getRegistrationDate(): ?\DateTimeInterface
    {
        return $this->registrationDate;
    }

    public function setRegistrationDate(\DateTimeInterface $registrationDate): static
    {
        $this->registrationDate = $registrationDate;

        return $this;
    }

    public function getUsedStorageSpace(): ?int
    {
        return $this->usedStorageSpace;
    }

    public function setUsedStorageSpace(int $usedStorageSpace): static
    {
        $this->usedStorageSpace = $usedStorageSpace;

        return $this;
    }

    /**
     * @return Collection<int, File>
     */
    public function getFilesId(): Collection
    {
        return $this->FilesId;
    }

    public function addFilesId(File $filesId): static
    {
        if (!$this->FilesId->contains($filesId)) {
            $this->FilesId->add($filesId);
            $filesId->setIdUser($this);
        }

        return $this;
    }

    public function removeFilesId(File $filesId): static
    {
        if ($this->FilesId->removeElement($filesId)) {
            // set the owning side to null (unless already changed)
            if ($filesId->getIdUser() === $this) {
                $filesId->setIdUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SpacePurchase>
     */
    public function getUserSpacePurchaseID(): Collection
    {
        return $this->user_SpacePurchaseID;
    }

    public function addUserSpacePurchaseID(SpacePurchase $userSpacePurchaseID): static
    {
        if (!$this->user_SpacePurchaseID->contains($userSpacePurchaseID)) {
            $this->user_SpacePurchaseID->add($userSpacePurchaseID);
            $userSpacePurchaseID->setIdUser($this);
        }

        return $this;
    }

    public function removeUserSpacePurchaseID(SpacePurchase $userSpacePurchaseID): static
    {
        if ($this->user_SpacePurchaseID->removeElement($userSpacePurchaseID)) {
            // set the owning side to null (unless already changed)
            if ($userSpacePurchaseID->getIdUser() === $this) {
                $userSpacePurchaseID->setIdUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Invoice>
     */
    public function getInvoiceId(): Collection
    {
        return $this->Invoice_Id;
    }

    public function addInvoiceId(Invoice $invoiceId): static
    {
        if (!$this->Invoice_Id->contains($invoiceId)) {
            $this->Invoice_Id->add($invoiceId);
            $invoiceId->setIdUser($this);
        }

        return $this;
    }

    public function removeInvoiceId(Invoice $invoiceId): static
    {
        if ($this->Invoice_Id->removeElement($invoiceId)) {
            // set the owning side to null (unless already changed)
            if ($invoiceId->getIdUser() === $this) {
                $invoiceId->setIdUser(null);
            }
        }

        return $this;
    }
}
