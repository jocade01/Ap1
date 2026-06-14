<?php

namespace App\Entity;

use App\Repository\SillaRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SillaRepository::class)]
class Silla
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $madera = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $metal = null;

    #[ORM\ManyToOne(inversedBy: 'chair')]
    private ?Mesa $tab = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMadera(): ?string
    {
        return $this->madera;
    }

    public function setMadera(?string $madera): static
    {
        $this->madera = $madera;

        return $this;
    }

    public function getMetal(): ?string
    {
        return $this->metal;
    }

    public function setMetal(?string $metal): static
    {
        $this->metal = $metal;

        return $this;
    }

    public function getTab(): ?Mesa
    {
        return $this->tab;
    }

    public function setTab(?Mesa $tab): static
    {
        $this->tab = $tab;

        return $this;
    }
}
