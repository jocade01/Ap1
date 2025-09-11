<?php
$array = [];

foreach ($_GET as $key => $value) {
    $array[$key] = $value;
}
foreach ($array as $key => $value) {
    echo "Se ha recibido " . $value ." para la clave  $key <br>";
}
?>