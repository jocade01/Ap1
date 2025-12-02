<?php

namespace AP51\Controllers;

use AP51\Entity\Product;
use AP51\Core\EntityManager;
use AP51\Repository\TaskRepository;
use AP51\Views\ProductoView;
use AP51\Views\CreateView;

class ProductController
{
    public function listProductos()
    {
        $entityManager = (new EntityManager())->getEntityManager();
        $productos = $entityManager->getRepository(Product::class);
        $producto = $productos->findAll();
        $view = new ProductoView($producto);
    }

    public function crud(...$params)
    {
        $action = $params[0];
        $id = $params[1];
        switch ($action) {
            case 'create':
                $this->create();
                break;
            case 'read':
                $this->read($id);
                break;
            case 'update':
                $this->update($id);
                break;
            case 'delete':
                $this->delete($id);
                break;
        }
    }

    public function create()
    {

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $entityManager = (new EntityManager())->getEntityManager();
            $detalles = $entityManager->getRepository(Product::class);
            $product = new Product();
            $product->setProdNum($_POST['prod_num']);
            $product->setDescripcion($_POST['descripcion']);
            $entityManager->persist($product);
            $entityManager->flush();
        } else {
            $view = new CreateView();
        }
    }
}