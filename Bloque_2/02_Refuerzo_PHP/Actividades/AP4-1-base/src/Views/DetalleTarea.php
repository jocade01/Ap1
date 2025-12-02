<?php

namespace AP41\Views;

use AP41\Entity\Tareas;

class DetalleTarea
{
    public function __construct($tareas)
    {

        echo "<table border='1'> <tr><td>Id</td><td>Título</td><td>Descripción</td><td>Fecha de Creación</td><td>Fecha de Vencimiento</td></tr>";

        echo "<tr>";
        echo "<td>" . $tareas->getId() . "</td>";
        echo "<td>" . $tareas->getTitulo() . "</td>";
        echo "<td>" . $tareas->getDescripcion() . "</td>";
        echo "<td>" . $tareas->getFechaCreacion()->format('Y-m-d H:i:s') . "</td>";
        echo "<td>" . $tareas->getFechaVencimiento()->format('Y-m-d H:i:s') . "</td>";
        echo "</tr></table>";

    }
}