<?php

namespace App\Repositories;

use App\Database\Connection;
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
}
