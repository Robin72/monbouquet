<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SaisonRepository")
 */
class Saison
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="integer")
     */
    private $mois_debut;

    /**
     * @ORM\Column(type="integer")
     */
    private $mois_fin;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Fleur", mappedBy="saisons")
     */
    private $fleurs;

    public function __construct()
    {
        $this->fleurs = new ArrayCollection();
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

    public function getMoisDebut(): ?int
    {
        return $this->mois_debut;
    }

    public function setMoisDebut(int $mois_debut): self
    {
        $this->mois_debut = $mois_debut;

        return $this;
    }

    public function getMoisFin(): ?int
    {
        return $this->mois_fin;
    }

    public function setMoisFin(int $mois_fin): self
    {
        $this->mois_fin = $mois_fin;

        return $this;
    }

    /**
     * @return Collection|Fleur[]
     */
    public function getFleurs(): Collection
    {
        return $this->fleurs;
    }

    public function addFleur(Fleur $fleur): self
    {
        if (!$this->fleurs->contains($fleur)) {
            $this->fleurs[] = $fleur;
            $fleur->addSaison($this);
        }

        return $this;
    }

    public function removeFleur(Fleur $fleur): self
    {
        if ($this->fleurs->contains($fleur)) {
            $this->fleurs->removeElement($fleur);
            $fleur->removeSaison($this);
        }

        return $this;
    }
}
