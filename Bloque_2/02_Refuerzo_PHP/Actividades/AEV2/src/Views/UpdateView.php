<?php
namespace AEV2\Views;

class UpdateView
{
    public function __construct($id)
    {
        echo "<form method='POST' action='/producto/update/". $id ."'>";



        echo "    <label for='descripcion'>Descripción:</label><br>";
        echo "    <textarea id='descripcion' name='descripcion' required></textarea><br><br>";


        echo "    <button type='submit'>Actualizar</button>";

        echo "</form>";
    }
}


