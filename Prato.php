<?php

Class Prato{
    private int $numero;
    private string $nome;
    private float $valor;

    public function __construct($numero, $nome, $valor)
    {
        $this->numero = $numero;
        $this->nome = $nome;
        $this->valor = $valor;
    }

    public function getNumero(): int
    {
        return $this->numero;
    }

    public function setNumero(int $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getValor(): float
    {
        return $this->valor;
    }

    public function setValor(float $valor): self
    {
        $this->valor = $valor;

        return $this;
    }
}