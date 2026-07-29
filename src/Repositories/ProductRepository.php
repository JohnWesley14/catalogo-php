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

    // preencher o formulário de edição na tela antes de o usuário alterar qualquer coisa. Para ficar melhor pro user
    public function findById(int $id){
        $stmt = $this->db->prepare("SELECT * FROM produtos where id = :id");
        $stmt->execute([':id' => $id]);

        $row = $stmt->fetch();
        if(!$row){
            return null;
        }
        return new Product(
            id: (int)$row['id'],
            nome: $row['nome'],
            descricao: $row['descricao'],
            preco: (float)$row['preco'], // Corrigido!
            quantidade: (int)$row['quantidade']
        );
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
    public function update(Product $product){
        $sql = "UPDATE produtos SET nome = :nome, descricao = :descricao, preco = :preco, quantidade = :quantidade WHERE id = :id";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':nome'       => $product->getNome(),
            ':descricao'  => $product->getDescricao(),
            ':preco'      => $product->getPreco(),
            ':quantidade' => $product->getQuantidade(),
            ':id'         => $product->getId()
        ]);
    }
}