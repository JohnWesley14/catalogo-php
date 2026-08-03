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

    // public function setId(int $id) {$this->id = $id;}
    // public function setNome(string $nome) {$this->nome = $nome;}
    // public function setEmail(string $email) {$this->email = $email;}
    // public function setSenha(string $senha) {$this->senha = $senha;}
    // public function setCreatedAt(string $createdAt){$this->createdAt = $createdAt;}

}


?>