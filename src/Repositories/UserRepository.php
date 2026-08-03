<?php

namespace App\Repositories;

use App\Database\Connection;
use App\Models\User;
use PDO;
class UserRepository
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Connection::get();
    }
    public function findByEmail(string $email)
    {
        $stmt = $this->db->prepare("SELECT * FROM usuarios WHERE email = :email");
        $stmt->execute(["email" => $email]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }
    public function save(User $user)
{
    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
    
    try {
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ":nome"  => $user->getNome(),
            ":email" => $user->getEmail(),
            ":senha" => $user->getSenha()
        ]);
    } catch (\PDOException $e) {
        // Se o MySQL reclamar de algo, vai aparecer em vermelho na tela:
        die("Erro no MySQL: " . $e->getMessage() . "");
    }
}
    
}
