<?php

namespace AP34\models;
use AP34\core\DataBase;
use PDO;

class Model
{
    private DataBase $db;

    public function __construct()
    {
        $this->db = DataBase::getInstance();    }

    public function obtenerTareas()
    {
        $sql = "SELECT * FROM tareas";
        return $this->db->executeSQL($sql);

    }



    public function obtenerId($id){
        $sql = "SELECT * FROM tareas where id = $id";
        $result = $this->db->executeSQL($sql);
        return $result[0];
    }
}


?>