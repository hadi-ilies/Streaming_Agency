<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EpisodesRepository")
 */
class Episodes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $synopsis;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Video;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Saisons", inversedBy="Episodes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $saisons;

    public function getId()
    {
        return $this->id;
    }

    public function getSynopsis(): ?string
    {
        return $this->synopsis;
    }

    public function setSynopsis(string $synopsis): self
    {
        $this->synopsis = $synopsis;

        return $this;
    }

    public function getVideo(): ?string
    {
        return $this->Video;
    }

    public function setVideo(string $Video): self
    {
        $this->Video = $Video;

        return $this;
    }

    public function getSaisons(): ?Saisons
    {
        return $this->saisons;
    }

    public function setSaisons(?Saisons $saisons): self
    {
        $this->saisons = $saisons;

        return $this;
    }
}
