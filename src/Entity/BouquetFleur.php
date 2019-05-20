<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BouquetFleurRepository")
 */
class BouquetFleur
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbFleur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Fleur", inversedBy="bouquetFleurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fleur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Bouquet", inversedBy="bouquetFleurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $bouquet;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbFleur(): ?int
    {
        return $this->nbFleur;
    }

    public function setNbFleur(int $nbFleur): self
    {
        $this->nbFleur = $nbFleur;

        return $this;
    }

    public function getFleur(): ?Fleur
    {
        return $this->fleur;
    }

    public function setFleur(?Fleur $fleur): self
    {
        $this->fleur = $fleur;

        return $this;
    }

    public function getBouquet(): ?Bouquet
    {
        return $this->bouquet;
    }

    public function setBouquet(?Bouquet $bouquet): self
    {
        $this->bouquet = $bouquet;

        return $this;
    }
}
