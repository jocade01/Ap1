<?php
namespace AP34\views;

class VerTareas{

    public function __construct(array $row = null){




                echo "<table border='1'>";
                echo "<tr><td>Id</td><td>Título</td><td>Descripción</td><td>Fecha de Creación</td><td>Fecha de Vencimiento</td></tr>";
                echo "<tr><td>" . $row["id"] . "<td>" . $row["titulo"] . "<td>" . $row["descripcion"] . "<td>" . $row["fecha_creacion"] . "<td>" . $row["fecha_vencimiento"] . "<td><a href='/?ruta=main'>volver</td></tr>";
                echo "</table>";

            }



}