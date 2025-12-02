<?php
namespace AEV2\Views;

Class UpdateDepartmentView{

        public function __construct($id)
    {
        echo "<form method='POST' action='/departamento/update/" . $id ."'>";


        echo "    <label for='dnombre'>Dnombre:</label><br>";
        echo "    <textarea id='dnombre' name='dnombre' required></textarea><br><br>";


        echo "    <label for='loc'>Loc:</label><br>";
        echo "    <textarea id='loc' name='loc' required></textarea><br><br>";


        echo "    <label for='color'>Color:</label><br>";
        echo "    <textarea id='color' name='color' required></textarea><br><br>";

        echo "    <button type='submit'>Enviar</button>";

        echo "</form>";
    }

    }
