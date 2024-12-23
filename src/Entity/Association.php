<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\AssociationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: AssociationRepository::class)]
#[ApiResource]
class Association extends User
{
    #[ORM\Column(length: 100, nullable: true)]
    #[Groups(['getDetailCoupon', 'getCoupons'])]
    private ?string $nom = null;

    #[ORM\Column(length: 100, nullable: true)]
    #[Groups(['getDetailCoupon', 'getCoupons'])]
    private ?string $adresse = null;

    #[ORM\Column(length: 5, nullable: true)]
    #[Groups(['getDetailCoupon', 'getCoupons'])]
    private ?string $code_postal = null;

    #[ORM\Column(length: 50, nullable: true)]
    #[Groups(['getDetailCoupon', 'getCoupons'])]
    private ?string $ville = null;

    #[ORM\Column(length: 14, nullable: true)]
    #[Groups(['getDetailCoupon', 'getCoupons'])]
    private ?string $siret = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    #[Groups(['getDetailCoupon', 'getCoupons'])]
    private ?\DateTimeImmutable $date_creation = null;

    /**
     * @var Collection<int, Coupon>
     */
    #[ORM\OneToMany(targetEntity: Coupon::class, mappedBy: 'association')]
    private Collection $coupons;

    public function __construct()
    {
        $this->coupons = new ArrayCollection();
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(?string $adresse): static
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->code_postal;
    }

    public function setCodePostal(?string $code_postal): static
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getSiret(): ?string
    {
        return $this->siret;
    }

    public function setSiret(?string $siret): static
    {
        $this->siret = $siret;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeImmutable
    {
        return $this->date_creation;
    }

    public function setDateCreation(?\DateTimeImmutable $date_creation): static
    {
        $this->date_creation = $date_creation;

        return $this;
    }

    /**
     * @return Collection<int, Coupon>
     */
    public function getCoupons(): Collection
    {
        return $this->coupons;
    }

    public function addCoupon(Coupon $coupon): static
    {
        if (!$this->coupons->contains($coupon)) {
            $this->coupons->add($coupon);
            $coupon->setCoupons($this);
        }

        return $this;
    }

    public function removeCoupon(Coupon $coupon): static
    {
        if ($this->coupons->removeElement($coupon)) {
            // set the owning side to null (unless already changed)
            if ($coupon->getCoupons() === $this) {
                $coupon->setCoupons(null);
            }
        }

        return $this;
    }
}
