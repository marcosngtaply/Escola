<?php

namespace App\Model;

use App\Dao\PessoaDao;

class Professor
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
     * @var string $ingresso
     */
    private $ingresso;
    /**
     * @var float $salario
     */
    private $salario;

    /**
     * Professor constructor.
     * @param Pessoa $pessoa
     * @param int $matricula
     * @param string $ingresso
     * @param float $salario
     */

//    public function __construct(Pessoa $pessoa, int $matricula, string $ingresso, float $salario)
//    {
//        $this->pessoa = $pessoa;
//        $this->matricula = $matricula;
//        $this->ingresso = $ingresso;
//        $this->salario = $salario;
//    }



    /**
     * @return Pessoa
     */
    public function getPessoa(): PessoaDao
    {
        return $this->pessoa;
    }

    /**
     * @param Pessoa $pessoa
     * @return Professor
     */
    public function setPessoa(Pessoa $pessoa): Professor
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
     * @return Professor
     */
    public function setId(int $id): Professor
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
     * @return Professor
     */
    public function setMatricula(int $matricula): Professor
    {
        $this->matricula = $matricula;
        return $this;
    }

    /**
     * @return string
     */
    public function getIngresso(): string
    {
        return $this->ingresso;
    }

    /**
     * @param string $ingresso
     * @return Professor
     */
    public function setIngresso(string $ingresso): Professor
    {
        $this->ingresso = $ingresso;
        return $this;
    }

    /**
     * @return float
     */
    public function getSalario(): float
    {
        return $this->salario;
    }

    /**
     * @param float $salario
     * @return Professor
     */
    public function setSalario(float $salario): Professor
    {
        $this->salario = $salario;
        return $this;
    }


}