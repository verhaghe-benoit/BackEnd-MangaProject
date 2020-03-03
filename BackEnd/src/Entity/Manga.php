<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OrderBy;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"read_manga"}, "enable_max_depth"="true"},
 *     denormalizationContext={"groups"={"write_manga"}}
 * )
 * @ApiFilter(SearchFilter::class, properties={"genreLists.genre" : "exact","title" : "partial","status" : "exact"})
 * @ORM\Entity(repositoryClass="App\Repository\MangaRepository")
 */
class Manga
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"read_manga", "write_manga"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read_manga", "write_manga"})
     */
    private $title;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"read_manga", "write_manga"})
     */
    private $volumes;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read_manga", "write_manga"})
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=5000, nullable=true)
     * @Groups({"read_manga", "write_manga"})
     */
    private $synopsisFR;

    /**
     * @ORM\Column(type="string", length=5000, nullable=true)
     * @Groups({"read_manga", "write_manga"})
     */
    private $synopsisEN;

    /**
     * @ORM\Column(type="string", length=300, nullable=true)
     * @Groups({"read_manga", "write_manga"})
     */
    private $img;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\GenreList", inversedBy="mangas")
     * @Groups({"read_manga", "write_manga"})
     * @OrderBy({"genre" = "ASC"})
     */
    private $genreLists;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ScoreRelationManga", mappedBy="manga")
     * @Groups({"read_manga"})
     * @MaxDepth(1)
     */
    private $scoreRelationMangas;

    private $score;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CommentsMangas", mappedBy="manga")
     * @OrderBy({"date" = "DESC"})
     * @Groups({"read_manga"})
     */
    private $commentsMangas;

    public function __construct()
    {
        $this->genreLists = new ArrayCollection();
        $this->scoreRelationMangas = new ArrayCollection();
        $this->commentsMangas = new ArrayCollection();
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

    /**
     * @return Collection|ScoreRelationManga[]
     */
    public function getScoreRelationMangas(): Collection
    {
        return $this->scoreRelationMangas;
    }

    public function addScoreRelationManga(ScoreRelationManga $scoreRelationManga): self
    {
        if (!$this->scoreRelationMangas->contains($scoreRelationManga)) {
            $this->scoreRelationMangas[] = $scoreRelationManga;
            $scoreRelationManga->setManga($this);
        }

        return $this;
    }

    public function removeScoreRelationManga(ScoreRelationManga $scoreRelationManga): self
    {
        if ($this->scoreRelationMangas->contains($scoreRelationManga)) {
            $this->scoreRelationMangas->removeElement($scoreRelationManga);
            // set the owning side to null (unless already changed)
            if ($scoreRelationManga->getManga() === $this) {
                $scoreRelationManga->setManga(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CommentsMangas[]
     */
    public function getCommentsMangas(): Collection
    {
        return $this->commentsMangas;
    }

    public function addCommentsManga(CommentsMangas $commentsManga): self
    {
        if (!$this->commentsMangas->contains($commentsManga)) {
            $this->commentsMangas[] = $commentsManga;
            $commentsManga->setManga($this);
        }

        return $this;
    }

    public function removeCommentsManga(CommentsMangas $commentsManga): self
    {
        if ($this->commentsMangas->contains($commentsManga)) {
            $this->commentsMangas->removeElement($commentsManga);
            // set the owning side to null (unless already changed)
            if ($commentsManga->getManga() === $this) {
                $commentsManga->setManga(null);
            }
        }

        return $this;
    }
}
