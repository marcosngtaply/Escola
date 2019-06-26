<?php
header("Content-Type: application/json");
use App\Dao\PessoaDao;
use App\Dao\ProfessorDao;

$pessoa = new PessoaDao();
$professor = new ProfessorDao();

if(!isset($_POST['excluir'])){

        $pessoa->setNome($_POST['nomeProfessor'] == '' ? null : $_POST['nomeProfessor'])
        ->setCpf($_POST['cpfProfessor'] == '' ? null : $_POST['cpfProfessor'])
        ->setSexo($_POST['sexoProfessor'] == '' ? null : $_POST['sexoProfessor']);

        $professor->setPessoa($pessoa)
        ->setSalario($_POST['salario'] == '' ? null : $_POST['salario'])
        ->setMatricula($_POST['matriculaProfessor'] == '' ? null : $_POST['matriculaProfessor'])
        ->setIngresso($_POST['ingresso'] == '' ? null : $_POST['ingresso']);

        $idProfessor = $professor->save();

        if($pessoa->getDanielId() > 0){
            $arr['status'] = true;
            $arr['msg'] = 'Cadastro do Professor ' . $professor->getPessoa()->getNome() . ' foi salvo com sucesso!';
        } else {
            $arr['status'] = false;
            $arr['msg'] = 'Cadastro do Professor não pôde ser salvo!';
        }
        echo json_encode($arr);

} else {
    $idPhp = $_POST['id'];
    $result = $professor->deleteProf($idPhp);

    if($result > 0){
        $arr['status'] = true;
        $arr['mensagem'] = "Professor " . $this->getPessoa()->getNome() . "excluído com sucesso!";
    } else {
        $arr['status'] = false;
        $arr['mensagem'] = "Professor " . $this->getPessoa()->getNome() . "não pôde ser exluído do sistema!";
    }
    echo json_encode($arr);

}