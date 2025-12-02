<?php
namespace AEV2\Controllers;

use AEV2\Core\EntityManager;
use AEV2\Entity\Dept;
use AEV2\Repository\EmpresaRepository;
use AEV2\Views\CreateDepartmentView;
use AEV2\Views\PedidoView;
use AEV2\Views\ReadView;
use AEV2\Views\DepartamentoView;
use AEV2\Views\UpdateDepartmentView;
use AEV2\Views\ConfirmacionDeptView;


class DepartmentController
{
    public function listDepartamentos()
    {
        $entityManager = (new EntityManager())->getEntityManager();
        $departamentos = $entityManager->getRepository(Dept::class);
        $departament = $departamentos->findAll();
        $view = new DepartamentoView($departament);
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

    public function create()
    {

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $entityManager = (new EntityManager())->getEntityManager();
            $departments = $entityManager->getRepository(Dept::class);
            $department = new Dept();
            $department->setDeptNo($_POST['dept_no']);
            $department->setDnombre($_POST['dnombre']);
            $department->setLoc($_POST['loc']);
            $department->setColor($_POST['color']);

            $entityManager->persist($department);
            $entityManager->flush();
            $this->listDepartamentos();

        } else {
            $view = new CreateDepartmentView();
        }
    }

    public function update($id)
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $entityManager = (new EntityManager())->getEntityManager();
            $departments = $entityManager->getRepository(Dept::class);
            $department = $departments->find($id);
            $department->setDnombre($_POST['dnombre']);
            $department->setLoc($_POST['loc']);
            $department->setColor($_POST['color']);

            $entityManager->persist($department);
            $entityManager->flush();
            $this->listDepartamentos();

        } else {
            $view = new UpdateDepartmentView($id);
        }
    }

        public function delete($id)
    {            if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $entityManager = (new EntityManager())->getEntityManager();
        $departments = $entityManager->getRepository(Dept::class);
        $department = $departments->find($id);
        $entityManager->remove($department);
        $entityManager->flush();
        $this->listDepartamentos();

    } else {
        $view = new ConfirmacionDeptView($id);
    }
    }


}