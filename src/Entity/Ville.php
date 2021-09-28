<?php

namespace App\Entity;

use App\Repository\VilleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VilleRepository::class)
 */
class Ville
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $relation;

    /**
     * @ORM\OneToMany(targetEntity=Client::class, mappedBy="lesclients")
     */
    private $laville;

    /**
     * @ORM\ManyToOne(targetEntity=Departement::class, inversedBy="ledepartement")
     */
    private $lesvilles;

    public function __construct()
    {
        $this->laville = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getRelation(): ?string
    {
        return $this->relation;
    }

    public function setRelation(string $relation): self
    {
        $this->relation = $relation;

        return $this;
    }

    /**
     * @return Collection|Client[]
     */
    public function getLaville(): Collection
    {
        return $this->laville;
    }

    public function addLaville(Client $laville): self
    {
        if (!$this->laville->contains($laville)) {
            $this->laville[] = $laville;
            $laville->setLesclients($this);
        }

        return $this;
    }

    public function removeLaville(Client $laville): self
    {
        if ($this->laville->removeElement($laville)) {
            // set the owning side to null (unless already changed)
            if ($laville->getLesclients() === $this) {
                $laville->setLesclients(null);
            }
        }

        return $this;
    }

    public function getLesvilles(): ?Departement
    {
        return $this->lesvilles;
    }

    public function setLesvilles(?Departement $lesvilles): self
    {
        $this->lesvilles = $lesvilles;

        return $this;
    }
}
