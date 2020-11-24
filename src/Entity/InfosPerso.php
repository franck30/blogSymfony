<?php

namespace App\Entity;

use App\Repository\InfosPersoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InfosPersoRepository::class)
 */
class InfosPerso
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
    private $urlPhoto;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $paysResidence;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $villeResidence;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\PaysOrigine", inversedBy="infosPerso")
     */
    private $paysOrigine;

    /**
     * @var User
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="infoPersos")
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrlPhoto(): ?string
    {
        return $this->urlPhoto;
    }

    public function setUrlPhoto(?string $urlPhoto): self
    {
        $this->urlPhoto = $urlPhoto;

        return $this;
    }

    public function getPaysResidence(): ?string
    {
        return $this->paysResidence;
    }

    public function setPaysResidence(?string $paysResidence): self
    {
        $this->paysResidence = $paysResidence;

        return $this;
    }

    public function getVilleResidence(): ?string
    {
        return $this->villeResidence;
    }

    public function setVilleResidence(?string $villeResidence): self
    {
        $this->villeResidence = $villeResidence;

        return $this;
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
