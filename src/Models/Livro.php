<?php
namespace App\Models;

class Livro
{
    private ?int $id;
    private ?int $userId;
    private string $titulo;
    private string $autor;
    private string $status;
    private ?string $createdAt;
    private ?int $nota;

    public function __construct(
        ?int $id = null,
        ?int $userId = null, 
        string $titulo = '',
        string $autor = '',
        string $status = 'quero_ler',
        ?string $createdAt = null,
        ?int $nota = null,
    ) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->status = $status;
        $this->createdAt = $createdAt;
        $this->nota = $nota;
        $this->userId = $userId;
    }

    // Getters
    public function getId(): ?int 
    { 
        return $this->id; 
    }

    public function getTitulo(): string 
    { 
        return $this->titulo; 
    }

    public function getAutor(): string 
    { 
        return $this->autor; 
    }

    public function getStatus(): string 
    { 
        return $this->status; 
    }

    public function getCreatedAt(): ?string 
    { 
        return $this->createdAt; 
    }
    public function getNota(): ?int 
    { 
        return $this->nota; 
    }
    public function getUserId(){
        return $this->userId;
    }
}