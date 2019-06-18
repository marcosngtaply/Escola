<?php

namespace App\Dao;


use App\Model\Pessoa;

class PessoaDao extends Pessoa
{
   use Connect;


    public function save(): int
    {
        $sql = "INSERT INTO escola.pessoas (nome, cpf, sexo) VALUES (:nome, :cpf, :sexo)";

            $stmt = $this->getConnect()->prepare($sql);
            $stmt->bindValue(':nome', $this->getNome());
            $stmt->bindValue(':cpf', $this->getCpf());
            $stmt->bindValue(':sexo', $this->getSexo());

            $stmt->execute();

            return $this->getDanielId();

    }


}