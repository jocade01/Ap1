<?php
namespace AEV2\Views;

class CreateDepartmentView
{
    public function __construct()
    {
        echo "<form method='POST' action='/departamento/create'>";

        echo "    <label for='dept_no'>Dept_no:</label><br>";
        echo "    <input type='number' id='dept_no' name='dept_no' required><br><br>";


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


