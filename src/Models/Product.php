<?php 
namespace App\Models;

class Product{
   public function __construct(
        private ?int $id = null,
        private string $nome = '',
        private string $descricao = "",
        private float $preco = 0.0,
        private int $quantidade = 0
    ) {}

    // Getters para lermos os dados
    public function getId(): ?int { return $this->id; }
    public function getNome(): string { return $this->nome; }
    public function getDescricao(): string { return $this->descricao; }
    public function getPreco(): float { return $this->preco; }
    public function getQuantidade(): int { return $this->quantidade; }

    // Regra útil: formatar para a tabela na tela
    public function getPrecoFormatado(): string
    {
        return 'R$ ' . number_format($this->preco, 2, ',', '.');
    }
    
}

?>