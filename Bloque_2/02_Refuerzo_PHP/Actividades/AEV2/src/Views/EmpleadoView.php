<?php
namespace AEV2\Views;

class EmpleadoView{
    public function __construct(array $empleados){
        echo "<a href='/.'>VOLVER</a>";

        echo "<a href='empleado/create'>Crear Empleado</a>";
        echo "<table border='1'>";
        echo "<tr><td>EMP_NO</td><td>APELLIDOS</td><td>OFICIO</td><td>JEFE</td><td>NUM_EMPLEADOS</td><td>FECHA_ALTA</td><td>SALARIO</td><td>COMISION</td><td>DEPT_NO</td>";

        foreach ($empleados as $empleado){


                echo "<tr>";
            echo "<td>" . $empleado->getEmpNo() . "</td>";
            echo "<td>" . $empleado->getSurname() . "</td>";
            echo "<td>" . $empleado->getWork() . "</td>";
                $employers = $empleado->getBoss();
                    echo "<td>" . ($employers ? $employers->getEmpNo() : '-'). "</td>";
                    $bosses = $empleado->getEmployer();
            echo "<td>" . $bosses->count() . "</td>";
            echo "<td>" . $empleado->getTallDate()->format('Y-m-d H:i:s') . "</td>";
            echo "<td>" . $empleado->getSalary() . "</td>";
            echo "<td>" . $empleado->getComision() ?? "</td>";
            echo "<td>" . $empleado->getDept()->getDnombre() . "</td>";


        }

    }
}