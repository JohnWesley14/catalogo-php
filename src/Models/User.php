<?php 

namespace App\Models;

class User{
    public function __construct(
        private ?int $id = null,
        private string $nome = "",
        private string $email = "",
        private string $senha = "",
        private string $createdAt = "",
    ) {}

    public function getId(){return $this->id;}
    public function getNome(){return $this->nome;}
    public function getEmail(){return $this->email;}
    public function getSenha(){return $this->senha;}
    public function getCreatedAt(){return $this->createdAt;}
}


?>