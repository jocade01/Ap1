<?php
namespace AEV2\Entity;
use AEV2\Repository\EmpresaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use DateTime;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\OneToMany;
use Doctrine\Common\Collections\Collection;

#[Entity(repositoryClass: EmpresaRepository::class)]
#[Table(name: 'pedido')]
Class Delivery
{
    #[Id]
    #[Column(name: "pedido_num", type: 'smallint', length: 4)]
    private int $pedidoNum;

    #[Column(name: "pedido_fecha", type: 'date')]
    private DateTime $pedidoFecha;

    #[Column(name: "pedido_tipo", type: 'string', length: 1)]
    private ?string $pedidoTipo = null;

    #[ManyToOne(targetEntity: Client::class, inversedBy: "pedido")]
    #[JoinColumn(name: "cliente_cod", referencedColumnName: "cliente_cod")]
    private Client $cliente;

    #[Column(name: "fecha_envio", type: 'date')]
    private DateTime $fechaEnvio;

    #[Column(name: "total", type: 'decimal')]
    private float $total;

    #[OneToMany(mappedBy: "pedido", targetEntity: Detail::class)]
    private Collection $detalle;

    public function __construct()
    {

        $this->detalle = new ArrayCollection();
    }

    public function getPedidoNum(): int
    {
        return $this->pedidoNum;
    }

    public function setPedidoNum(int $pedidoNum): void
    {
        $this->pedidoNum = $pedidoNum;
    }

    public function getPedidoFecha(): DateTime
    {
        return $this->pedidoFecha;
    }

    public function setPedidoFecha(DateTime $pedidoFecha): void
    {
        $this->pedidoFecha = $pedidoFecha;
    }

    public function getPedidoTipo(): ?string
    {
        return $this->pedidoTipo;
    }

    public function setPedidoTipo(string $pedidoTipo): void
    {
        $this->pedidoTipo = $pedidoTipo;
    }

    public function getCliente(): Client
    {
        return $this->cliente;
    }

    public function setCliente(Client $cliente): void
    {
        $this->clienteCod = $cliente;
    }

    public function getFechaEnvio(): DateTime
    {
        return $this->fechaEnvio;
    }

    public function setFechaEnvio(DateTime $fechaEnvio): void
    {
        $this->fechaEnvio = $fechaEnvio;
    }

    public function getTotal(): float
    {
        return $this->total;
    }

    public function setTotal(float $total): void
    {
        $this->total = $total;
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
