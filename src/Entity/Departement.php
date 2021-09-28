<?php

namespace App\Entity;

use App\Repository\DepartementRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DepartementRepository::class)
 */
class Departement
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
     * @ORM\OneToMany(targetEntity=Ville::class, mappedBy="lesvilles")
     */
    private $ledepartement;

    public function __construct()
    {
        $this->ledepartement = new ArrayCollection();
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

    /**
     * @return Collection|Ville[]
     */
    public function getLedepartement(): Collection
    {
        return $this->ledepartement;
    }

    public function addLedepartement(Ville $ledepartement): self
    {
        if (!$this->ledepartement->contains($ledepartement)) {
            $this->ledepartement[] = $ledepartement;
            $ledepartement->setLesvilles($this);
        }

        return $this;
    }

    public function removeLedepartement(Ville $ledepartement): self
    {
        if ($this->ledepartement->removeElement($ledepartement)) {
            // set the owning side to null (unless already changed)
            if ($ledepartement->getLesvilles() === $this) {
                $ledepartement->setLesvilles(null);
            }
        }

        return $this;
    }
}
