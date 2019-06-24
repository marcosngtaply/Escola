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
        if($id = null){

            $sql = "SELECT * FROM escola.alunos";

            $stmt = $this->getConnect()->prepare($sql);

            $stmt->execute();
            return $stmt->fetchAll(\PDO::FETCH_ASSOC);
        } else {
            $sql = "traz Join";
        }
    }

    public function ListAlunos(): array
    {
        // SQL select
        $sql = "SELECT al.id, al.matricula, ps.nome, ps.cpf, al.telefone FROM alunos al INNER JOIN
    pessoas ps ON al.pessoa = ps.id";


        // Criar statement
        $stmt = $this->getConnect()->prepare($sql);
        $stmt->execute();

        $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $alunos;
    }
}