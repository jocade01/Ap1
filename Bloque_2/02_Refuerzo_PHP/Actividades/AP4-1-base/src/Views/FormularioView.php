<?php
namespace AP41\Views;
class FormularioView{
    public function __construct()
    {
        echo "<form method='POST' action='saveTask'>";

        echo "    <label for='id'>ID:</label><br>";
        echo "    <input type='number' id='id' name='id' required><br><br>";

        echo "    <label for='titulo'>Título:</label><br>";
        echo "    <input type='text' id='titulo' name='titulo' required><br><br>";

        echo "    <label for='descripcion'>Descripción:</label><br>";
        echo "    <textarea id='descripcion' name='descripcion' required></textarea><br><br>";

        echo "    <label for='fecha_creacion'>Fecha de creación:</label><br>";
        echo "    <input type='date' id='fecha_creacion' name='fecha_creacion' required><br><br>";

        echo "    <label for='fecha_vencimiento'>Fecha de vencimiento:</label><br>";
        echo "    <input type='date' id='fecha_vencimiento' name='fecha_vencimiento' required><br><br>";

        echo "    <button type='submit'>Enviar</button>";

        echo "</form>";


    }
}