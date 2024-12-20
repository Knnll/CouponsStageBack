<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use App\Repository\CouponRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Attribute\Groups;

#[ORM\Entity(repositoryClass: CouponRepository::class)]
#[ApiResource(
    operations: [
        new Get(normalizationContext: ['groups' => 'getDetailCoupon']),
        new GetCollection(normalizationContext: ['groups' => 'getCoupons']),
    ],
    paginationEnabled: false,
)]
class Coupon
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['getDetailCoupons', 'getCoupons'])]
    private ?int $id = null;

    #[ORM\Column(length: 100, nullable: true)]
    #[Groups(['getDetailCoupon', 'getCoupons'])]
    private ?string $titre = null;

    #[ORM\Column(length: 100, nullable: true)]
    #[Groups(['getDetailCoupon', 'getCoupons'])]
    private ?string $adresse = null;

    #[ORM\Column(length: 50, nullable: true)]
    #[Groups(['getDetailCoupon', 'getCoupons'])]
    private ?string $ville = null;

    #[ORM\Column(length: 5, nullable: true)]
    #[Groups(['getDetailCoupon', 'getCoupons'])]
    private ?string $code_postal = null;

    #[ORM\Column(nullable: true)]
    #[Groups(['getDetailCoupon', 'getCoupons'])]
    private ?float $prix = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['getDetailCoupon', 'getCoupons'])]
    private ?string $conditions = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    #[Groups(['getDetailCoupon', 'getCoupons'])]
    private ?\DateTimeImmutable $date_creation = null;

    #[ORM\Column(type: Types::DATE_IMMUTABLE, nullable: true)]
    #[Groups(['getDetailCoupon', 'getCoupons'])]
    private ?\DateTimeImmutable $fin_validite = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    #[Groups(['getDetailCoupon', 'getCoupons'])]
    private ?string $QR_code = null;
    
    #[ORM\ManyToOne(targetEntity: Acheteur::class, inversedBy: 'coupons')]
    #[Groups(['getDetailCoupon', 'getCoupons'])]
    private Collection $acheteurs;

    #[ORM\ManyToOne(targetEntity: Commerce::class, inversedBy: 'coupons')]
    #[Groups(['getDetailCoupon', 'getCoupons'])]
    private ?Commerce $commerce = null;

    #[ORM\ManyToOne(inversedBy: 'coupons')]
    #[Groups(['getDetailCoupon', 'getCoupons'])]
    private ?Association $association = null;

    /**
     * @param Collection $acheteurs
     */
    public function __construct()
    {
        $this->acheteurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): static
    {
        $this->titre = $titre;

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

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): static
    {
        $this->ville = $ville;

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

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(?float $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getConditions(): ?string
    {
        return $this->conditions;
    }

    public function setConditions(?string $conditions): static
    {
        $this->conditions = $conditions;

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

    public function getFinValidite(): ?\DateTimeImmutable
    {
        return $this->fin_validite;
    }

    public function setFinValidite(?\DateTimeImmutable $fin_validite): static
    {
        $this->fin_validite = $fin_validite;

        return $this;
    }

    public function getQRCode(): ?string
    {
        return $this->QR_code;
    }

    public function setQRCode(?string $QR_code): static
    {
        $this->QR_code = $QR_code;

        return $this;
    }

    /**
     * @return Collection<int, Acheteur>
     */
    public function getAcheteurs(): Collection
    {
        return $this->acheteurs;
    }

    public function addAcheteur(Acheteur $acheteur): static
    {
        if (!$this->acheteurs->contains($acheteur)) {
            $this->acheteurs->add($acheteur);
            $acheteur->setCoupon($this);
        }

        return $this;
    }

    public function removeAcheteur(Acheteur $acheteur): static
    {
        if ($this->acheteurs->removeElement($acheteur)) {
            // set the owning side to null (unless already changed)
            if ($acheteur->getCoupon() === $this) {
                $acheteur->setCoupon(null);
            }
        }

        return $this;
    }

    /*
    public function getCoupons(): ?Association
    {
        return $this->coupons;
    }

    public function setCoupons(?Association $coupons): static
    {
        $this->coupons = $coupons;

        return $this;
    }
    */

    public function getCommerce(): ?Commerce
    {
        return $this->commerce;
    }

    public function setCommerce(?Commerce $commerce): static
    {
        $this->commerce = $commerce;

        return $this;
    }

    public function getAssociation(): ?Association
    {
        return $this->association;
    }

    public function setAssociation(?Association $association): static
    {
        $this->association = $association;

        return $this;
    }
}
