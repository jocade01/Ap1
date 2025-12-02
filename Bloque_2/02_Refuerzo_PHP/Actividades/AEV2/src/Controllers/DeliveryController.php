<?php

namespace AEV2\Controllers;

use AEV2\Core\EntityManager;
use AEV2\Entity\Delivery;
use AEV2\Repository\EmpresaRepository;
use AEV2\Views\PedidoView;
use AEV2\Entity\Detail;
use AEV2\Views\ReadView;


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