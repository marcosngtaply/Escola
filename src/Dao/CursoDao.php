<?php


namespace App\Dao;

use App\Model\Curso;
use PDO;
use PDOException;

class CursoDao extends Curso
{
    use Connect;

    public function save(): int
    {
        $sql = "INSERT INTO escola.cursos (nome, capacidade) VALUES (:nomeCurso, :capacidade)";

        try {
            $stmtCurso = $this->getConnect()->prepare($sql);
            $stmtCurso->bindValue(':nomeCurso', $this->getNome());
            $stmtCurso->bindValue(':capacidade', $this->getCapacidade());

            $stmtCurso->execute();
            return $this->getDanielId();

        } catch (PDOException $evento){

            return false;
        }

        //$stmt->debugDumpParams();
    }

    public function ListCursos(): array
    {
        // SQL select
        $sql = "SELECT * FROM escola.cursos ORDER BY id";


        // Criar statement
        $stmt = $this->getConnect()->prepare($sql);
        $stmt->execute();

        $cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $cursos;
    }
}