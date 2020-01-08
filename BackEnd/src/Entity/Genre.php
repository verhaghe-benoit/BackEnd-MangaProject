<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;

/**
 * @ApiResource()
 * @ApiFilter(SearchFilter::class, properties={"id_anime": "exact"})
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

    public function getIdGenreList(): ?GenreList
    {
        return $this->id_genreList;
    }

    public function setIdGenreList(?GenreList $id_genreList): self
    {
        $this->id_genreList = $id_genreList;

        return $this;
    }
}
