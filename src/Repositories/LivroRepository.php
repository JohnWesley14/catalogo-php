<?php

namespace App\Repositories;

use App\Database\Connection;
use App\Models\Livro;
use PDO;

class LivroRepository
{
    private PDO $db;

    public function __construct(){
        $this->db = Connection::get();
    }

    public function findAll(){
        $sql = "SELECT id, titulo, autor, status, nota FROM livros";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(Livro $livro){
      $sql = "INSERT INTO livros (titulo, user_id, autor, status, nota) VALUES (:titulo, :user_id, :autor, :status, :nota )";
    
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':titulo' => $livro->getTitulo(),
            ':user_id'=> $livro->getUserId(),
            ':autor'  => $livro->getAutor(),
            ':status' => $livro->getStatus(),
            ':nota'   => $livro->getNota(),
        ]);
    }
    public function findById(int $id){
        $sql = "SELECT id, titulo, autor, status, nota FROM livros WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(["id" => $id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function update(Livro $livro): bool
    {
        $sql = "UPDATE livros 
                SET titulo = :titulo, autor = :autor, status = :status, nota = :nota 
                WHERE id = :id";

        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':id'     => $livro->getId(),
            ':titulo' => $livro->getTitulo(),
            ':autor'  => $livro->getAutor(),
            ':status' => $livro->getStatus(),
            ':nota'   => $livro->getNota()
        ]);
    }
}