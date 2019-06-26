<?php


namespace App\Dao;

use \App\Model\Aluno;
use PDO;

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

    public function getNextId(): array
    {
        $sql = "SELECT Max(id) + 1 AS nextId FROM escola.alunos";

        $stmt = $this->getConnect()->prepare($sql);

        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);

    }
    public function getData($id = null)
    {
        if ($id == null) {
            $sql = 'SELECT * FROM alunos al INNER JOIN pessoas pe ON al.pessoa = pe.id';

        } else {
            $sql = 'SELECT * FROM alunos al INNER JOIN pessoas pe ON al.pessoa = pe.id WHERE al.id = :id';

        }

        $stmt = $this->getConnect()->prepare($sql);

        if ($id != null) {
            $stmt->bindValue(':id', $id);
        }

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }


    public function deleteAluno($id): int
    {
        $sql = "DELETE FROM escola.pessoas WHERE id = (SELECT al.pessoa from alunos al inner join pessoas p on al.pessoa = p.id where al.id = :id)";

        $stmt = $this->getConnect()->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        return $stmt->rowCount();
    }

}