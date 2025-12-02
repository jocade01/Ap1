<?php
namespace AP51\Controllers;

use AP51\Core\EntityManager;
use AP51\Entity\Client;
use AP51\Repository\TaskRepository;
use AP51\Views\ClienteView;

Class ClientController
{
public function listClientes(){
    $entityManager = (new EntityManager())->getEntityManager();
    $clientes = $entityManager->getRepository(Client::class);
    $cliente = $clientes->findAll();
    $view = new ClienteView($cliente);

}
}