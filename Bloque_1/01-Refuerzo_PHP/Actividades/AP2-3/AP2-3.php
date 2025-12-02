<?php

class dbconnection{
    private static $instance = null;
    private $conn;

    private function __construct($host, $user, $pass, $db) {
        try {
            $this->conn = new mysqli($host, $user, $pass, $db);
            echo "conexion exitosa<br><br><br>";
        } catch (mysqli_sql_exception $e) {
            die("Se ha producido un error: " .$e->getMessage() . "En la linea: " . $e->getLine() . "<br><br>");
        }
    }

    public static function getInstance($host, $user, $pass, $db){
        if(self::$instance = null){
            self::$instance = new dbconnection($host, $user, $pass, $db);
        }
        return self::$instance;
    }
    public function getConnection() {
        return $this->conn;
    }

}

$host = "mariadb-server";
$username = "root";
$password = "root";
$database = "AP1";

$db1 = dbconnection::getInstance($host, $username, $password, $database);
$db2 = dbconnection::getInstance($host, $username, $password, $database);

var_dump($db1 === $db2);

$conn = $db1->getConnection();

echo "<br><br><br>";

try {
    $sql = "SELECT * FROM usuarios";
    $result= $conn->query($sql);

    while($row = $result->fetch_assoc()){
        echo "Usuario: " . $row['nombre'] . " ID: " . $row['id'] . " Estado: " . $row['estado'] . "<br>";
    }

    } catch (mysqli_sql_exception $e) {
    die("Se ha producido un error: " . $e->getMessage() . "En la linea: " . $e->getLine() . "<br><br>");
}




?>