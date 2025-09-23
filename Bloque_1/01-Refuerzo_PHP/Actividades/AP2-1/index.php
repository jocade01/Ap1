<?php

require_once "AP2-1.php";

$coche1 = new VehiculoCarrera("Ford", "124", 0, 0,);

$coche1-> arrancar();
$coche1-> acelerar();
$coche1-> mostrarProtected();
$coche1-> mostrarEstado();
$coche2 = new CocheF1("Ford", "124", 0, 0, FALSE);
$coche2-> arrancar();
$coche2-> acelerar();
$coche2-> mostrarProtected();
$coche2-> abrirAleron();
$coche2-> activarDRS();
$coche2-> mostrarEstado();
$coche3 = new CocheElectricoF1("Ford", "124", 0, 0, 25);
$coche3-> recargar();

?>