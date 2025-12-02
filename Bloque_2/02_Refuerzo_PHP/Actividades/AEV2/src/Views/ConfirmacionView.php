<?php
namespace AEV2\Views;

class ConfirmacionView{
    public function __construct($id)
    {
        echo "<form method='POST' action='/producto/delete/" . $id ."'>";
        echo "<label>Estas seguro?</label><br>";
        echo "    <button type='submit'>Si</button>";

        echo "</form>";
        echo "<a href='/productos'>VOLVER</a>";
    }
}