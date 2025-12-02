<?php

namespace AEV2\Views;

class ProductoView
{
    public function __construct(array $productos)
    {
        echo "<a href='/.'>VOLVER</a>";

        echo "<table border='1'>";
        echo "<p><a href='/producto/create'>Crear Producto</a>";

        echo "<tr><td>Prod_num</td><td>Descripcion</td><td></td></tr>";

        foreach ($productos as $producto) {

                echo "<tr>";
                echo "<td>" . $producto->getProdNum() . "</td>";
                echo "<td>" . $producto->getDescripcion() . "</td>";
            echo "<td>";
            foreach ($producto->getDetalle() as $detail) {

                echo htmlspecialchars($detail->getPedido()->getPedidoNum()) ."' '";
            }
            echo "</td>";
                echo "<td><a href='/producto/update/" . $producto->getProdNum() . "'>Actualizar</a></td>";
                echo "<td><a href='/producto/delete/" . $producto->getProdNum() . "'>Borrar</a></td>";


        }
    }
}
