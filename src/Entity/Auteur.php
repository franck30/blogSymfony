<?php

namespace App\Entity;

use App\Repository\AuteurRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AuteurRepository::class)
 */
class Auteur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column
     */
    private $nom;

    /**
     * @var string
     * @ORM\Column
     */
    private $urlPhoto;

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getUrlPhoto(): string
    {
        return $this->urlPhoto;
    }

    /**
     * @param string $urlPhoto
     */
    public function setUrlPhoto(string $urlPhoto): void
    {
        $this->urlPhoto = $urlPhoto;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
