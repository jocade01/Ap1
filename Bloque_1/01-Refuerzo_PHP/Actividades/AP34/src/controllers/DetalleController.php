<?php

namespace AP34\controllers;
use AP34\models\Model;
use AP34\views\VerTareas;

class DetalleController
{

    public function detalle($id = null)
    {
        if(is_null($id)){
            $data = null;
        } else {

            $tarea = new Model();
            $data = $tarea->obtenerId($id);
        }
        $view = new VerTareas($data);


}}

?>