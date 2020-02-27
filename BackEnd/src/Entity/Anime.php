<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OrderBy;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"read"}, "enable_max_depth"="true"},
 *     denormalizationContext={"groups"={"write"}}
 * )
 * @ApiFilter(SearchFilter::class, properties={"genreLists.genre" : "exact","title" : "partial","status" : "exact"})
 * @ApiFilter(OrderFilter::class, properties={"title": "ASC"})
 * @ORM\Entity(repositoryClass="App\Repository\AnimeRepository")
 */
class Anime
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"read", "write"})
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
     * @OrderBy({"genre" = "ASC"})
     * @Groups({"read", "write"})
     */
    private $genreLists;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ScoreRelation", mappedBy="anime")
     * @Groups({"read"})
     * @MaxDepth(1)
     */
    private $scoreRelations;

    private $score;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CommentsAnimes", mappedBy="anime")
     * @OrderBy({"date" = "DESC"})
     * @Groups({"read", "write"})
     * @MaxDepth(1)
     */
    private $commentsAnimes;


    public function __construct()
    {
        $this->genreLists = new ArrayCollection();
        $this->scoreRelations = new ArrayCollection();
        $this->commentsAnimes = new ArrayCollection();
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

    /**
     * @return Collection|ScoreRelation[]
     */
    public function getScoreRelations(): Collection
    {
        return $this->scoreRelations;
    }

    public function addScoreRelation(ScoreRelation $scoreRelation): self
    {
        if (!$this->scoreRelations->contains($scoreRelation)) {
            $this->scoreRelations[] = $scoreRelation;
            $scoreRelation->setAnime($this);
        }

        return $this;
    }

    public function removeScoreRelation(ScoreRelation $scoreRelation): self
    {
        if ($this->scoreRelations->contains($scoreRelation)) {
            $this->scoreRelations->removeElement($scoreRelation);
            // set the owning side to null (unless already changed)
            if ($scoreRelation->getAnime() === $this) {
                $scoreRelation->setAnime(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CommentsAnimes[]
     */
    public function getCommentsAnimes(): Collection
    {
        return $this->commentsAnimes;
    }

    public function addCommentsAnime(CommentsAnimes $commentsAnime): self
    {
        if (!$this->commentsAnimes->contains($commentsAnime)) {
            $this->commentsAnimes[] = $commentsAnime;
            $commentsAnime->setAnime($this);
        }

        return $this;
    }

    public function removeCommentsAnime(CommentsAnimes $commentsAnime): self
    {
        if ($this->commentsAnimes->contains($commentsAnime)) {
            $this->commentsAnimes->removeElement($commentsAnime);
            // set the owning side to null (unless already changed)
            if ($commentsAnime->getAnime() === $this) {
                $commentsAnime->setAnime(null);
            }
        }

        return $this;
    }
}
