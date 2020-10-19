<?php

namespace App\Entity;

use App\Repository\CommentaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommentaireRepository::class)
 */
class Commentaire
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @var string
     * @ORM\Column()
     */
    private $contenu;

    /**
     * @var \DateTimeImmutable
     * @ORM\Column(type="datetime_immutable")
     */
    private $datePublication;

    /**
     * @var Commentaire
     * @ORM\ManyToOne(targetEntity="App\Entity\Commentaire", inversedBy="children")
     */
    private $parent;


    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="App\Entity\Commentaire", mappedBy="parent")
     */
    private $children;


    /**
     * @var string
     * @ORM\Column()
     */
    private $auteur;


    /**
     * @var Media
     * @ORM\ManyToOne(targetEntity="App\Entity\Media", inversedBy="commentaire")
     */
    private $media;

    /**
     * @ORM\OneToMany(targetEntity=LikeCommentaire::class, mappedBy="commentaire")
     */
    private $likeCommentaires;

    /**
     * Commentaire constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->datePublication = new \DateTimeImmutable();
        $this->children = new ArrayCollection();
        $this->likeCommentaires = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getContenu(): string
    {
        return $this->contenu;
    }

    /**
     * @param string $contenu
     */
    public function setContenu(string $contenu): void
    {
        $this->contenu = $contenu;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDatePublication(): \DateTimeImmutable
    {
        return $this->datePublication;
    }

    /**
     * @param \DateTimeImmutable $datePublication
     */
    public function setDatePublication(\DateTimeImmutable $datePublication): void
    {
        $this->datePublication = $datePublication;

    }

    /**
     * @return Commentaire
     */
    public function getParent(): ?Commentaire
    {
        return $this->parent;
    }

    /**
     * @param Commentaire $parent
     */
    public function setParent(Commentaire $parent): void
    {
        $this->parent = $parent;
    }

    /**
     * @return Collection
     */
    public function getChildren(): ?Collection
    {
        return $this->children;
    }

    /**
     * @param Collection $children
     */
    public function setChildren(Collection $children): void
    {
        $this->children = $children;
    }

    /**
     * @return string
     */
    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    /**
     * @param string $auteur
     */
    public function setAuteur(string $auteur): void
    {
        $this->auteur = $auteur;
    }

    /**
     * @return Media
     */
    public function getMedia(): Media
    {
        return $this->media;
    }

    /**
     * @param Media $media
     */
    public function setMedia(Media $media): void
    {
        $this->media = $media;
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
            $likeCommentaire->setCommentaire($this);
        }

        return $this;
    }

    public function removeLikeCommentaire(LikeCommentaire $likeCommentaire): self
    {
        if ($this->likeCommentaires->contains($likeCommentaire)) {
            $this->likeCommentaires->removeElement($likeCommentaire);
            // set the owning side to null (unless already changed)
            if ($likeCommentaire->getCommentaire() === $this) {
                $likeCommentaire->setCommentaire(null);
            }
        }

        return $this;
    }





}
