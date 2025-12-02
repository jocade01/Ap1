<?php
require_once __DIR__. ' /../core/Database.php';

Class tarea {
    private $db;
    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }
    public function obternerTareas() {
        $query = "SELECT * FROM tareas";
        $result = $this->db->query($query);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
}