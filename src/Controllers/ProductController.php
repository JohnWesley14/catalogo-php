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
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        // Se NÃO existir a chave user_id na sessão, manda para o login
        if (!isset($_SESSION['user_id'])) {
            header("Location: index.php?action=login");
            exit();
        }
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
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
            $nome       = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
            $descricao  = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_SPECIAL_CHARS);
            $preco      = filter_input(INPUT_POST, 'preco', FILTER_VALIDATE_FLOAT);
            $quantidade = filter_input(INPUT_POST, 'quantidade', FILTER_VALIDATE_INT);

            if ($id && $nome && $preco !== false) {
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
        $produto = $this->repository->findById($id);

        if (!$produto) {
            header('Location: index.php?action=index');
            exit;
        }

        // 3. Ao fazer o "require" abaixo, o arquivo edit.php HERDA e enxerga 
        // a variável $produto que acabamos de criar na linha de cima!
        require __DIR__ . '/../Views/products/edit.php';
    }
    public function delete()
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

        if ($id) {
            $this->repository->delete($id);
        }
        header('Location: index.php?action=index');
        exit;
    }
    public function search(): void
    {
        // 1. Pega o termo digitado na URL
        $termo = filter_input(INPUT_GET, 'termo', FILTER_SANITIZE_SPECIAL_CHARS);

        if ($termo) {
            // 2. Salva o resultado na variável $produtos
            $produtos = $this->repository->search($termo);
        } else {
            // Se enviou a busca em branco, traz todos
            $produtos = $this->repository->findAll();
        }

        // 3. CARREGA A VIEW! Sem essa linha, a tela não atualiza com a busca.
        require __DIR__ . '/../Views/products/index.php';
    }
}
