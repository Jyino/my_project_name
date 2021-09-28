<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
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
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $kms;

    /**
     * @ORM\ManyToOne(targetEntity=Ville::class, inversedBy="laville")
     */
    private $lesclients;

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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getKms(): ?string
    {
        return $this->kms;
    }

    public function setKms(string $kms): self
    {
        $this->kms = $kms;

        return $this;
    }

    public function getLesclients(): ?Ville
    {
        return $this->lesclients;
    }

    public function setLesclients(?Ville $lesclients): self
    {
        $this->lesclients = $lesclients;

        return $this;
    }
}
