<?php
class Database{
    private static $instance = null;
    private $conn;

    private function __construct() {
        $config = json_decode(file_get_contents(__DIR__ . '/../../config/dbConfig.json'), true);
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']}";
        try {
            $this->conn = new PDO($dsn, $config['username'], $config['password']);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

              public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }
}
            ?>