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

#[Entity(repositoryClass: EmpresaRepository::class)]
#[Table(name: 'detalle')]
class Detail
{

    #[Id]
    #[ManyToOne(targetEntity: Delivery::class, inversedBy: "detalle")]
    #[JoinColumn(name: "pedido_num", referencedColumnName: 'pedido_num')]
    private Delivery $pedido;

    #[Id]
    #[Column(name: "detalle_num", type: 'smallint', length: 4)]
    private int $detalleNum;

    #[ManyToOne(targetEntity: Product::class, inversedBy: "detalle")]
    #[JoinColumn(name: "prod_num", referencedColumnName: 'prod_num')]
    private Product $producto;

    #[Column(name: "precio_venta", type: "decimal", precision: 8, scale: 2)]
    private float $precioVenta;

    #[Column(name: "cantidad", type: 'integer', length: 8)]
    private int $cantidad;

    #[Column(name: "importe", type: 'decimal', precision: 8, scale: 2)]
    private float $importe;

    public function getPedido(): Delivery
    {
        return $this->pedido;
    }

    public function setPedido(Delivery $pedido): void
    {
        $this->pedido = $pedido;
    }

    public function getDetalleNum(): int
    {
        return $this->detalleNum;
    }

    public function setDetalleNum(int $detalleNum): void
    {
        $this->detalleNum = $detalleNum;
    }

    public function getProducto(): Product
    {
        return $this->producto;
    }

    public function setProducto(Product $producto): void
    {
        $this->producto = $producto;
    }

    public function getPrecioVenta(): float
    {
        return $this->precioVenta;
    }

    public function setPrecioVenta(float $precioVenta): void
    {
        $this->precioVenta = $precioVenta;
    }

    public function getCantidad(): int
    {
        return $this->cantidad;
    }

    public function setCantidad(int $cantidad): void
    {
        $this->cantidad = $cantidad;
    }

    public function getImporte(): float
    {
        return $this->importe;
    }

    public function setImporte(float $importe): void
    {
        $this->importe = $importe;
    }

}