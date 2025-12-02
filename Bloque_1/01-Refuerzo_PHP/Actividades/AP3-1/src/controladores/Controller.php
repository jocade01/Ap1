<?php
require_once __DIR__ . "/../modelos/Model.php";

class Controlador {
    public function mostrarModelo(){
        $modelo1 = new Model();

        $modelos = $modelo1->getArray();

        require_once __DIR__ . "/../Vistas/View.php";
    }
}
?>