<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnnonceRepository::class)]
class Annonce
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $descriptionAnnonce = null;

    #[ORM\Column(length: 255)]
    private ?string $lieuTravail = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateAnnonce = null;

    #[ORM\Column]
    private ?bool $status = null;

    #[ORM\ManyToOne(inversedBy: 'annonces')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $Utilisateur = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescriptionAnnonce(): ?string
    {
        return $this->descriptionAnnonce;
    }

    public function setDescriptionAnnonce(string $descriptionAnnonce): static
    {
        $this->descriptionAnnonce = $descriptionAnnonce;

        return $this;
    }

    public function getLieuTravail(): ?string
    {
        return $this->lieuTravail;
    }

    public function setLieuTravail(string $lieuTravail): static
    {
        $this->lieuTravail = $lieuTravail;

        return $this;
    }

    public function getDateAnnonce(): ?\DateTimeInterface
    {
        return $this->dateAnnonce;
    }

    public function setDateAnnonce(\DateTimeInterface $dateAnnonce): static
    {
        $this->dateAnnonce = $dateAnnonce;

        return $this;
    }

    public function isStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): static
    {
        $this->status = $status;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->Utilisateur;
    }

    public function setUtilisateur(?Utilisateur $Utilisateur): static
    {
        $this->Utilisateur = $Utilisateur;

        return $this;
    }

    
}
