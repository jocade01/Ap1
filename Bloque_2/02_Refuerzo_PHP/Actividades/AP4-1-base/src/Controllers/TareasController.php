<?php

namespace AP41\Controllers;

use AP41\Core\EntityManager;
use AP41\Entity\Tareas;
use AP41\Views\DetalleTarea;
use AP41\Views\ListadoTareas;
use AP41\Views\FormularioView;

/**
 * Controlador para la ruta /detalle
 */
class TareasController1
{

    public function list()
    {
        $entityManager = (new EntityManager())->getEntityManager();
        $tareas = $entityManager->getRepository(Tareas::class);

        $data = $tareas->findAll();
        $view = new ListadoTareas($data);
    }


    public function detail($id = null)
    {
        $entityManager = (new EntityManager())->getEntityManager();
        $tareas = $entityManager->getRepository(Tareas::class);

        $data = $tareas->find($id);
        $view = new DetalleTarea($data);
    }

    public function addTask()
    {
        $data = new FormularioView();
    }

    public function saveTask()
    {
        $entityManager = (new EntityManager())->getEntityManager();
        $tareas = $entityManager->getRepository(Tareas::class);

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Recoger datos del formulario
            $id = $_POST['id'] ?? '';
            $titulo = $_POST['titulo'] ?? '';
            $descripcion = $_POST['descripcion'] ?? '';
            $fecha_creacion = $_POST['fecha_creacion'] ?? '';
            $fecha_vencimiento = $_POST['fecha_vencimiento'] ?? '';

            return $tareas->makeTask($id, $titulo, $descripcion, $fecha_creacion, $fecha_vencimiento);

        }
    }
}

$operations = $user->getOperations();
foreach ($operations as $operation) {
    echo $operation->getResult() . "";
}