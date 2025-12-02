<?php
require_once __DIR__ . '/../models/Tarea.php';

class TareasController{
    public function listarTareas(){
        $Tarea1 = new Tarea();
        $Tareas = $Tarea1->obternerTareas();

        require __DIR__ . '/../views/ListadoTareas.php';

    }

}