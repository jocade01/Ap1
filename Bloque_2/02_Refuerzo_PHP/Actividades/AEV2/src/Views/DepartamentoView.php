<?php

namespace AEV2\Views;

class DepartamentoView{
    public function __construct($departamentos){
        echo "<a href='/.'>VOLVER</a>";

        echo "<a href ='departamento/create'>Crear</a>";
        echo "<table border ='1'>";
        echo "<tr><td>DEPT_NO</td><td>DNOMBRE</td><td>LOC</td><td>COLOR</td><td>Num_empleados</td></tr>";

        foreach($departamentos as $departamento){

            echo "<tr>";
            echo "<td>" . $departamento->getDeptNo() . "</td>";
            echo "<td>" . $departamento->getDnombre() . "</td>";
            echo "<td>" . $departamento->getLoc() . "</td>";
            echo "<td>" . $departamento->getColor() . "</td>";

            $empleados = $departamento->getEmp();
            echo "<td>" . $empleados->count() . "</td>";
            echo "<td><a href='/departamento/update/" . $departamento->getDeptNo() . "'>Actualizar</a></td>";
            echo "<td><a href='/departamento/delete/" . $departamento->getDeptNo() . "'>Borrar</a></td>";

        }

    }
}



