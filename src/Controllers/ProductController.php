<?php

namespace App\Controllers;

use App\Models\Product;
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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
            $preco = filter_input(INPUT_POST, 'preco', FILTER_VALIDATE_FLOAT);
            $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_VALIDATE_INT);

            if ($nome && $preco !== false) {
                $produto = new Product(
                    nome: $nome,
                    descricao: $descricao,
                    preco: $preco,
                    quantidade: $quantidade ?: 0
                );

                $this->repository->create($produto);

                header('Location: index.php?action=index');
                exit;
            }
        }
    }
    public function update(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
            $nome       = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $descricao  = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
            $preco      = filter_input(INPUT_POST, 'preco', FILTER_VALIDATE_FLOAT);
            $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_VALIDATE_INT);

            if($id && $nome && $preco !== false ){
                $produto = new Product(
                    id: $id,
                    nome: $nome,
                    descricao: $descricao ?: '',
                    preco: $preco, 
                    quantidade: $quantidade ?: 0
                );
                $this->repository->update($produto);

                header('Location: index.php?action=index');
                exit;
            }
        }
    }
    public function edit(): void
    {
        // 1. Pega o "id=1" que está na URL (ex: index.php?action=edit&id=1)
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if (!$id) {
            header('Location: index.php?action=index');
            exit;
        }

        // 2. AQUI ESTÁ AS COMPANHIAS: Buscamos o item no banco usando o findById
        // Isso cria a variável $produto (que é um objeto da classe Product)
        $produto = $this->repository->findById($id);

        if (!$produto) {
            header('Location: index.php?action=index');
            exit;
        }

        // 3. Ao fazer o "require" abaixo, o arquivo edit.php HERDA e enxerga 
        // a variável $produto que acabamos de criar na linha de cima!
        require __DIR__ . '/../Views/products/edit.php';
    }
}