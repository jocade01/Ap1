<?php
namespace AEV2\Controllers;

use AEV2\Core\EntityManager;
use AEV2\Entity\Emp;
use AEV2\Repository\EmpresaRepository;
use AEV2\Views\PedidoView;
use AEV2\Views\ReadView;
use AEV2\Views\EmpleadoView;
use AEV2\Views\CreateEmployerView;
use AEV2\Entity\Dept;
use DateTime;

class EmployerController
{
    public function listEmpleados()
    {
        $entityManager = (new EntityManager())->getEntityManager();
        $empleados = $entityManager->getRepository(Emp::class);
        $empleado = $empleados->findAll();
        $view = new EmpleadoView($empleado);
    }

    public function crud(...$params)
    {
        $action = $params[0];
        $id = $params[1];
        switch ($action) {
            case 'create':
                $this->create();
                break;
            case 'read':
                $this->read($id);
                break;
            case 'update':
                $this->update($id);
                break;
            case 'delete':
                $this->delete($id);
                break;
        }
    }

    public function create(){
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $entityManager = (new EntityManager())->getEntityManager();
            $empleados = $entityManager->getRepository(Emp::class);
            $empleado = new Emp();
            $empleado->setEmpNo($_POST['emp_no']);
            $empleado->setSurname($_POST['apellidos']);
            $empleado->setWork($_POST['oficio']);
            $empleado->setTallDate(new DateTime($_POST['fecha_alta']));
            $empleado->setSalary($_POST['salario']);
            $empleado->setComision($_POST['comision']);

            $deptt = $entityManager->getRepository(Dept::class)->find($_POST['dept_no']);
            $empleado->setDept($deptt);
            $boss = $entityManager->getRepository(Emp::class)->find($_POST['jefe']);
            $empleado->setBoss($boss);

            $entityManager->persist($empleado);
            $entityManager->flush();
            $this->listEmpleados();
        }
        else {
            $entityManager = (new EntityManager())->getEntityManager();
            $departamentos = $entityManager->getRepository(Dept::class);
            $entityManager = (new EntityManager())->getEntityManager();
            $empleados = $entityManager->getRepository(Emp::class);
            $emps = $empleados->findAll();
            $depts = $departamentos->findAll();
            $view = new CreateEmployerView($emps, $depts);
        }
    }



}