<?php

namespace App\Entity;

use App\Repository\CandidatureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CandidatureRepository::class)]
class Candidature
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $approuver = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateApprobation = null;

    #[ORM\ManyToOne(inversedBy: 'candidatures')]
    private ?Utilisateur $Utilisateur = null;




    public function getId(): ?int
    {
        return $this->id;
    }

    public function isapprouver(): ?bool
    {
        return $this->approuver;
    }

    public function setapprouver(bool $approuver): static
    {
        $this->approuver = $approuver;

        return $this;
    }

    public function getDateApprobation(): ?\DateTimeInterface
    {
        return $this->dateApprobation;
    }

    public function setDateApprobation(?\DateTimeInterface $dateApprobation): static
    {
        $this->dateApprobation = $dateApprobation;

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
