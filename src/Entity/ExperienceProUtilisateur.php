<?php

namespace App\Entity;

use App\Repository\ExperienceProUtilisateurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExperienceProUtilisateurRepository::class)
 */
class ExperienceProUtilisateur
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $entreprise;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;


    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $dateDebut;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $dateFin;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\PaysOrigine", inversedBy="infosPerso")
     */
    private $paysOrigine;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="experienceUtilisateur")
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getEntreprise(): ?string
    {
        return $this->entreprise;
    }

    public function setEntreprise(?string $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDateDebut(): \DateTime
    {
        return $this->dateDebut;
    }

    /**
     * @param \DateTime $dateDebut
     */
    public function setDateDebut(\DateTime $dateDebut): void
    {
        $this->dateDebut = $dateDebut;
    }

    /**
     * @return \DateTime
     */
    public function getDateFin(): \DateTime
    {
        return $this->dateFin;
    }

    /**
     * @param \DateTime $dateFin
     */
    public function setDateFin(\DateTime $dateFin): void
    {
        $this->dateFin = $dateFin;
    }

    /**
     * @return mixed
     */
    public function getPaysOrigine()
    {
        return $this->paysOrigine;
    }

    /**
     * @param mixed $paysOrigine
     */
    public function setPaysOrigine($paysOrigine): void
    {
        $this->paysOrigine = $paysOrigine;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }



}
