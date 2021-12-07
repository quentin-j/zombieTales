<?php

namespace App\Entity;

use App\Repository\VersionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VersionRepository::class)
 */
class Version
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
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Scenario::class, mappedBy="version")
     */
    private $scenarios;

    /**
     * @ORM\OneToMany(targetEntity=Addons::class, mappedBy="version", orphanRemoval=true)
     */
    private $addons;

    public function __construct()
    {
        $this->scenarios = new ArrayCollection();
        $this->addons = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Scenario[]
     */
    public function getScenarios(): Collection
    {
        return $this->scenarios;
    }

    public function addScenario(Scenario $scenario): self
    {
        if (!$this->scenarios->contains($scenario)) {
            $this->scenarios[] = $scenario;
            $scenario->setVersion($this);
        }

        return $this;
    }

    public function removeScenario(Scenario $scenario): self
    {
        if ($this->scenarios->removeElement($scenario)) {
            // set the owning side to null (unless already changed)
            if ($scenario->getVersion() === $this) {
                $scenario->setVersion(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Addons[]
     */
    public function getAddons(): Collection
    {
        return $this->addons;
    }

    public function addAddon(Addons $addon): self
    {
        if (!$this->addons->contains($addon)) {
            $this->addons[] = $addon;
            $addon->setVersion($this);
        }

        return $this;
    }

    public function removeAddon(Addons $addon): self
    {
        if ($this->addons->removeElement($addon)) {
            // set the owning side to null (unless already changed)
            if ($addon->getVersion() === $this) {
                $addon->setVersion(null);
            }
        }

        return $this;
    }
}
