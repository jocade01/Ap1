<?php

namespace AEV2\Controllers;

use AEV2\Entity\Product;
use AEV2\Core\EntityManager;
use AEV2\Repository\EmpresaRepository;
use AEV2\Views\ProductoView;
use AEV2\Views\CreateView;
use AEV2\Views\UpdateDepartmentView;
use AEV2\Views\UpdateView;
use AEV2\Entity\Detail;
use AEV2\Views\ConfirmacionView;
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
        $action = $params[0] ?? null;
        $id = $params[1] ?? null;
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
            $this->listProductos();

        } else {
            $view = new CreateView();
        }
    }

    public function update($id){
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $entityManager = (new EntityManager())->getEntityManager();
        $productos = $entityManager->getRepository(Product::class);
        $product = $productos->find($id);

                $product->setDescripcion($_POST['descripcion']);
                $entityManager->persist($product);

        $entityManager->flush();
            $this->listProductos();

        } else {
            $view = new UpdateView($id);
        }
        }

        public function delete($id)
        {
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $entityManager = (new EntityManager())->getEntityManager();
                $producto = $entityManager->getRepository(Product::class);
                $product = $producto->find($id);
                $entityManager->remove($product);
                $entityManager->flush();
                $this->listProductos();
            } else {
                $view = new ConfirmacionView($id);
            }
        }
}