<?php
header("Content-Type: application/json");


use App\Dao\PessoaDao;
use App\Dao\AlunoDao;

if (isset($_GET['nextId'])) {
    $aluno = new AlunoDao();

    echo json_encode($aluno->getNextId());
    exit;
}



if(!isset($_POST['excluir'])){

    $pessoa = new PessoaDao();
    $pessoa->setNome($_POST['nomeAluno'] == '' ? null : $_POST['nomeAluno'])
        ->setCpf($_POST['cpfAluno'] == '' ? null : $_POST['cpfAluno'])
        ->setSexo($_POST['sexoAluno'] == '' ? null : $_POST['sexoAluno']);

    if (isset($_POST['editar'])) {
        $id = $_POST['id'];

        //PARTE DE EDIÇÂO



    } else {
        $aluno = new AlunoDao();
        $aluno->setPessoa($pessoa)
            ->setTelefone($_POST['telefone'] == '' ? null : $_POST['telefone'])
            ->setMatricula($_POST['matriculaAluno'] == '' ? null : $_POST['matriculaAluno']);

        $aluno->save();
    }

    if($pessoa->getDanielId() > 0){
        $arr['status'] = true;
        $arr['msg'] = 'Cadastro do Aluno ' . $pessoa->getNome() . ' foi salvo com sucesso!';
    } else {
        $arr['status'] = false;
        $arr['msg'] = 'Cadastro do Aluno não pôde ser salvo!';
    }
    echo json_encode($arr);

} else {
    //PARTE DE EXCLUSÃO
//$pessoa = new PessoaDao();

    $aluno = new AlunoDao();
    $idAluno = $_POST['id'];

    $result = $aluno->deleteAluno($idAluno);

    // $result = (new AlunoDao())->deleteAluno($_POST['id']);

    if($result > 0){
        $arr['status'] = true;
        $arr['mensagem'] = "Aluno excluído com sucesso!";
    } else {
        $arr['status'] = false;
        $arr['mensagem'] = "Aluno não pôde ser exluído do sistema!";
    }
    echo json_encode($arr);
}
