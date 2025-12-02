<?php

namespace AP33\controllers;

class DetalleController
{
    public function detail()
    {
        $modelo1 = new Model;
        $modelos = $modelo1->obtenerTareas();


    }
}

?>