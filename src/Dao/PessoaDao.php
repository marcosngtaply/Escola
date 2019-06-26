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

    public function edit(): bool
    {
        $sql = 'UPDATE pessoas SET nome = :nome, cpf = :cpf, sexo = :sexo WHERE id = :id';

        $stmt = $this->getConnect()->prepare($sql);
        $stmt->bindValue(':nome', $this->getNome());
        $stmt->bindValue(':cpf', $this->getCpf());
        $stmt->bindValue(':sexo', $this->getSexo());
        $stmt->bindValue(':id', $this->getId());

        $stmt->execute();
        return $stmt->rowCount() > 0;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM escola.pessoas WHERE id = :id";

        $stmt = $this->getConnect()->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        return $stmt->rowCount() > 0;
    }


}