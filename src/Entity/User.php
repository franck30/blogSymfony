<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

use Symfony\Component\Security\Core\User\UserInterface;
//use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * UniqueEntity(fields={"email"}, message="There is already an account with this email")
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $password;


    /**
     */
    public string $confirmPassword;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\OneToMany(targetEntity=LikeMedia::class, mappedBy="user")
     */
    private $likeMedia;

    /**
     * @ORM\OneToMany(targetEntity=LikeCommentaire::class, mappedBy="user")
     */
    private $likeCommentaires;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVerified = false;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $facebookID;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $facebookAccessToken;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $googleID;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $googleAccessToken;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $linkedinID;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $linkedinAccessToken;


    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="App\Entity\InfosPerso", mappedBy="user")
     */
    private $infoPersos;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="App\Entity\InfosPerso", mappedBy="user")
     */
    private $experienceUtilisateur;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="App\Entity\InfosPerso", mappedBy="user")
     */
    private $formationUtilisateur;

    public function __construct()
    {
        $this->likeMedia = new ArrayCollection();
        $this->likeCommentaires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * @return string
     */
    public function getConfirmPassword(): string
    {
        return $this->confirmPassword;
    }

    /**
     * @param string $confirmPassword
     */
    public function setConfirmPassword(string $confirmPassword): void
    {
        $this->confirmPassword = $confirmPassword;
    }

    /**
     * @return Collection|LikeMedia[]
     */
    public function getLikeMedia(): Collection
    {
        return $this->likeMedia;
    }

    public function addLikeMedium(LikeMedia $likeMedium): self
    {
        if (!$this->likeMedia->contains($likeMedium)) {
            $this->likeMedia[] = $likeMedium;
            $likeMedium->setUser($this);
        }

        return $this;
    }

    public function removeLikeMedium(LikeMedia $likeMedium): self
    {
        if ($this->likeMedia->contains($likeMedium)) {
            $this->likeMedia->removeElement($likeMedium);
            // set the owning side to null (unless already changed)
            if ($likeMedium->getUser() === $this) {
                $likeMedium->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|LikeCommentaire[]
     */
    public function getLikeCommentaires(): Collection
    {
        return $this->likeCommentaires;
    }

    public function addLikeCommentaire(LikeCommentaire $likeCommentaire): self
    {
        if (!$this->likeCommentaires->contains($likeCommentaire)) {
            $this->likeCommentaires[] = $likeCommentaire;
            $likeCommentaire->setUser($this);
        }

        return $this;
    }

    public function removeLikeCommentaire(LikeCommentaire $likeCommentaire): self
    {
        if ($this->likeCommentaires->contains($likeCommentaire)) {
            $this->likeCommentaires->removeElement($likeCommentaire);
            // set the owning side to null (unless already changed)
            if ($likeCommentaire->getUser() === $this) {
                $likeCommentaire->setUser(null);
            }
        }

        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFacebookID()
    {
        return $this->facebookID;
    }

    /**
     * @param mixed $facebookID
     */
    public function setFacebookID($facebookID): void
    {
        $this->facebookID = $facebookID;
    }

    /**
     * @return mixed
     */
    public function getFacebookAccessToken()
    {
        return $this->facebookAccessToken;
    }

    /**
     * @param mixed $facebookAccessToken
     */
    public function setFacebookAccessToken($facebookAccessToken): void
    {
        $this->facebookAccessToken = $facebookAccessToken;
    }

    /**
     * @return mixed
     */
    public function getGoogleID()
    {
        return $this->googleID;
    }

    /**
     * @param mixed $googleID
     */
    public function setGoogleID($googleID): void
    {
        $this->googleID = $googleID;
    }

    /**
     * @return mixed
     */
    public function getGoogleAccessToken()
    {
        return $this->googleAccessToken;
    }

    /**
     * @param mixed $googleAccessToken
     */
    public function setGoogleAccessToken($googleAccessToken): void
    {
        $this->googleAccessToken = $googleAccessToken;
    }

    /**
     * @return mixed
     */
    public function getLinkedinID()
    {
        return $this->linkedinID;
    }

    /**
     * @param mixed $linkedinID
     */
    public function setLinkedinID($linkedinID): void
    {
        $this->linkedinID = $linkedinID;
    }

    /**
     * @return mixed
     */
    public function getLinkedinAccessToken()
    {
        return $this->linkedinAccessToken;
    }

    /**
     * @param mixed $linkedinAccessToken
     */
    public function setLinkedinAccessToken($linkedinAccessToken): void
    {
        $this->linkedinAccessToken = $linkedinAccessToken;
    }

    /**
     * @return Collection
     */
    public function getInfoPersos(): Collection
    {
        return $this->infoPersos;
    }

    /**
     * @param Collection $infoPersos
     */
    public function setInfoPersos(Collection $infoPersos): void
    {
        $this->infoPersos = $infoPersos;
    }

    /**
     * @return Collection
     */
    public function getExperienceUtilisateur(): Collection
    {
        return $this->experienceUtilisateur;
    }

    /**
     * @param Collection $experienceUtilisateur
     */
    public function setExperienceUtilisateur(Collection $experienceUtilisateur): void
    {
        $this->experienceUtilisateur = $experienceUtilisateur;
    }

    /**
     * @return Collection
     */
    public function getFormationUtilisateur(): Collection
    {
        return $this->formationUtilisateur;
    }

    /**
     * @param Collection $formationUtilisateur
     */
    public function setFormationUtilisateur(Collection $formationUtilisateur): void
    {
        $this->formationUtilisateur = $formationUtilisateur;
    }





}
