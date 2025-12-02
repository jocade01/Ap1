<?php
namespace AP51\Views;

Class PedidoView{
    public function __construct(array $pedidos){
        echo "<table border='1'>";
        echo "<tr><td>Pedido_num</td><td>Pedido_fecha</td><td>Pedido_tipo</td><td>Cliente_cod</td><td>Fecha_envio</td><td>Total</td><td></td></tr>";

        foreach ($pedidos as $pedido){
            echo "<tr>";
            echo "<td>" . $pedido->getPedidoNum() . "</td>";
            echo "<td>" . $pedido->getPedidoFecha()->format('Y-m-d H:i:s') . "</td>";
            echo "<td>" . $pedido->getPedidoTipo() . "</td>";
            echo "<td>" . $pedido->getCliente()->getClienteCod() . "</td>";
            echo "<td>" . $pedido->getFechaEnvio()->format('Y-m-d H:i:s') . "</td>";
            echo "<td>" . $pedido->getTotal() . "</td>";
            echo "<td><a href='/pedido/read/" . $pedido->getPedidoNum() . "'>Ver detalles</a>";
            echo "</tr>";
        }
    }
}