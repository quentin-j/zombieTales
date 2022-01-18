<?php

namespace App\Entity;

use App\Repository\ScenarioRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ScenarioRepository::class)
 */
class Scenario
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
    private $title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $history;

    /**
     * @ORM\Column(type="integer")
     */
    private $Nb_survivor;

    /**
     * @ORM\Column(type="integer")
     */
    private $Time;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Publish_at;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $Updat_at;

    /**
     * @ORM\ManyToOne(targetEntity=Difficulty::class, inversedBy="scenarios")
     * @ORM\JoinColumn(nullable=false)
     */
    private $difficultyId;

    /**
     * @ORM\ManyToOne(targetEntity=Version::class, inversedBy="scenarios")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Version;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="scenarios")
     * @ORM\JoinColumn(nullable=false)
     */
    private $User;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getHistory(): ?string
    {
        return $this->history;
    }

    public function setHistory(?string $history): self
    {
        $this->history = $history;

        return $this;
    }

    public function getNbSurvivor(): ?int
    {
        return $this->Nb_survivor;
    }

    public function setNbSurvivor(int $Nb_survivor): self
    {
        $this->Nb_survivor = $Nb_survivor;

        return $this;
    }

    public function getTime(): ?int
    {
        return $this->Time;
    }

    public function setTime(int $Time): self
    {
        $this->Time = $Time;

        return $this;
    }

    public function getPublishAt(): ?\DateTimeInterface
    {
        return $this->Publish_at;
    }

    public function setPublishAt(\DateTimeInterface $Publish_at): self
    {
        $this->Publish_at = $Publish_at;

        return $this;
    }

    public function getUpdatAt(): ?\DateTimeInterface
    {
        return $this->Updat_at;
    }

    public function setUpdatAt(?\DateTimeInterface $Updat_at): self
    {
        $this->Updat_at = $Updat_at;

        return $this;
    }

    public function getDifficultyId(): ?Difficulty
    {
        return $this->difficultyId;
    }

    public function setDifficultyId(?Difficulty $difficultyId): self
    {
        $this->difficultyId = $difficultyId;

        return $this;
    }

    public function getVersion(): ?Version
    {
        return $this->Version;
    }

    public function setVersion(?Version $Version): self
    {
        $this->Version = $Version;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }
}
