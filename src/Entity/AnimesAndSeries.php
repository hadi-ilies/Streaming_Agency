<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AnimesAndSeriesRepository")
 */
class AnimesAndSeries
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
    private $Title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Image;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $CreatedAt;

    /**
     * @ORM\Column(type="text")
     */
    private $Synopsis;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Saisons", mappedBy="animesAndSeries", orphanRemoval=true)
     */
    private $Saisons;

    public function __construct()
    {
        $this->Saisons = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->Title;
    }

    public function setTitle(string $Title): self
    {
        $this->Title = $Title;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(?string $Image): self
    {
        $this->Image = $Image;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->CreatedAt;
    }

    public function setCreatedAt(?\DateTimeInterface $CreatedAt): self
    {
        $this->CreatedAt = $CreatedAt;

        return $this;
    }

    public function getSynopsis(): ?string
    {
        return $this->Synopsis;
    }

    public function setSynopsis(string $Synopsis): self
    {
        $this->Synopsis = $Synopsis;

        return $this;
    }

    /**
     * @return Collection|Saisons[]
     */
    public function getSaisons(): Collection
    {
        return $this->Saisons;
    }

    public function addSaison(Saisons $saison): self
    {
        if (!$this->Saisons->contains($saison)) {
            $this->Saisons[] = $saison;
            $saison->setAnimesAndSeries($this);
        }

        return $this;
    }

    public function removeSaison(Saisons $saison): self
    {
        if ($this->Saisons->contains($saison)) {
            $this->Saisons->removeElement($saison);
            // set the owning side to null (unless already changed)
            if ($saison->getAnimesAndSeries() === $this) {
                $saison->setAnimesAndSeries(null);
            }
        }

        return $this;
    }
}
