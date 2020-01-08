<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"read"}},
 *     denormalizationContext={"groups"={"write"}}
 * )
 * @ApiFilter(SearchFilter::class, properties={"genreLists.genre": "exact"})
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
     * @Groups({"read", "write"})
     */
    private $title;

    /**
     * @ORM\Column(type="float")
     * @Groups({"read", "write"})
     */
    private $score;

    /**
     * @ORM\Column(type="float")
     * @Groups({"read", "write"})
     */
    private $episodes;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read", "write"})
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=5000, nullable=true)
     * @Groups({"read", "write"})
     */
    private $synopsisFR;

    /**
     * @ORM\Column(type="string", length=5000, nullable=true)
     * @Groups({"read", "write"})
     */
    private $synopsisEN;

    /**
     * @ORM\Column(type="string", length=300, nullable=true)
     * @Groups({"read", "write"})
     */
    private $img;

    /**
     * @ORM\Column(type="string", length=300, nullable=true)
     * @Groups({"read", "write"})
     */
    private $imgRow;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\GenreList", mappedBy="animes")
     * @Groups({"read", "write"})
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
            $genreList->addAnime($this);
        }

        return $this;
    }

    public function removeGenreList(GenreList $genreList): self
    {
        if ($this->genreLists->contains($genreList)) {
            $this->genreLists->removeElement($genreList);
            $genreList->removeAnime($this);
        }

        return $this;
    }
}
