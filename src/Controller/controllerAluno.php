<?php
header("Content-Type: application/json");

use App\Dao\PessoaDao;
use App\Dao\AlunoDao;

$aluno = new AlunoDao();
$pessoa = new PessoaDao();

if (isset($_GET['nextId'])) { //traz o proximo ID para o campo ID na hra do cadastro

    echo json_encode($aluno->getNextId());
    exit;
}

if(isset($_GET['getData'])){ //traz todas as informações do ID empecífico

    echo json_encode($aluno->getData($_GET['id']));
    exit;
}

if(!isset($_POST['excluir'])){ //SE NAO FOR SETADO EXCLUIR

    $pessoa->setNome($_POST['nomeAluno'] == '' ? null : $_POST['nomeAluno'])
        ->setCpf($_POST['cpfAluno'] == '' ? null : $_POST['cpfAluno'])
        ->setSexo($_POST['sexoAluno'] == '' ? null : $_POST['sexoAluno']);

    $aluno->setPessoa($pessoa)
        ->setTelefone($_POST['telefone'] == '' ? null : $_POST['telefone'])
        ->setMatricula($_POST['matriculaAluno'] == '' ? null : $_POST['matriculaAluno']);

    if (isset($_POST['editar'])) {  //PARTE DE EDIÇÂO

        $aluno->setId($_POST['idAluno']);
        $aluno->getPessoa()->setId($_POST['idPessoa']);

        $confirmacao = $aluno->editAluno();

        if($confirmacao){
            $arr['status'] = true;
            $arr['msg'] = 'Cadastro do Aluno ' . $pessoa->getNome() . ' foi salvo com sucesso!';
        } else {
            $arr['status'] = false;
            $arr['msg'] = 'Cadastro do Aluno não foi alterado!';
        }

    } else { // QUANDO FOR SALVAR

        $confirmacao = $aluno->saveAluno();
//         var_dump($confirmacao);
        if($confirmacao == true){
            $arr['status'] = true;
            $arr['msg'] = 'Cadastro do Aluno ' . $pessoa->getNome() . ' foi salvo com sucesso!';
        } else {
            $arr['status'] = false;
            $arr['msg'] = 'Cadastro do Aluno não pôde ser salvo!';
        }
    }

    echo json_encode($arr);

} else { //PARTE DE EXCLUSÃO

    $idPessoa = $_POST['id'];
    $aluno->setPessoa($pessoa);
    $confirmacao = $aluno->deleteAluno($idPessoa);

    // $confirmacao = (new AlunoDao())->deleteAluno($_POST['id']);

    if($confirmacao){
        $arr['status'] = true;
        $arr['mensagem'] = "Aluno excluído com sucesso!";
    } else {
        $arr['status'] = false;
        $arr['mensagem'] = "Aluno não pôde ser exluído do sistema!";
    }
    echo json_encode($arr);
}
