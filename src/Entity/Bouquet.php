<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BouquetRepository")
 */
class Bouquet
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
     * @ORM\Column(type="datetime")
     */
    private $date_creation;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="bouquets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisateur;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BouquetFleur", mappedBy="bouquet")
     */
    private $bouquetFleurs;

    public function __construct()
    {
        $this->bouquetFleurs = new ArrayCollection();
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

    public function getDateCreation(): ?\DateTimeInterface
    {
        return $this->date_creation;
    }

    public function setDateCreation(\DateTimeInterface $date_creation): self
    {
        $this->date_creation = $date_creation;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * @return Collection|BouquetFleur[]
     */
    public function getBouquetFleurs(): Collection
    {
        return $this->bouquetFleurs;
    }

    public function addBouquetFleur(BouquetFleur $bouquetFleur): self
    {
        if (!$this->bouquetFleurs->contains($bouquetFleur)) {
            $this->bouquetFleurs[] = $bouquetFleur;
            $bouquetFleur->setBouquet($this);
        }

        return $this;
    }

    public function removeBouquetFleur(BouquetFleur $bouquetFleur): self
    {
        if ($this->bouquetFleurs->contains($bouquetFleur)) {
            $this->bouquetFleurs->removeElement($bouquetFleur);
            // set the owning side to null (unless already changed)
            if ($bouquetFleur->getBouquet() === $this) {
                $bouquetFleur->setBouquet(null);
            }
        }

        return $this;
    }
}
