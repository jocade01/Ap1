<?php

namespace AP34\views;
class ListadoTareas{
    public function __construct(array $modelos){


                echo "<table border='1'>";

                echo "<tr><td>Título</td><td>Fecha de Vencimiento</td></tr>";
                foreach ($modelos as $modelo=>$tarea) {
                    echo "<tr><td><a href='detalle/" . $tarea["id"] . "'>" . $tarea["titulo"] . "</a> <td>" . $tarea["fecha_vencimiento"] . "</td></tr>";
                }
                    echo "</table>";


            }


}