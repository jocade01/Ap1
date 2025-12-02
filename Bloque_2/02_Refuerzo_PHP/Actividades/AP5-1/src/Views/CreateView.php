<?php

namespace AP51\Views;

class CreateView
{
    public function __construct()
    {
        echo "<form method='POST' action='/producto/create'>";

        echo "    <label for='prod_num'>Prod_num:</label><br>";
        echo "    <input type='number' id='prod_num' name='prod_num' required><br><br>";


        echo "    <label for='descripcion'>Descripción:</label><br>";
        echo "    <textarea id='descripcion' name='descripcion' required></textarea><br><br>";


        echo "    <button type='submit'>Enviar</button>";

        echo "</form>";
    }
}