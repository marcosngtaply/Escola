<?php


namespace App\Dao;

use App\Model\Professor;

class ProfessorDao extends Professor
{
    use Connect;

    public function save(): int
    {
        $sqlProfessor = "INSERT INTO escola.professores (matricula, ingresso, salario, pessoa) VALUES (:matricula, :ingresso, :salario, :pessoa)";

        $this->initTransaction();

        try{

            $idPessoa = $this->getPessoa()->save();

            $stmtProfessor = $this->getConnect()->prepare($sqlProfessor);
            $stmtProfessor->bindValue(':matricula', $this->getMatricula());
            $stmtProfessor->bindValue(':ingresso', $this->getIngresso());
            $stmtProfessor->bindValue(':salario', $this->getSalario());
            $stmtProfessor->bindValue(':pessoa', $idPessoa);

            $stmtProfessor->execute();
            $this->commitTransaction();

            return $this->getDanielId();

        } catch (\PDOException $evento){

            $this->rollbackTransaction();
        }

    }
}