<?php
class Database
{
    private const SERVER = "mariadb-server";
    private const USERNAME = "root";
    private const PASS = "root";
    private const DB = "AP1";
    private mysqli $connect;

    public function __construct()
    {
        try {
            $this->connect = new mysqli(self::SERVER, self::USERNAME, self::PASS, self::DB);
            echo "Conexion con exito <br>";
        } catch (mysqli_sql_exception $e) {
            die ($e->getMessage());
        }
    }

    public function select($query)
    {
        $result = $this->connect->query($query);
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "ID: " . $row["id"] . "<br>";
                echo "Nombre: " . $row["nombre"] . "<br>";
                echo "Estado: " . $row["estado"] . "<br><br>";
            }
        } else {
            echo "No se encontraron registros<br>";
        }
    }

    public function insert($query)
    {
        if ($this->connect->query($query) === TRUE) {
            echo "Registro insertado con éxito<br>";
        } else {
            echo "Error al insertar: " . $this->connect->error . "<br>";
        }
    }

    public function update($query)
    {
        if ($this->connect->query($query) === TRUE) {
            echo "Registro actualizado con éxito<br>";
        } else {
            echo "Error al actualizar: " . $this->connect->error . "<br>";
        }
    }

    public function delete($query)
    {
        if ($this->connect->query($query) === TRUE) {
            echo "Registro eliminado con éxito<br>";
        } else {
            echo "Error al eliminar: " . $this->connect->error . "<br>";
        }
    }

    public function __destruct()
    {
        $this->connect->close();
        echo "Conexión cerrada<br>";
    }
}

$db = new Database();

$db->select("SELECT * FROM usuarios");

$nombre = "Mario";
$estado = "0";
$db->insert("INSERT INTO usuarios (nombre, estado) VALUES ('$nombre', '$estado')");

$id = 115;
$estado1 = "0";
$db->update("UPDATE usuarios SET estado = '$estado1' WHERE id = '$id'");

$id = 159;
$db->delete("DELETE FROM usuarios WHERE id = $id");