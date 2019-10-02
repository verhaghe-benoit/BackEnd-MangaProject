<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AnimeRepository")
 */
class Anime
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="float")
     */
    private $score;

    /**
     * @ORM\Column(type="float")
     */
    private $episodes;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=5000, nullable=true)
     */
    private $synopsisFR;

    /**
     * @ORM\Column(type="string", length=5000, nullable=true)
     */
    private $synopsisEN;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Genre", mappedBy="id_anime")
     */
    private $genres;

    public function __construct()
    {
        $this->genres = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getScore(): ?float
    {
        return $this->score;
    }

    public function setScore(float $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getEpisodes(): ?float
    {
        return $this->episodes;
    }

    public function setEpisodes(float $episodes): self
    {
        $this->episodes = $episodes;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getSynopsisFR(): ?string
    {
        return $this->synopsisFR;
    }

    public function setSynopsisFR(?string $synopsisFR): self
    {
        $this->synopsisFR = $synopsisFR;

        return $this;
    }

    public function getSynopsisEN(): ?string
    {
        return $this->synopsisEN;
    }

    public function setSynopsisEN(?string $synopsisEN): self
    {
        $this->synopsisEN = $synopsisEN;

        return $this;
    }

    /**
     * @return Collection|Genre[]
     */
    public function getGenres(): Collection
    {
        return $this->genres;
    }

    public function addGenre(Genre $genre): self
    {
        if (!$this->genres->contains($genre)) {
            $this->genres[] = $genre;
            $genre->setIdAnime($this);
        }

        return $this;
    }

    public function removeGenre(Genre $genre): self
    {
        if ($this->genres->contains($genre)) {
            $this->genres->removeElement($genre);
            // set the owning side to null (unless already changed)
            if ($genre->getIdAnime() === $this) {
                $genre->setIdAnime(null);
            }
        }

        return $this;
    }
}
