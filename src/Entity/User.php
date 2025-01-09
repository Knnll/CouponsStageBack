<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\InheritanceType("JOINED")]
#[ORM\UniqueConstraint(name: 'UNIQ_IDENTIFIER_EMAIL', fields: ['email'])]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
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

    #[ORM\OneToOne(mappedBy: 'user', cascade: ['persist', 'remove'])]
    private ?Acheteur $acheteur = null;

    #[ORM\OneToOne(mappedBy: 'user', cascade: ['persist', 'remove'])]
    private ?Association $association = null;

    #[ORM\OneToOne(mappedBy: 'user', cascade: ['persist', 'remove'])]
    private ?Commerce $commerce = null;

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

        if (in_array('ROLE_COMMERCE', $this->roles)) {
            $roles[] = 'ROLE_COMMERCE';
        }

        if (in_array('ROLE_ASSOCIATION', $this->roles)) {
            $roles[] = 'ROLE_ASSOCIATION';
        }

        if (in_array('ROLE_ACHETEUR', $this->roles)) {
            $roles[] = 'ROLE_ACHETEUR';
        }

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
    public function getPassword(): ?string
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

    public function getAcheteur(): ?Acheteur
    {
        return $this->acheteur;
    }

    public function setAcheteur(Acheteur $acheteur): static
    {
        // set the owning side of the relation if necessary
        if ($acheteur->getUser() !== $this) {
            $acheteur->setUser($this);
        }

        $this->acheteur = $acheteur;

        return $this;
    }

    public function getAssociation(): ?Association
    {
        return $this->association;
    }

    public function setAssociation(Association $association): static
    {
        // set the owning side of the relation if necessary
        if ($association->getUser() !== $this) {
            $association->setUser($this);
        }

        $this->association = $association;

        return $this;
    }

    public function getCommerce(): ?Commerce
    {
        return $this->commerce;
    }

    public function setCommerce(Commerce $commerce): static
    {
        // set the owning side of the relation if necessary
        if ($commerce->getUser() !== $this) {
            $commerce->setUser($this);
        }

        $this->commerce = $commerce;

        return $this;
    }
}
