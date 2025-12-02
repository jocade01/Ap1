<?php

namespace AP51\Entity;

use AP51\Repository\TaskRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use DateTime;

#[Entity(repositoryClass: TaskRepository::class)]
#[Table(name: 'producto')]
class Product
{

    #[Id]
    #[Column(name: "prod_num", type: 'integer', length: 6)]
    private int $prodNum;

    #[Column(name: "descripcion", type: 'string', length: 30)]
    private string $descripcion;

    #[OneToMany(mappedBy: "producto", targetEntity: Detail::class)]
    private Collection $detalle;

    public function __construct()
    {
        $this->detalle = new ArrayCollection();

    }

    public function getProdNum(): int
    {
        return $this->prodNum;
    }

    public function setProdNum(int $prodNum): void
    {
        $this->prodNum = $prodNum;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    public function getDetalle(): Collection
    {
        return $this->detalle;
    }

    public function setDetalle(Collection $detalle): void
    {
        $this->detalle = $detalle;
    }

}



