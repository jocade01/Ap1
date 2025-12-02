<?php
/*
Crea la clase DatabaseConnection siguiendo el patrón Singleton.
    Sigue la plantilla de patrón Singleton vista en clase.
    La conexión a la base de datos se debe hacer dentro del constructor usando la extensión mysqli.
    La clase debe recibir los parámetros de conexión como host, usuario, contraseña y nombre de la base de datos.
    Puedes usar cualquiera de las BBDD creadas en actividades anteriores.
También debes crear una parte del código donde instancies la clase, establezcas la conexión a la BBDD y hagas alguna operación con ella.
 */
class DatabaseConnection2 {
    private static $instance = null; // aquí guardaremos la única instancia de la clase. Como es static, pertenece a la clase, no a los objetos.
    private $conn; // guarda la conexion de mysqli

    private function __construct($host, $user, $pass, $db) {
        try {
            $this->conn = new mysqli($host, $user, $pass, $db);
            echo "conexion exitosa<br><br><br>";
        } catch (mysqli_sql_exception $e) {
            die("Se ha producido un error: " .$e->getMessage() . "En la linea: " . $e->getLine() . "<br><br>");
        }
    }

    public static function getInstance($host, $user, $pass, $db) {
        if (self::$instance == null) {
            self::$instance = new DatabaseConnection2($host, $user, $pass, $db);
        }
        return self::$instance;
        /*
        public static function getInstance() → este es el corazón del Singleton.
        Si todavía no existe una instancia (null), la crea con new Database() y la devuelve.
        Si ya existe, devuelve la misma.
        Así nos aseguramos de que nunca haya dos instancias distintas.
        */
    }
    public function getConnection() {
        return $this->conn;
    }
}

$host = "mariadb-server";
$username = "root";
$password = "root";
$database = "AP1";

$db1 = DatabaseConnection2::getInstance($host, $username, $password, $database);        // Si es la primera vez la crea si ya esta creada sigue con la misma. Siempre devuelve la misma instancia
$db2 = DatabaseConnection2::getInstance($host, $username, $password, $database);

var_dump($db1 === $db2); // true, ambas son la misma instancia

$conn = $db1->getConnection(); // Obtenemos la conexión mysqli

echo "<br><br><br>";

try {
    $sql = "SELECT * FROM usuarios";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        echo "El usuario " . $row["nombre"] . " posee la id: " . $row["id"] . " y su estado es: " . $row["estado"] . "<br>";
        echo "----------------------<br>";
    }
} catch (mysqli_sql_exception $e) {
    die("Se ha producido un error: " . $e->getMessage() . "En la linea: " . $e->getLine() . "<br><br>");
}