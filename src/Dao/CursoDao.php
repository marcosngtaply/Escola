<?php


namespace App\Dao;

use App\Model\Curso;

class CursoDao extends Curso
{
    use Connect;

    public function save(): int
    {
        $sql = "INSERT INTO escola.cursos (nome, capacidade) VALUES (:nomeCurso, :capacidade)";

        $this->initTransaction();
        try {
        $stmtCurso = $this->getConnect()->prepare($sql);
        $stmtCurso->bindValue(':nomeCurso', $this->getNome());
        $stmtCurso->bindValue(':capacidade', $this->getCapacidade());

        $stmtCurso->execute();
        $this->commitTransaction();
        return $this->getDanielId();
        } catch (\PDOException $evento){

            $this->rollbackTransaction();
        }

        //$stmt->debugDumpParams();
    }
}