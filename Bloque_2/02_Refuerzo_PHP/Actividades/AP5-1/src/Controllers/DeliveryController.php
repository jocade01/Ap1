<?php

namespace AP51\Controllers;

use AP51\Core\EntityManager;
use AP51\Entity\Delivery;
use AP51\Repository\TaskRepository;
use AP51\Views\PedidoView;
use AP51\Entity\Detail;
use AP51\Views\ReadView;


class DeliveryController
{
    public function listPedidos()
    {
        $entityManager = (new EntityManager())->getEntityManager();
        $pedidos = $entityManager->getRepository(Delivery::class);
        $pedido = $pedidos->findAll();
        $view = new PedidoView($pedido);
    }

    public function crud(...$params)
    {
        $action = $params[0];
        $id = $params[1];

        switch ($action) {
            case 'read':
                $this->read($id);
                break;
        }
    }

    public function read($id)
    {
        $entityManager = (new EntityManager())->getEntityManager();
        $detalles = $entityManager->getRepository(Detail::class);
        $detail = $detalles->findBy(['pedido' => $id]);
        $view = new ReadView($detail);

    }

}