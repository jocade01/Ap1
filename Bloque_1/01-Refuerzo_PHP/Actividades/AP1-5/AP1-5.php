<?php

$host = "mariadb-server";
$user = "root";
$pass = "root";
$db = "AP1";

$mysqli = new mysqli ($host,$user,$pass,$db);

if ($mysqli->connect_error) {
    echo "Fallo al conectar a MySQL: " . $mysqli->connect_error;
}

// echo "Conectado a la base de datos";

$sql = "SELECT * FROM usuarios";
$resultado = $mysqli->query($sql);
while ($row = $resultado->fetch_assoc()) {
    echo "ID: " . $row["id"] . "<br>";
    echo "Nombre: " . $row["nombre"] . "<br>";
    echo "Estado: " . $row["estado"] . "<br>";
}

$nombre = "Hugo";
$estado = "0    ";

$sql = "INSERT INTO usuarios (nombre, estado) VALUES ('$nombre', '$estado')";
try{
$id = $mysqli->insert_id;
$mysqli->query($sql);
    echo "Se ha registrado correctamente el usuario";
}
catch (mysqli_sql_exception $e) {
    echo "Error al registrar: " . mysqli_error($mysqli);
}

$estado = "1";

$sql = "UPDATE usuarios SET estado = '$estado' WHERE id = $id";

try{

    $mysqli->query($sql);
    echo "Tarea actualizada con exito. <br>";
} catch (mysqli_sql_exception){
    echo "Error al hacer UPDATE: " . $mysqli->error;
}
$sql = "DELETE FROM usuarios WHERE id = $id";
try{

    $mysqli->query($sql);
    echo "Tarea eliminada con exito. <br>";
} catch(mysqli_sql_exception){
    echo "Error al hacer DELETE: " . $mysqli->error;
}

$mysqli->close();

?>