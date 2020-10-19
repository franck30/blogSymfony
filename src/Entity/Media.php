<?php

namespace App\Entity;

use App\Repository\MediaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MediaRepository::class)
 */
class Media
{

    const ARTICLE = "article";
    const AUDIO = "audio";
    const VIDEO = "video";


    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

//    private $media = array(
//        'article' => 'article',
//        'audio' => 'audio',
//        'video' => 'video'
//        );

    /**
     * @var string|null
     * @ORM\Column
     */
    private $titre;



    /**
     * @var string|null
     * @ORM\Column
     */
    private ?string $typeMedia;


    /**
     * @var \DateTimeImmutable
     * @ORM\Column(type="datetime_immutable")
     */
    private \DateTimeImmutable $date_publication;

    /**
     * @var string
     * @ORM\Column
     */
    private $url;


    /**
     * @var string
     * @ORM\Column
     */
    private $nom_auteur;




    /**
     * @var string
     * @ORM\Column
     */
    private $urlImage;

    /**
     * @var string|null
     * @ORM\Column(type="text")
     */
    private ?string $resume;

    /**
     * @var Collection
     * @ORM\OneToMany(targetEntity="App\Entity\Commentaire", mappedBy="media")
     */
    private $commentaire;

    /**
     * @ORM\OneToMany(targetEntity=LikeMedia::class, mappedBy="media")
     */
    private $likeMedia;

    /**
     * Media constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->date_publication = new \DateTimeImmutable();
        $this->commentaire = new ArrayCollection();
        $this->likeMedia = new ArrayCollection();
    }

    /**
     * @return string|null
     */
    public function getTypeMedia(): ?string
    {
        return $this->typeMedia;
    }

    /**
     * @param string|null $typeMedia
     */
    public function setTypeMedia(?string $typeMedia): void
    {
        $this->typeMedia = $typeMedia;
    }

    /**
     * @return string|null
     */
    public function getResume(): ?string
    {
        return $this->resume;
    }

    /**
     * @param string|null $resume
     */
    public function setResume(?string $resume): void
    {
        $this->resume = $resume;
    }






    /**
     * @return \DateTimeImmutable
     */
    public function getDatePublication(): \DateTimeImmutable
    {
        return $this->date_publication;
    }

    /**
     * @param \DateTimeImmutable $date_publication
     */
    public function setDatePublication(\DateTimeImmutable $date_publication): void
    {
        $this->date_publication = $date_publication;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrlImage(): string
    {
        return $this->urlImage;
    }

    /**
     * @param string $urlImage
     */
    public function setUrlImage(string $urlImage): void
    {
        $this->urlImage = $urlImage;
    }






    public function getId(): ?int
    {
        return $this->id;
    }


    /**
     * @return string
     */
    public function getNomAuteur(): string
    {
        return $this->nom_auteur;
    }

    /**
     * @param string $nom_auteur
     */
    public function setNomAuteur(string $nom_auteur): void
    {
        $this->nom_auteur = $nom_auteur;
    }

    /**
     * @return string
     */
    public function getTitre(): string
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }

    /**
     * @return Collection
     */
    public function getCommentaire(): ?Collection
    {
        return $this->commentaire;
    }

    /**
     * @param Collection $commentaire
     */
    public function setCommentaire(Collection $commentaire): void
    {
        $this->commentaire = $commentaire;
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
            $likeMedium->setMedia($this);
        }

        return $this;
    }

    public function removeLikeMedium(LikeMedia $likeMedium): self
    {
        if ($this->likeMedia->contains($likeMedium)) {
            $this->likeMedia->removeElement($likeMedium);
            // set the owning side to null (unless already changed)
            if ($likeMedium->getMedia() === $this) {
                $likeMedium->setMedia(null);
            }
        }

        return $this;
    }


    /**
     * permet de savoir si ce media est liké par un utilisateur
     * @param User $user
     * @return bool
     */
    public function isLikedByUser(User $user) : bool
    {
        foreach ($this->likeMedia as $like) {
            if ($like->getUser() === $user) return  true;
        }

        return false;
    }


}
