<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'Il existe déjà un compte avec cette email')]
class Utilisateur implements UserInterface, PasswordAuthenticatedUserInterface
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

   

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $nom = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $prenom = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dateCreation = null;

    #[ORM\Column]
    private ?bool $status = null;

    #[ORM\OneToMany(targetEntity: Annonce::class, mappedBy: 'Utilisateur', orphanRemoval: true)]
    private Collection $annonces;

    #[ORM\OneToMany(targetEntity: ProfilRecruteur::class, mappedBy: 'utilisateur', cascade: ['persist', 'remove'])]
    private Collection $profilRecruteurs;

     #[ORM\OneToMany(targetEntity: ProfilCandidat::class, mappedBy: 'Utilisateur', cascade: ['persist', 'remove'])]
    private Collection $profilCandidats;

    #[ORM\OneToMany(targetEntity: Candidature::class, mappedBy: 'Utilisateur', cascade: ['persist', 'remove'])]
    private Collection $candidatures;

   


    public function __construct()
    {
        $this->annonces = new ArrayCollection();
        $this->profilRecruteurs = new ArrayCollection();
        $this->candidatures = new ArrayCollection();
        $this->profilCandidats = new ArrayCollection();
    }

    

    // #[ORM\Column(length: 50)]
    // private ?string $typeUtilisateur = null;

    // #[ORM\Column]
    // private ?bool $status = null;

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

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->dateCreation;
    }

    public function setDateCreation(?\DateTimeInterface $dateCreation): static
    {
        $this->dateCreation = $dateCreation;

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

    /**
     * @return Collection<int, Annonce>
     */
    public function getAnnonces(): Collection
    {
        return $this->annonces;
    }

    public function addAnnonce(Annonce $annonce): static
    {
        if (!$this->annonces->contains($annonce)) {
            $this->annonces->add($annonce);
            $annonce->setUtilisateur($this);
        }

        return $this;
    }

    public function removeAnnonce(Annonce $annonce): static
    {
        if ($this->annonces->removeElement($annonce)) {
            // set the owning side to null (unless already changed)
            if ($annonce->getUtilisateur() === $this) {
                $annonce->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProfilRecruteur>
     */
    public function getProfilRecruteurs(): Collection
    {
        return $this->profilRecruteurs;
    }

    public function addProfilRecruteur(ProfilRecruteur $profilRecruteur): static
    {
        if (!$this->profilRecruteurs->contains($profilRecruteur)) {
            $this->profilRecruteurs->add($profilRecruteur);
            $profilRecruteur->setUtilisateur($this);
        }

        return $this;
    }

    public function removeProfilRecruteur(ProfilRecruteur $profilRecruteur): static
    {
        if ($this->profilRecruteurs->removeElement($profilRecruteur)) {
            // set the owning side to null (unless already changed)
            if ($profilRecruteur->getUtilisateur() === $this) {
                $profilRecruteur->setUtilisateur(null);
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
            $candidature->setUtilisateur($this);
        }

        return $this;
    }

    public function removeCandidature(Candidature $candidature): static
    {
        if ($this->candidatures->removeElement($candidature)) {
            // set the owning side to null (unless already changed)
            if ($candidature->getUtilisateur() === $this) {
                $candidature->setUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProfilCandidat>
     */
    public function getProfilCandidats(): Collection
    {
        return $this->profilCandidats;
    }

    public function addProfilCandidat(ProfilCandidat $profilCandidat): static
    {
        if (!$this->profilCandidats->contains($profilCandidat)) {
            $this->profilCandidats->add($profilCandidat);
            $profilCandidat->setUtilisateur($this);
        }

        return $this;
    }

    public function removeProfilCandidat(ProfilCandidat $profilCandidat): static
    {
        if ($this->profilCandidats->removeElement($profilCandidat)) {
            // set the owning side to null (unless already changed)
            if ($profilCandidat->getUtilisateur() === $this) {
                $profilCandidat->setUtilisateur(null);
            }
        }

        return $this;
    }
}