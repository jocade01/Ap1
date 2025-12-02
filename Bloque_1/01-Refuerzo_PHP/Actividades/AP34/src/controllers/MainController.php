<?php

namespace AP34\controllers;

use AP34\models\Model;
use AP34\views\ListadoTareas;

class MainController
{

    public function raiz()
    {
        $modelo1 = new Model();
        $modelos = $modelo1->obtenerTareas();
        $view = new ListadoTareas($modelos);

    }

    public function default(){
        echo "La ruta no existe";
    }
}

?>