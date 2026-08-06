<?php
namespace App\Models;

class Livro
{
    private ?int $id;
    private string $titulo;
    private string $autor;
    private string $status;
    private ?string $createdAt;
    private string $nota;

    public function __construct(
        ?int $id = null,
        string $titulo = '',
        string $autor = '',
        string $status = 'quero_ler',
        ?string $createdAt = null,
        ?int $nota = null
    ) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->status = $status;
        $this->createdAt = $createdAt;
        $this->nota = $nota;
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
}