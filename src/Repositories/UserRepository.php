<?php
namespace App\Repositories;

use App\Database\Connection;
use App\Models\User;
use PDO;
class UserRepository{
    private PDO $db;
    public function __construct()
    {
        $this->db = Connection::get();
    }
    public function findAll(){
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
     public function findByEmail(){
        $sql = "SELECT nome, email, senha ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function createUser(User $user){
        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ":nome" => $user->getNome(),
            ":email" => $user->getEmail(),
            ":senha" => $user->getSenha(),
        ]);

        
    }
}

?>