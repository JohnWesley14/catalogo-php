<?php 
namespace App\Models;
class User{
    private ?int $id;
    private string $nome;
    private string $email;
    private string $senha;
    private string $createdAt;

    public function __construct(
        ?int $id = null,
        string $nome = '',    
        string $email = '',
        string $senha = '',
        string $createdAt = ''
    )
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->email = $email;
        $this->senha =  $senha;
        $this->createdAt =  $createdAt;

    }
    public function getId(){
        return $this->id;
    }
    public function getNome(){
        return $this->nome;
    }
    public function getEmail(){
        return $this->email;
    }
    public function getSenha(){
        return $this->senha;
    }
    public function getCreatedAt(){
        return $this->createdAt;
    }
}

?>