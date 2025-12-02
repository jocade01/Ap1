<?php

namespace AP41\Views;

class ListadoTareas
{
    public function __construct(array $tareas = null){
echo "<p><a href='addTask'>Añadir Tarea</a>";
echo "<table border='1'> <tr><td>Título</td><td>Descripción</td><td>Fecha de Creación</td><td>Fecha de Vencimiento</td></tr>";
    foreach($tareas as $tarea){
        echo "<tr>";
        echo "<td><a href='detalle/" . $tarea->getId() . "'>" . $tarea->getTitulo() . "</td>";
        echo "<td>" . $tarea->getDescripcion() . "</td>";
        echo "<td>" . $tarea->getFechaCreacion()->format('Y-m-d H:i:s') . "</td>";
        echo "<td>" . $tarea->getFechaVencimiento()->format('Y-m-d H:i:s') . "</td>";
    }
        echo "</tr></table>";


    }

}