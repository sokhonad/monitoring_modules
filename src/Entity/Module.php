<?php

namespace App\Entity;

use App\Repository\ModuleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModuleRepository::class)]
class Module
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\Column]
    private ?float $lastMesuredValue = null;

    #[ORM\Column]
    private ?int $NumberDataSent = null;

    #[ORM\OneToMany(mappedBy: 'module', targetEntity: Mesure::class)]
    private Collection $created_at;

    public function __construct()
    {
        $this->created_at = new ArrayCollection();
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

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getLastMesuredValue(): ?float
    {
        return $this->lastMesuredValue;
    }

    public function setLastMesuredValue(float $lastMesuredValue): self
    {
        $this->lastMesuredValue = $lastMesuredValue;

        return $this;
    }

    public function getNumberDataSent(): ?int
    {
        return $this->NumberDataSent;
    }

    public function setNumberDataSent(int $NumberDataSent): self
    {
        $this->NumberDataSent = $NumberDataSent;

        return $this;
    }

    /**
     * @return Collection<int, Mesure>
     */
    public function getCreatedAt(): Collection
    {
        return $this->created_at;
    }

    public function addCreatedAt(Mesure $createdAt): self
    {
        if (!$this->created_at->contains($createdAt)) {
            $this->created_at->add($createdAt);
            $createdAt->setModule($this);
        }

        return $this;
    }

    public function removeCreatedAt(Mesure $createdAt): self
    {
        if ($this->created_at->removeElement($createdAt)) {
            // set the owning side to null (unless already changed)
            if ($createdAt->getModule() === $this) {
                $createdAt->setModule(null);
            }
        }

        return $this;
    }
}
