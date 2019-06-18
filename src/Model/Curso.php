<?php

namespace App\Model;

class Curso
{
    /**
     * @var int $id
     */
    private $id;
    /**
     * @var
     */
    private $nome;
    /**
     * @var int
     */
    private $capacidade;
    /**
     * @var Professor $professor
     */
    private $professor;
    /**
     * @var array $alunos
     */
    private $alunos;
    /**
     * @var int $ativo
     */
    private $ativo;

    /**
     * Curso constructor.
     * @param int $id
     * @param $nome
     * @param int $capacidade
     * @param Professor $professor
     * @param array $alunos
     */
    public function __construct(int $id, $nome, int $capacidade, Professor $professor, array $alunos, int $ativo)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->capacidade = $capacidade;
        $this->professor = $professor;
        $this->alunos = $alunos;
        $this->ativo = $ativo;
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
     * @return Curso
     */
    public function setId(int $id): Curso
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     * @return Curso
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return int
     */
    public function getCapacidade(): int
    {
        return $this->capacidade;
    }

    /**
     * @param int $capacidade
     * @return Curso
     */
    public function setCapacidade(int $capacidade): Curso
    {
        $this->capacidade = $capacidade;
        return $this;
    }

    /**
     * @return Professor
     */
    public function getProfessor(): Professor
    {
        return $this->professor;
    }

    /**
     * @param Professor $professor
     * @return Curso
     */
    public function setProfessor(Professor $professor): Curso
    {
        $this->professor = $professor;
        return $this;
    }

    /**
     * @return array
     */
    public function getAlunos(): array
    {
        return $this->alunos;
    }

    /**
     * @param array $alunos
     * @return Curso
     */
    public function setAlunos(array $alunos): Curso
    {
        $this->alunos = $alunos;
        return $this;
    }

    /**
     * @return int
     */
    public function getAtivo(): int
    {
        return $this->ativo;
    }

    /**
     * @param int $ativo
     * @return Curso
     */
    public function setAtivo(int $ativo): Curso
    {
        $this->ativo = $ativo;
        return $this;
    }



}
