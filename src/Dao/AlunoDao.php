<?php


namespace App\Dao;

use \App\Model\Aluno;

class AlunoDao extends Aluno
{
    use Connect;

    public function save(): int
    {
        $sql = "INSERT INTO escola.alunos (matricula, telefone, pessoa) VALUES (:matricula, :telefone, :pessoa)";

        $this->initTransaction();

        try {

            $idPessoa = $this->getPessoa()->save();

            $stmtAluno = $this->getConnect()->prepare($sql);
            $stmtAluno->bindValue(':matricula', $this->getMatricula());
            $stmtAluno->bindValue(':telefone', $this->getTelefone());
            $stmtAluno->bindValue(':pessoa', $idPessoa);

            $stmtAluno->execute();
            $this->commitTransaction();

            return $this->getDanielId();

        } catch (\PDOException $evento){

            $this->rollbackTransaction();
        }

    }
}