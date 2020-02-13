<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"read_manga"}},
 *     denormalizationContext={"groups"={"write_manga"}}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\ScoreRelationMangaRepository")
 */
class ScoreRelationManga
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"read_manga", "write_manga"})
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="scoreRelationMangas")
     * @Groups({"read_manga", "write_manga"})
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Manga", inversedBy="scoreRelationMangas")
     * @Groups({"read_manga", "write_manga"})
     */
    private $manga;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"read_manga", "write_manga"})
     */
    private $score;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"read_manga", "write_manga"})
     */
    private $status;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getManga(): ?Manga
    {
        return $this->manga;
    }

    public function setManga(?Manga $manga): self
    {
        $this->manga = $manga;

        return $this;
    }

    public function getScore(): ?float
    {
        return $this->score;
    }

    public function setScore(?float $score): self
    {
        $this->score = $score;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }
}
