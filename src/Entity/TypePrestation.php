<?php

namespace App\Entity;

use App\Repository\TypePrestationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypePrestationRepository::class)
 */
class TypePrestation
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
    private $Prestation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $relation;

    /**
     * @ORM\ManyToMany(targetEntity=Prestation::class, inversedBy="leTypePrestation")
     */
    private $nom2;

    public function __construct()
    {
        $this->nom2 = new ArrayCollection();
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

    public function getPrestation(): ?string
    {
        return $this->Prestation;
    }

    public function setPrestation(string $Prestation): self
    {
        $this->Prestation = $Prestation;

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
     * @return Collection|Prestation[]
     */
    public function getNom2(): Collection
    {
        return $this->nom2;
    }

    public function addNom2(Prestation $nom2): self
    {
        if (!$this->nom2->contains($nom2)) {
            $this->nom2[] = $nom2;
        }

        return $this;
    }

    public function removeNom2(Prestation $nom2): self
    {
        $this->nom2->removeElement($nom2);

        return $this;
    }
}
