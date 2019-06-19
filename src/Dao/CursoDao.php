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

        $stmt = $this->getConnect()->prepare($sql);
        $stmt->bindValue(':nomeCurso', $this->getNome());
        $stmt->bindValue(':capacidade', $this->getCapacidade());
//        $stmt->bindValue(':professor', $this->getProfessor());
//        $stmt->bindValue(':ativo', $this->getAtivo());

        $stmt->execute();

        return $this->getDanielId();
        //$stmt->debugDumpParams();
    }
}