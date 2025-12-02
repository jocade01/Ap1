<?php

namespace AP51\Views;

class ProductoView
{
    public function __construct(array $productos)
    {
        echo "<table border='1'>";
        echo "<p><a href='/producto/create'>Crear Producto</a>";

        echo "<tr><td>Prod_num</td><td>Descripcion</td>";

        foreach ($productos as $producto) {
            echo "<tr>";
            echo "<td>" . $producto->getProdNum();
            echo "<td>" . $producto->getDescripcion();
        }
    }
}
