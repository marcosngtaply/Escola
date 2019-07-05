<?php


namespace App\Dao;

use App\Model\Professor;
use PDO;
use PDOException;

class ProfessorDao extends Professor
{
    use Connect;

    public function saveProf(): bool
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

            return $stmtProfessor->rowCount() > 0;

        } catch (\PDOException $evento){

            $this->rollbackTransaction();
        }

    }

    public function deleteProf($id): bool
    {
        return $this->getPessoa()->delete($id);
    }

    public function editProf(): bool
    {
        $sql = 'UPDATE professores SET matricula = :matriculaProf, salario = :salario, ingresso = :ingresso WHERE id = :id';

        try {
            $editouPessoa = $this->getPessoa()->edit();

            $stmtProf = $this->getConnect()->prepare($sql);
            $stmtProf->bindValue(':matriculaProf' , $this->getMatricula());
            $stmtProf->bindValue(':salario', $this->getSalario());
            $stmtProf->bindValue(':ingresso', $this->getIngresso());
            $stmtProf->bindValue(':id', $this->getId());
            $stmtProf->execute();

            //$stmt->debugDumpParams();
            $editouProfessor = $stmtProf->rowCount() > 0;

            return $editouProfessor || $editouPessoa;
        } catch(PDOException $evento) {

            return false;
        }
    }
    public function getNextId(): array
    {
        $sql = "SELECT Max(id) + 1 AS nextId FROM escola.professores";

        $stmt = $this->getConnect()->prepare($sql);

        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_ASSOC);

    }
    public function getData($id = null)
    {
        if ($id == 0) {
            $sql = 'SELECT pro.id, pro.matricula, pro.ingresso, pro.salario, pro.pessoa, pe.nome, pe.cpf, pe.sexo FROM professores pro INNER JOIN pessoas pe ON pro.pessoa = pe.id';
        } else {
            $sql = 'SELECT pro.id, pro.matricula, pro.ingresso, pro.salario, pro.pessoa, pe.nome, pe.cpf, pe.sexo FROM professores pro INNER JOIN pessoas pe ON pro.pessoa = pe.id WHERE pro.id = :id';
        }

        $stmt = $this->getConnect()->prepare($sql);

        if ($id != 0) {
            $stmt->bindValue(':id', $id);
        }

        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

}