<?php

namespace App\Entity;

use App\Repository\AnnonceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnnonceRepository::class)]
class Annonce
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $descriptionAnnonce = null;
    #[ORM\Column(length: 255)]
    private ?string $lieuTravail = null;

    
    
    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateAnnonce = null;

    #[ORM\Column]
    private ?bool $status = null;

    #[ORM\ManyToOne(inversedBy: 'annonces')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $Utilisateur = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $posteDemandee = null;

    #[ORM\OneToMany(targetEntity: Candidature::class, mappedBy: 'annonce', orphanRemoval: true, cascade: ['persist', 'remove'])]
    private Collection $Annonce;

    #[ORM\OneToMany(targetEntity: Candidature::class, mappedBy: 'Candidature', cascade: ['persist', 'remove'])]
    private Collection $candidatures;

    public function __construct()
    {
        $this->Annonce = new ArrayCollection();
        $this->candidatures = new ArrayCollection();
    }



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

    public function setDateAnnonce(?\DateTimeInterface $dateAnnonce): static
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

    public function getPosteDemandee(): ?string
    {
        return $this->posteDemandee;
    }

    public function setPosteDemandee(?string $posteDemandee): static
    {
        $this->posteDemandee = $posteDemandee;

        return $this;
    }

    /**
     * @return Collection<int, Candidature>
     */
    public function getAnnonce(): Collection
    {
        return $this->Annonce;
    }

    public function addAnnonce(Candidature $annonce): static
    {
        if (!$this->Annonce->contains($annonce)) {
            $this->Annonce->add($annonce);
            $annonce->setAnnonce($this);
        }

        return $this;
    }

    public function removeAnnonce(Candidature $annonce): static
    {
        if ($this->Annonce->removeElement($annonce)) {
            // set the owning side to null (unless already changed)
            if ($annonce->getAnnonce() === $this) {
                $annonce->setAnnonce(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Candidature>
     */
    public function getCandidatures(): Collection
    {
        return $this->candidatures;
    }

    public function addCandidature(Candidature $candidature): static
    {
        if (!$this->candidatures->contains($candidature)) {
            $this->candidatures->add($candidature);
            // $candidature->setCandidature($this);
        }

        return $this;
    }

    public function removeCandidature(Candidature $candidature): static
    {
        if ($this->candidatures->removeElement($candidature)) {
            // set the owning side to null (unless already changed)
            // if ($candidature->getCandidature() === $this) {
            //     $candidature->setCandidature(null);
            // }
        }

        return $this;
    }


    
}
