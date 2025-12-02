<?php
namespace AEV2\Views;

class ClienteView
{
  public function __construct(array $clientes){
      echo "<a href='/.'>VOLVER</a>";

      echo "<table border='1'>";
      echo "<tr><td>Cliente_cod</td><td>Nombre</td><td>Direc</td><td>Ciudad</td><td>Estado</td><td>Cod_postal</td><td>Area</td><td>Telefono</td><td>Repr_cod</td><td>Limite_credito</td><td>Observaciones</td><td></td></tr>";
      foreach ($clientes as $cliente){
          echo "<tr>";
          echo "<td>" . $cliente->getClienteCod() . "</td>";
          echo "<td>" . $cliente->getName() . "</td>";
          echo "<td>" . $cliente->getDireccion() . "</td>";
          echo "<td>" . $cliente->getCiudad() . "</td>";
          echo "<td>" . $cliente->getEstado() . "</td>";
          echo "<td>" . $cliente->getCodPostal() . "</td>";
          echo "<td>" . $cliente->getArea() . "</td>";
          echo "<td>" . $cliente->getTelefono() . "</td>";
          echo "<td>" . ($cliente->getEmp()?->getSurname() ?? '-'). "</td>";
          echo "<td>" . $cliente->getLimiteCredito() . "</td>";
          echo "<td>" . $cliente->getObservaciones() . "</td>";
          echo "</tr>";
      }
  }
}