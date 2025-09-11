<?php
$array = [];

foreach ($_GET as $key => $value) {
    $array[$key] = $value;
}
foreach ($array as $key => $value) {
    if (is_numeric($value)){
    echo "Se ha recibido un numero <br> ";
    } elseif ($value === "null" || $value === " ") {
        echo "No se ga recibido ningun dato o es un valor nulo <br>";
    } else {
        echo "Se ha recibido una cadena de caracteres <br>";
    }
}
?>