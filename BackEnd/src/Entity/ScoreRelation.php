<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"read"},"enable_max_depth"="true"},
 *     denormalizationContext={"groups"={"write"}}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\ScoreRelationRepository")
 */
class ScoreRelation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="scoreRelations")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"read", "write"})
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Anime", inversedBy="scoreRelations")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"read", "write"})
     */
    private $anime;

    /**
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"read", "write"})
     */
    private $score;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups({"read", "write"})
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

    public function getAnime(): ?Anime
    {
        return $this->anime;
    }

    public function setAnime(?Anime $anime): self
    {
        $this->anime = $anime;

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
