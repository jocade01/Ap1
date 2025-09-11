<?php

$array = [1 => "primero",
    3 => "segundo",
    5 => "tercero",
    7 => "cuarto",
    9 => "quinto",
    11 => "sexto"];

$suma = 0;
foreach ($array as $key => $value) {
if ($value === "primero" ||  $value === "tercero" || $value === "quinto") {
    echo "Estas en una posicion impar <br>";
    $impar = true;
    $par = false;
    $suma = $suma + $key;
    echo "$suma <br>";
} else if ($value === "segundo" || $value === "cuarto" || $value === "sexto"){
    echo "Estas en una posicion par <br>";
    $impar = false;
    $par = true;
    $suma = $suma + $key;
    echo "$suma <br>";

}
if ($suma < 5){
    echo "El valor es menor que 5 <br>";
} else if ($suma > 5 && $suma < 10) {
    echo "El valor es mayor que 5 <br>";
} else if ($suma > 10 && $suma < 20) {
    echo "El valor es mayor que 10 <br>";

} else if ($suma > 20 && $suma < 100) {
    echo "El valor es mayor que 20 <br>";
}
}

?>