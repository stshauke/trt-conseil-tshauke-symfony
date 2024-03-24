<?php

namespace App\Entity;

use App\Repository\ProfilRecruteurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfilRecruteurRepository::class)]
class ProfilRecruteur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nomEntreprise = null;

    #[ORM\Column(length: 255)]
    private ?string $adresseEntreprise = null;

    #[ORM\ManyToOne(inversedBy: 'profilRecruteur')]
    private ?Utilisateur $utilisateur = null;
   
    // #[ORM\OneToMany(targetEntity: Utilisateur::class, mappedBy: 'profilRecruteur',cascade: ['persist', 'remove'])]
    // private Collection  $utilisateur;
    

    // public function __construct()
    // {
    //     $this->utilisateur = new ArrayCollection();
    // }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEntreprise(): ?string
    {
        return $this->nomEntreprise;
    }

    public function setNomEntreprise(string $nomEntreprise): static
    {
        $this->nomEntreprise = $nomEntreprise;

        return $this;
    }

    public function getAdresseEntreprise(): ?string
    {
        return $this->adresseEntreprise;
    }

    public function setAdresseEntreprise(string $adresseEntreprise): static
    {
        $this->adresseEntreprise = $adresseEntreprise;

        return $this;
    }
public function getUtilisateur(): ?Utilisateur
{
    return $this->utilisateur;
}
    public function setUtilisateur(?Utilisateur $utilisateur): static
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }
    
}
