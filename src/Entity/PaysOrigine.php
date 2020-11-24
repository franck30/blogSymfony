<?php

namespace App\Entity;

use App\Repository\PaysOrigineRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PaysOrigineRepository::class)
 */
class PaysOrigine
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\InfosPerso", mappedBy="paysOrigine")
     */
    private $infosPerso;


    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\ExperienceProUtilisateur", mappedBy="paysOrigine")
     */
    private $experiencePro;


    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\FormationUtilisateur", mappedBy="paysOrigine")
     */
    private $formationUtilisateur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getInfosPerso()
    {
        return $this->infosPerso;
    }

    /**
     * @param mixed $infosPerso
     */
    public function setInfosPerso($infosPerso): void
    {
        $this->infosPerso = $infosPerso;
    }

    /**
     * @return mixed
     */
    public function getExperiencePro()
    {
        return $this->experiencePro;
    }

    /**
     * @param mixed $experiencePro
     */
    public function setExperiencePro($experiencePro): void
    {
        $this->experiencePro = $experiencePro;
    }

    /**
     * @return mixed
     */
    public function getFormationUtilisateur()
    {
        return $this->formationUtilisateur;
    }

    /**
     * @param mixed $formationUtilisateur
     */
    public function setFormationUtilisateur($formationUtilisateur): void
    {
        $this->formationUtilisateur = $formationUtilisateur;
    }



}
