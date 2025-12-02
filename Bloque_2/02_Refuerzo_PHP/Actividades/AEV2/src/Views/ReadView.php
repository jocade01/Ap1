<?php

namespace AEV2\Views;

class ReadView
{
    public function __construct(array $detalles)
    {
        echo "<a href='/pedidos'>VOLVER</a>";

        echo "<table border='1'>";
        echo "<tr><td>Pedido_num</td><td>Detalle_num</td><td>Prod_num</td><td>Precio_venta</td><td>Cantidad</td><td>Importe</td>";

        foreach ($detalles as $detalle) {
            echo "<tr>";
            echo "<td>" . $detalle->getPedido()->getPedidoNum() . "</td>";
            echo "<td>" . $detalle->getDetalleNum() . "</td>";
            echo "<td>" . $detalle->getProducto()->getProdNum() . "</td>";
            echo "<td>" . $detalle->getPrecioVenta() . "</td>";
            echo "<td>" . $detalle->getCantidad() . "</td>";
            echo "<td>" . $detalle->getImporte() . "</td>";
        }

    }
}