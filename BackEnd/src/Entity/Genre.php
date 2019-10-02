<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GenreRepository")
 */
class Genre
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Anime", inversedBy="genres")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_anime;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\GenreList")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_genre;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdAnime(): ?Anime
    {
        return $this->id_anime;
    }

    public function setIdAnime(?Anime $id_anime): self
    {
        $this->id_anime = $id_anime;

        return $this;
    }

    public function getIdGenre(): ?GenreList
    {
        return $this->id_genre;
    }

    public function setIdGenre(?GenreList $id_genre): self
    {
        $this->id_genre = $id_genre;

        return $this;
    }
}
