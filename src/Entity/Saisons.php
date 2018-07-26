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
     * @ORM\Column(type="array", nullable=true)
     */
    private $Episodes;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\AnimeAndSeries", inversedBy="saison")
     * @ORM\JoinColumn(nullable=false)
     */
    private $animeAndSeries;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nb_episode;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nb_saison;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CommentEpisodes", mappedBy="saison", orphanRemoval=true)
     */
    private $commentEpisodes;

    public function __construct()
    {
        $this->commentEpisodes = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEpisodes(): ?array
    {
        return $this->Episodes;
    }

    public function setEpisodes(?array $Episodes): self
    {
        $this->Episodes = $Episodes;

        return $this;
    }

    public function getAnimeAndSeries(): ?AnimeAndSeries
    {
        return $this->animeAndSeries;
    }

    public function setAnimeAndSeries(?AnimeAndSeries $animeAndSeries): self
    {
        $this->animeAndSeries = $animeAndSeries;

        return $this;
    }

    public function getNbEpisode(): ?int
    {
        return $this->nb_episode;
    }

    public function setNbEpisode(?int $nb_episode): self
    {
        $this->nb_episode = $nb_episode;

        return $this;
    }

    public function getNbSaison(): ?int
    {
        return $this->nb_saison;
    }

    public function setNbSaison(?int $nb_saison): self
    {
        $this->nb_saison = $nb_saison;

        return $this;
    }

    /**
     * @return Collection|CommentEpisodes[]
     */
    public function getCommentEpisodes(): Collection
    {
        return $this->commentEpisodes;
    }

    public function addCommentEpisode(CommentEpisodes $commentEpisode): self
    {
        if (!$this->commentEpisodes->contains($commentEpisode)) {
            $this->commentEpisodes[] = $commentEpisode;
            $commentEpisode->setSaison($this);
        }

        return $this;
    }

    public function removeCommentEpisode(CommentEpisodes $commentEpisode): self
    {
        if ($this->commentEpisodes->contains($commentEpisode)) {
            $this->commentEpisodes->removeElement($commentEpisode);
            // set the owning side to null (unless already changed)
            if ($commentEpisode->getSaison() === $this) {
                $commentEpisode->setSaison(null);
            }
        }

        return $this;
    }
}
