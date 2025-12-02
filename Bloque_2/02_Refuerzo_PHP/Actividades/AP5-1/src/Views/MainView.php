<?php

namespace AP51\Views;

class MainView
{
   public function __construct(){
       echo "<table>";
       echo "<tr>";
       echo "<td><a href='/clientes'> Clientes</a>";
       echo "<tr>";
       echo "<td><a href='/pedidos'>Pedidos</a>";
       echo "<tr>";
       echo "<td><a href='/productos'>Productos</a>";
   }

}