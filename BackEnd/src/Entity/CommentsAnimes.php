<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;

/**
 * @ApiResource(
 *     normalizationContext={"groups"={"read"},"enable_max_depth"="true"},
 *     denormalizationContext={"groups"={"write"},"enable_max_depth"="true"}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\CommentsAnimesRepository")
 */
class CommentsAnimes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Anime", inversedBy="commentsAnimes")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"read", "write"})
     * @MaxDepth(1)
     */
    private $anime;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="commentsAnimes")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"read", "write"})
     * @MaxDepth(1)
     */
    private $user;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"read", "write"})
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=5000)
     * @Groups({"read", "write"})
     */
    private $comment;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getComment(): ?string
    {
        return $this->comment;
    }

    public function setComment(string $comment): self
    {
        $this->comment = $comment;

        return $this;
    }
}
