<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\FleurRepository")
 */
class Fleur
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
     * @ORM\Column(type="string", length=255)
     */
    private $photo;

    /**
     * @ORM\Column(type="decimal", precision=4, scale=2)
     */
    private $prix;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Saison", inversedBy="fleurs")
     */
    private $saisons;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Evenement", inversedBy="fleurs")
     */
    private $evenements;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Couleur", inversedBy="fleurs")
     */
    private $couleurs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\BouquetFleur", mappedBy="fleur")
     */
    private $bouquetFleurs;

    public function __construct()
    {
        $this->saisons = new ArrayCollection();
        $this->evenements = new ArrayCollection();
        $this->couleurs = new ArrayCollection();
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

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function getPrix()
    {
        return $this->prix;
    }

    public function setPrix($prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection|Saison[]
     */
    public function getSaisons(): Collection
    {
        return $this->saisons;
    }

    public function addSaison(Saison $saison): self
    {
        if (!$this->saisons->contains($saison)) {
            $this->saisons[] = $saison;
        }

        return $this;
    }

    public function removeSaison(Saison $saison): self
    {
        if ($this->saisons->contains($saison)) {
            $this->saisons->removeElement($saison);
        }

        return $this;
    }

    /**
     * @return Collection|Evenement[]
     */
    public function getEvenements(): Collection
    {
        return $this->evenements;
    }

    public function addEvenement(Evenement $evenement): self
    {
        if (!$this->evenements->contains($evenement)) {
            $this->evenements[] = $evenement;
        }

        return $this;
    }

    public function removeEvenement(Evenement $evenement): self
    {
        if ($this->evenements->contains($evenement)) {
            $this->evenements->removeElement($evenement);
        }

        return $this;
    }

    /**
     * @return Collection|Couleur[]
     */
    public function getCouleurs(): Collection
    {
        return $this->couleurs;
    }

    public function addCouleur(Couleur $couleur): self
    {
        if (!$this->couleurs->contains($couleur)) {
            $this->couleurs[] = $couleur;
        }

        return $this;
    }

    public function removeCouleur(Couleur $couleur): self
    {
        if ($this->couleurs->contains($couleur)) {
            $this->couleurs->removeElement($couleur);
        }

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
            $bouquetFleur->setFleur($this);
        }

        return $this;
    }

    public function removeBouquetFleur(BouquetFleur $bouquetFleur): self
    {
        if ($this->bouquetFleurs->contains($bouquetFleur)) {
            $this->bouquetFleurs->removeElement($bouquetFleur);
            // set the owning side to null (unless already changed)
            if ($bouquetFleur->getFleur() === $this) {
                $bouquetFleur->setFleur(null);
            }
        }

        return $this;
    }
}
