<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Security\Core\User\UserInterface;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\MaxDepth;

/**
 ** @ApiResource(
 *     normalizationContext={"groups"={"read_user","read"},"enable_max_depth"="true"},
 *     denormalizationContext={"groups"={"write_user"}}
 * )
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ApiFilter(SearchFilter::class, properties={"email": "exact","username":"exact"})
 */
class User implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Groups({"read_user", "write_user"})
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     * @Groups({"read_user", "write_user"})
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min="8",minMessage="Your password should be atleast 8 characters long.")
     * @Assert\EqualTo(propertyPath="confirm_password", message="Your password should the same as the confirmed one.")
     * @Groups({"read_user", "write_user"})
     */
    private $password;

    /**
     * @Assert\EqualTo(propertyPath="password")
     */
    private $confirm_password;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\ScoreRelation", mappedBy="user")
     * @Groups({"read", "write"})
     * @MaxDepth(1)
     */
    private $scoreRelations;


    public function __construct()
    {
        $this->animes = new ArrayCollection();
        $this->scoreRelations = new ArrayCollection();
    }

    public function getRoles(){
        return [
            'ROLE_USER'
        ];
    }

    public function getSalt(){

    }

    public function eraseCredentials(){
        
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getConfirmPassword(): ?string
    {
        return $this->confirm_password;
    }

    public function setConfirmPassword(string $confirm_password): self
    {
        $this->confirm_password = $confirm_password;

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
            $scoreRelation->setUser($this);
        }

        return $this;
    }

    public function removeScoreRelation(ScoreRelation $scoreRelation): self
    {
        if ($this->scoreRelations->contains($scoreRelation)) {
            $this->scoreRelations->removeElement($scoreRelation);
            // set the owning side to null (unless already changed)
            if ($scoreRelation->getUser() === $this) {
                $scoreRelation->setUser(null);
            }
        }

        return $this;
    }
}
