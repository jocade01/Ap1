<?php
namespace AEV2\Views;

class CreateEmployerView{

    public function __construct(array $emps)
    {

        echo "<form method='POST' action='/empleado/create'>";

        echo "<label for='emp_no'>Emp_no:</label>";
        echo "<input type='number' id='emp_no' name='emp_no' required><br><br>";

        echo "    <label for='apellidos'>Apellidos:</label><br>";
        echo "    <textarea id='apellidos' name='apellidos' required></textarea><br><br>";

        echo "    <label for='oficio'>Oficio:</label><br>";
        echo "    <textarea id='oficio' name='oficio' required></textarea><br><br>";

        echo "    <label for='fecha_alta'>Fecha_Alta:</label><br>";
        echo "    <input type = 'date' id='fecha_alta' name='fecha_alta' required><br><br>";


        echo "<label for='salario'>Salario:</label>";
        echo "<input type='number' id='salario' name='salario' required><br><br>";


        echo "<label for='comision'>Comision:</label>";
        echo "<input type='number' id='comision' name='comision' required><br><br>";


        echo "<label for='dept_no'>Departamento:</label>";
        echo "<select id = 'dept_no' name = 'dept_no' required>";
        echo "<option value=''>--Seleccione Departamento--</option>";
        foreach ($emps as $connections) {

            echo "<option value='" . $connections->getDept()->getDeptNo() . "'>" . $connections->getDept()->getDnombre() . "</option>";
        }
        echo "</select><br>";

        echo "<label for='jefe'>Jefe:</label>";
        echo "<select id = 'jefe' name= 'jefe'>";
        echo "<option value=''>--Seleccione Jefe--</option>";
        foreach ($emps as $boss){
            echo "<option value='" . $boss->getEmpNo() . "'>" . $boss->getEmpNo() . "</option>";
        }
        echo "</select><br>";

        echo "<button type='submit'>Crear Empleado</button>";
        echo "</form>";

    }
}