<?php

namespace App\Model;

class Pessoa
{

    /**
     * @var int $id
     */
    private $id;
    /**
     * @var string $nome
     */
    private $nome;
    /**
     * @var int cpf
     */
    private $cpf;
    /**
     * @var string $sexo
     */
    private $sexo;

    /**
     * Pessoa constructor.
     * @param string $nome
     * @param int $cpf
     * @param string $sexo
     */
    public function __construct(string $nome, int $cpf, string $sexo)
    {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->sexo = $sexo;
    }


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Pessoa
     */
    public function setId(int $id): Pessoa
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     * @return Pessoa
     */
    public function setNome(string $nome): Pessoa
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return int
     */
    public function getCpf(): int
    {
        return $this->cpf;
    }

    /**
     * @param int $cpf
     * @return Pessoa
     */
    public function setCpf(int $cpf): Pessoa
    {
        $this->cpf = $cpf;
        return $this;
    }

    /**
     * @return string
     */
    public function getSexo(): string
    {
        return $this->sexo;
    }

    /**
     * @param string $sexo
     * @return Pessoa
     */
    public function setSexo(string $sexo): Pessoa
    {
        $this->sexo = $sexo;
        return $this;
    }



}
