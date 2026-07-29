<?php

namespace App\Repositories;

use App\Database\Connection;
use App\Models\Product;
use PDO;

class ProductRepository
{
    private PDO $db;

    public function __construct(){
        $this->db = Connection::get();
    }

    public function findAll(): array{
        $stmt = $this->db->query("SELECT * FROM produtos ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public function create(Product $product): bool{
        // Query limpa, sem o campo imagem
        $sql = "INSERT INTO produtos (nome, descricao, preco, quantidade) 
                VALUES (:nome, :descricao, :preco, :quantidade)";
        
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            ':nome'       => $product->getNome(),
            ':descricao'  => $product->getDescricao(),
            ':preco'      => $product->getPreco(),
            ':quantidade' => $product->getQuantidade()
        ]);
    }
}