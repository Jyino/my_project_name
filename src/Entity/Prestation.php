<?php

namespace App\Entity;

use App\Repository\PrestationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PrestationRepository::class)
 */
class Prestation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Visite::class, inversedBy="lesPrestations")
     */
    private $nom;

    /**
     * @ORM\ManyToMany(targetEntity=TypePrestation::class, mappedBy="nom2")
     */
    private $leTypePrestation;

    public function __construct()
    {
        $this->leTypePrestation = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?Visite
    {
        return $this->nom;
    }

    public function setNom(?Visite $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * @return Collection|TypePrestation[]
     */
    public function getLeTypePrestation(): Collection
    {
        return $this->leTypePrestation;
    }

    public function addLeTypePrestation(TypePrestation $leTypePrestation): self
    {
        if (!$this->leTypePrestation->contains($leTypePrestation)) {
            $this->leTypePrestation[] = $leTypePrestation;
            $leTypePrestation->addNom2($this);
        }

        return $this;
    }

    public function removeLeTypePrestation(TypePrestation $leTypePrestation): self
    {
        if ($this->leTypePrestation->removeElement($leTypePrestation)) {
            $leTypePrestation->removeNom2($this);
        }

        return $this;
    }
}
