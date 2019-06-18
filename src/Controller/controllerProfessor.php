<?php
header("Content-Type: application/json");
use App\Dao\PessoaDao;
use App\Dao\ProfessorDao;


if(!isset($_POST['excluir'])){

    $pessoa = new PessoaDao();
        $pessoa->setNome($_POST['nomeProfessor'] == '' ? null : $_POST['nomeProfessor'])
        ->setCpf($_POST['cpfProfessor'] == '' ? null : $_POST['cpfProfessor'])
        ->setSexo($_POST['sexoProfessor'] == '' ? null : $_POST['sexoProfessor']);

    $professor = new ProfessorDao();
        $professor->setPessoa($pessoa)
        ->setSalario($_POST['salario'] == '' ? null : $_POST['salario'])
        ->setMatricula($_POST['matriculaProfessor'] == '' ? null : $_POST['matriculaProfessor'])
        ->setIngresso($_POST['ingresso'] == '' ? null : $_POST['ingresso']);

        $professor->save();

        if($pessoa->getDanielId() > 0){
            $arr['status'] = true;
            $arr['msg'] = 'Cadastro do Professor ' . $pessoa->getNome() . ' foi salvo com sucesso!';
        } else {
            $arr['status'] = false;
            $arr['msg'] = 'Cadastro do Professor não pôde ser salvo!';
        }
        echo json_encode($arr);

} else {

}