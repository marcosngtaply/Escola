<?php


namespace App\Dao;

use App\Model\Professor;
use PDO;

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
    public function ListProf(): array
    {
        // SQL select
        $sql = "SELECT prof.id, prof.matricula, ps.nome, ps.cpf, ps.sexo, prof.ingresso FROM professores prof INNER JOIN
                pessoas ps ON prof.pessoa = ps.id";


        // Criar statement
        $stmt = $this->getConnect()->prepare($sql);
        $stmt->execute();

        $professores = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $professores;
    }

    public function deleteProf($id): int
    {
        $sql = "DELETE FROM escola.professores where id = :id";

        $idProfessor = $id;

        $stmt = $this->getConnect()->prepare($sql);
        $stmt->bindValue(':id', $idProfessor);
        $stmt->execute();

        return $stmt->rowCount();

    }
}