<?php

namespace App\Entity;

use App\Repository\MesaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MesaRepository::class)]
class Mesa
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $material = null;

    #[ORM\Column]
    private ?int $altura = null;

    /**
     * @var Collection<int, Silla>
     */
    #[ORM\OneToMany(targetEntity: Silla::class, mappedBy: 'tab')]
    private Collection $chair;

    public function __construct()
    {
        $this->chair = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMaterial(): ?string
    {
        return $this->material;
    }

    public function setMaterial(string $material): static
    {
        $this->material = $material;

        return $this;
    }

    public function getAltura(): ?int
    {
        return $this->altura;
    }

    public function setAltura(int $altura): static
    {
        $this->altura = $altura;

        return $this;
    }

    /**
     * @return Collection<int, Silla>
     */
    public function getChair(): Collection
    {
        return $this->chair;
    }

    public function addChair(Silla $chair): static
    {
        if (!$this->chair->contains($chair)) {
            $this->chair->add($chair);
            $chair->setTab($this);
        }

        return $this;
    }

    public function removeChair(Silla $chair): static
    {
        if ($this->chair->removeElement($chair)) {
            // set the owning side to null (unless already changed)
            if ($chair->getTab() === $this) {
                $chair->setTab(null);
            }
        }

        return $this;
    }
}
