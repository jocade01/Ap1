<?php

namespace AP33\models;
class Model
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function obternerTareas()
    {
        $query = "SELECT * FROM tareas";
        $result = $this->db->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}


?>