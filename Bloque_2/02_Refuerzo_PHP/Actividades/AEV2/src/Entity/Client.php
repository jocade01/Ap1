<?php
namespace AEV2\Entity;
use AEV2\Repository\EmpresaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;



#[Entity(repositoryClass: EmpresaRepository::class)]
#[Table(name: 'cliente')]
class Client{
#[Id]
#[Column(name: "cliente_cod", type: 'integer', length: 6)]
private int $clienteCod;

#[Column(name: "nombre", type: 'string', length: 45)]
private string $name;

#[Column(name: "direc", type: 'string', length: 40)]
private string $direccion;

#[Column(name: "ciudad", type: 'string', length: 30)]
private string $ciudad;

#[Column(name: "estado", type: 'string', length: 2)]
private string $estado;

#[Column(name: "cod_postal", type: 'string', length: 9)]
private string $codPostal;

#[Column(name: "area", type: 'smallint', length: 3)]
private int $area;

#[Column(name: "telefono", type: 'string', length: 9)]
private string $telefono;

#[ManyToOne(targetEntity: Emp::class, inversedBy: "client")]
#[JoinColumn(name: "repr_cod", referencedColumnName: "emp_no")]
private ?Emp $emp = null;


#[Column(name: "limite_credito", type: 'decimal')]
private float $limiteCredito;

#[Column(name: "observaciones", type: 'text')]
private string $observaciones;

#[OneToMany(mappedBy: "cliente", targetEntity: Delivery::class)]
private Collection $pedido;

public function __construct(){
    $this->pedido = new ArrayCollection();
}

    public function getClienteCod(): int
    {
        return $this->clienteCod;
    }

    public function setClienteCod(int $clienteCod): void
    {
        $this->clienteCod = $clienteCod;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getDireccion(): string
    {
        return $this->direccion;
    }

    public function setDireccion(string $direccion): void
    {
        $this->direccion = $direccion;
    }

    public function getCiudad(): string
    {
        return $this->ciudad;
    }

    public function setCiudad(string $ciudad): void
    {
        $this->ciudad = $ciudad;
    }

    public function getEstado(): string
    {
        return $this->estado;
    }

    public function setEstado(string $estado): void
    {
        $this->estado = $estado;
    }

    public function getCodPostal(): string
    {
        return $this->codPostal;
    }

    public function setCodPostal(string $codPostal): void
    {
        $this->codPostal = $codPostal;
    }

    public function getArea(): int
    {
        return $this->area;
    }

    public function setArea(int $area): void
    {
        $this->area = $area;
    }

    public function getTelefono(): string
    {
        return $this->telefono;
    }

    public function setTelefono(string $telefono): void
    {
        $this->telefono = $telefono;
    }

    public function getEmp(): ?Emp
    {
        return $this->emp;
    }

    public function setEmp(emp $emp): void
    {
        $this->emp = $emp;
    }

    public function getLimiteCredito(): float
    {
        return $this->limiteCredito;
    }

    public function setLimiteCredito(float $limiteCredito): void
    {
        $this->limiteCredito = $limiteCredito;
    }

    public function getObservaciones(): string
    {
        return $this->observaciones;
    }

    public function setObservaciones(string $observaciones): void
    {
        $this->observaciones = $observaciones;
    }

    public function getPedido(): Collection
    {
        return $this->pedido;
    }

    public function setPedido(Collection $pedido): void
    {
        $this->pedido = $pedido;
    }


}