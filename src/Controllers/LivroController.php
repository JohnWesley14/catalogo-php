<?php

namespace App\Controllers;

use App\Models\Livro;
use App\Repositories\LivroRepository;

class LivroController
{
    private LivroRepository $repository;

    public function __construct()
    {
        $this->repository = new LivroRepository();
    }

    public function index(): void
    {
        $livros = $this->repository->findAll();
        require __DIR__ . '/../Views/livros/index.php';
    }

    public function store(): void
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $titulo = filter_input(INPUT_POST, "titulo", FILTER_SANITIZE_SPECIAL_CHARS);
            $autor = filter_input(INPUT_POST, "autor", FILTER_SANITIZE_SPECIAL_CHARS);
            $status = filter_input(INPUT_POST, "status", FILTER_SANITIZE_SPECIAL_CHARS);
            $nota = filter_input(INPUT_POST, "nota", FILTER_SANITIZE_SPECIAL_CHARS);

            $livro = new Livro(
                titulo: $titulo,
                autor: $autor,
                status: $status,
                nota: $nota,
            );
            $livro = $this->repository->create($livro);
            //  var_dump($livro);
            header("Location: index.php?action=index");
            exit();
        };
    }
    public function edit()
    {
        $id = filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
        $this->repository->update($id);

        require __DIR__ . '/../Views/livros/index.php?action=edit';
    }
    //Falta fazer a func que recebe os dados do 
    
}
