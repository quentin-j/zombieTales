<?php

namespace App\Entity;

use App\Repository\ScenarioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\Column(type="text")
     */
    private $history;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $map;

    /**
     * @ORM\Column(type="integer")
     */
    private $time;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $createAt;

    /**
     * @ORM\Column(type="datetime_immutable")
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity=Objectifs::class, mappedBy="scenario")
     */
    private $objectifs;

    /**
     * @ORM\OneToMany(targetEntity=SpecialRules::class, mappedBy="scenario", orphanRemoval=true)
     */
    private $specialRules;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="Scenario")
     */
    private $comments;

    /**
     * @ORM\ManyToOne(targetEntity=Difficulty::class, inversedBy="scenarios")
     * @ORM\JoinColumn(nullable=false)
     */
    private $difficulty;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="scenarios")
     * @ORM\JoinColumn(nullable=false)
     */
    private $author;

    /**
     * @ORM\ManyToOne(targetEntity=Version::class, inversedBy="scenarios")
     * @ORM\JoinColumn(nullable=false)
     */
    private $version;

    public function __construct()
    {
        $this->objectifs = new ArrayCollection();
        $this->specialRules = new ArrayCollection();
        $this->comments = new ArrayCollection();
    }

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

    public function setHistory(string $history): self
    {
        $this->history = $history;

        return $this;
    }

    public function getMap(): ?string
    {
        return $this->map;
    }

    public function setMap(string $map): self
    {
        $this->map = $map;

        return $this;
    }

    public function getTime(): ?int
    {
        return $this->time;
    }

    public function setTime(int $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getCreateAt(): ?\DateTimeImmutable
    {
        return $this->createAt;
    }

    public function setCreateAt(\DateTimeImmutable $createAt): self
    {
        $this->createAt = $createAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection|Objectifs[]
     */
    public function getObjectifs(): Collection
    {
        return $this->objectifs;
    }

    public function addObjectif(Objectifs $objectif): self
    {
        if (!$this->objectifs->contains($objectif)) {
            $this->objectifs[] = $objectif;
            $objectif->setScenario($this);
        }

        return $this;
    }

    public function removeObjectif(Objectifs $objectif): self
    {
        if ($this->objectifs->removeElement($objectif)) {
            // set the owning side to null (unless already changed)
            if ($objectif->getScenario() === $this) {
                $objectif->setScenario(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|SpecialRules[]
     */
    public function getSpecialRules(): Collection
    {
        return $this->specialRules;
    }

    public function addSpecialRule(SpecialRules $specialRule): self
    {
        if (!$this->specialRules->contains($specialRule)) {
            $this->specialRules[] = $specialRule;
            $specialRule->setScenario($this);
        }

        return $this;
    }

    public function removeSpecialRule(SpecialRules $specialRule): self
    {
        if ($this->specialRules->removeElement($specialRule)) {
            // set the owning side to null (unless already changed)
            if ($specialRule->getScenario() === $this) {
                $specialRule->setScenario(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setScenario($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getScenario() === $this) {
                $comment->setScenario(null);
            }
        }

        return $this;
    }

    public function getDifficulty(): ?Difficulty
    {
        return $this->difficulty;
    }

    public function setDifficulty(?Difficulty $difficulty): self
    {
        $this->difficulty = $difficulty;

        return $this;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getVersion(): ?Version
    {
        return $this->version;
    }

    public function setVersion(?Version $version): self
    {
        $this->version = $version;

        return $this;
    }
}
