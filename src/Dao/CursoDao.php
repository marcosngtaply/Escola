<?php


namespace App\Dao;

use App\Model\Curso;

class CursoDao extends Curso
{
    use Connect;

    public function save(): int
    {
//        $sql = "INSERT INTO escola.curso (nome, capacidade, professor, ativo) VALUES (:nome, :capacidade, :professor, :ativo)";
        $sql = "INSERT INTO escola.cursos (nome, capacidade) VALUES (:nome, :capacidade)";

        $stmtCurso = $this->getConnect()->prepare($sql);
        $stmtCurso->bindValue(':nomeCurso', $this->getNome());
        $stmtCurso->bindValue(':capacidade', $this->getCapacidade());
//        $stmt->bindValue(':professor', $this->getProfessor());
//        $stmt->bindValue(':ativo', $this->getAtivo());

        $stmtCurso->execute();

        return $this->getDanielId();
        //$stmt->debugDumpParams();
    }
}