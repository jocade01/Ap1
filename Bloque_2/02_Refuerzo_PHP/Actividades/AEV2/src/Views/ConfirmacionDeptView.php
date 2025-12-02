<?php
namespace AEV2\Views;

class ConfirmacionDeptView{
    public function __construct($id)
    {
        echo "<form method='POST' action='/departamento/delete/" . $id ."'>";
        echo "<label>Estas seguro?</label><br>";
        echo "    <button type='submit'>Si</button>";

        echo "</form>";
        echo "<a href='/departamentos'>VOLVER</a>";
    }
}