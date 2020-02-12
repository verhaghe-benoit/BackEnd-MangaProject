<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\MangaRepository")
 */
class Manga
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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $volumes;

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
     * @ORM\Column(type="string", length=300, nullable=true)
     */
    private $img;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\GenreList", inversedBy="mangas")
     */
    private $genreLists;

    public function __construct()
    {
        $this->genreLists = new ArrayCollection();
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

    public function getVolumes(): ?int
    {
        return $this->volumes;
    }

    public function setVolumes(?int $volumes): self
    {
        $this->volumes = $volumes;

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

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(?string $img): self
    {
        $this->img = $img;

        return $this;
    }

    /**
     * @return Collection|GenreList[]
     */
    public function getGenreLists(): Collection
    {
        return $this->genreLists;
    }

    public function addGenreList(GenreList $genreList): self
    {
        if (!$this->genreLists->contains($genreList)) {
            $this->genreLists[] = $genreList;
        }

        return $this;
    }

    public function removeGenreList(GenreList $genreList): self
    {
        if ($this->genreLists->contains($genreList)) {
            $this->genreLists->removeElement($genreList);
        }

        return $this;
    }
}
