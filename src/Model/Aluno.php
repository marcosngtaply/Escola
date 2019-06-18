<?php

namespace App\Model;


use App\Dao\PessoaDao;

class Aluno
{
    /**
     * @var Pessoa $pessoa
     */
    private $pessoa;
    /**
     * @var int $id
     */
    private $id;
    /**
     * @var int $matricula
     */
    private $matricula;
    /**
     * @var int $telefone
     */
    private $telefone;


    /**
     * @return Pessoa
     */
    public function getPessoa(): PessoaDao
    {
        return $this->pessoa;
    }

    /**
     * @param Pessoa $pessoa
     * @return Aluno
     */
    public function setPessoa(Pessoa $pessoa): Aluno
    {
        $this->pessoa = $pessoa;
        return $this;
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
     * @return Aluno
     */
    public function setId(int $id): Aluno
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getMatricula(): int
    {
        return $this->matricula;
    }

    /**
     * @param int $matricula
     * @return Aluno
     */
    public function setMatricula(int $matricula): Aluno
    {
        $this->matricula = $matricula;
        return $this;
    }

    /**
     * @return int
     */
    public function getTelefone(): int
    {
        return $this->telefone;
    }

    /**
     * @param int $telefone
     * @return Aluno
     */
    public function setTelefone(int $telefone): Aluno
    {
        $this->telefone = $telefone;
        return $this;
    }


}