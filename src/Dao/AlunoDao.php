<?php


namespace App\Dao;

use \App\Model\Aluno;
use PDO;
use PDOException;

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

    public function deleteAluno($id): bool
    {
        return $this->getPessoa()->delete($id);
    }

    public function editAluno(): bool
    {
        $sql = 'UPDATE alunos SET matricula = :matriculaAluno, telefone = :telefone  WHERE id = :id';

        try {
            $editouPessoa = $this->getPessoa()->edit();

            $stmt = $this->getConnect()->prepare($sql);
            $stmt->bindValue(':matriculaAluno' , $this->getMatricula());
            $stmt->bindValue(':telefone', $this->getTelefone());
            $stmt->bindValue(':id', $this->getId());
            $stmt->execute();

            //$stmt->debugDumpParams();
            $editouAluno = $stmt->rowCount() > 0;

            return $editouAluno || $editouPessoa;
        } catch(PDOException $evento) {

            return false;
        }
    }

    public function getNextId(): array
    {
        $sql = "SELECT Max(id) + 1 AS nextId FROM escola.alunos";

        $stmt = $this->getConnect()->prepare($sql);

        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);

    }
    public function getData($id = null)
    {
        if ($id == 0) {
            $sql = 'SELECT al.id, al.matricula, al.telefone, al.pessoa, pe.nome, pe.cpf, pe.sexo FROM alunos al INNER JOIN pessoas pe ON al.pessoa = pe.id';
        } else {
            $sql = 'SELECT al.id, al.matricula, al.telefone, al.pessoa, pe.nome, pe.cpf, pe.sexo FROM alunos al INNER JOIN pessoas pe ON al.pessoa = pe.id WHERE al.id = :id';
        }

        $stmt = $this->getConnect()->prepare($sql);

        if ($id != 0) {
            $stmt->bindValue(':id', $id);
        }

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}