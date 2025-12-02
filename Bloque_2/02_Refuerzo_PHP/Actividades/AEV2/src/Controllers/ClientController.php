<?php
namespace AEV2\Controllers;

use AEV2\Core\EntityManager;
use AEV2\Entity\Client;
use AEV2\Repository\EmpresaRepository;
use AEV2\Views\ClienteView;

Class ClientController
{
public function listClientes(){
    $entityManager = (new EntityManager())->getEntityManager();
    $clientes = $entityManager->getRepository(Client::class);
    $cliente = $clientes->findAll();
    $view = new ClienteView($cliente);

}
}