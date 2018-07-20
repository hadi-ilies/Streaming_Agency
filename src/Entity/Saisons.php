<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SaisonsRepository")
 */
class Saisons
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
    private $nb_saison;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\AnimesAndSeries", inversedBy="Saisons")
     * @ORM\JoinColumn(nullable=false)
     */
    private $animesAndSeries;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Episodes", mappedBy="saisons")
     */
    private $Episodes;

    public function __construct()
    {
        $this->Episodes = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNbSaison(): ?string
    {
        return $this->nb_saison;
    }

    public function setNbSaison(?string $nb_saison): self
    {
        $this->nb_saison = $nb_saison;

        return $this;
    }

    public function getAnimesAndSeries(): ?AnimesAndSeries
    {
        return $this->animesAndSeries;
    }

    public function setAnimesAndSeries(?AnimesAndSeries $animesAndSeries): self
    {
        $this->animesAndSeries = $getEpisodesanimesAndSeries;

        return $this;
    }

    /**
     * @return Collection|Episodes[]
     */
    public function getEpisodes(): Collection
    {
        return $this->Episodes;
    }

    public function addEpisode(Episodes $episode): self
    {
        if (!$this->Episodes->contains($episode)) {
            $this->Episodes[] = $episode;
            $episode->setSaisons($this);
        }

        return $this;
    }

    public function removeEpisode(Episodes $episode): self
    {
        if ($this->Episodes->contains($episode)) {
            $this->Episodes->removeElement($episode);
            // set the owning side to null (unless already changed)
            if ($episode->getSaisons() === $this) {
                $episode->setSaisons(null);
            }
        }

        return $this;
    }
}
