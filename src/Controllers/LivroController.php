<?php

namespace App\Controllers;

use App\Repositories\ProductRepository;

class ProductController
{
    private ProductRepository $repository;

    public function __construct()
    {
        $this->repository = new ProductRepository();
    }

    public function index(): void
    {
        $produtos = $this->repository->findAll();
        require __DIR__ . '/../Views/products/index.php';
    }

    public function store(): void
    {
       
    }
}