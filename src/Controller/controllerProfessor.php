<?php
header("Content-Type: application/json");
use App\Dao\PessoaDao;
use App\Dao\ProfessorDao;

$pessoa = new PessoaDao();
$professor = new ProfessorDao();

if (isset($_GET['nextId'])) { //traz o proximo ID para o campo ID na hra do cadastro

    echo json_encode($professor->getNextId());
    exit;
}

if(isset($_GET['getData'])){ //traz todas as informações do ID empecífico

    echo json_encode($professor->getData($_GET['id']));
    exit;
}

if(!isset($_POST['excluir'])){  //SE NAO FOR SETADO EXCLUIR

        $pessoa->setNome($_POST['nomeProfessor'] == '' ? null : $_POST['nomeProfessor'])
        ->setCpf($_POST['cpfProfessor'] == '' ? null : $_POST['cpfProfessor'])
        ->setSexo($_POST['sexoProfessor'] == '' ? null : $_POST['sexoProfessor']);

        $professor->setPessoa($pessoa)
        ->setSalario($_POST['salario'] == '' ? null : $_POST['salario'])
        ->setMatricula($_POST['matriculaProfessor'] == '' ? null : $_POST['matriculaProfessor'])
        ->setIngresso($_POST['ingresso'] == '' ? null : $_POST['ingresso']);

    if (isset($_POST['editar'])) {  //PARTE DE EDIÇÂO

        $professor->setId($_POST['idProfessor']);
        $professor->getPessoa()->setId($_POST['idPessoa']);

        $confirmacao = $professor->editProf();

        if($confirmacao){
            $arr['status'] = true;
            $arr['msg'] = 'Cadastro do Professor ' . $pessoa->getNome() . ' foi salvo com sucesso!';
        } else {
            $arr['status'] = false;
            $arr['msg'] = 'Cadastro do Professor não foi alterado!';
        }

    } else { // QUANDO FOR SALVAR

        $confirmacao = $professor->saveProf();
//         var_dump($confirmacao);
        if($confirmacao == true){
            $arr['status'] = true;
            $arr['msg'] = 'Cadastro do Professor ' . $pessoa->getNome() . ' foi salvo com sucesso!';
        } else {
            $arr['status'] = false;
            $arr['msg'] = 'Cadastro do Professor não pôde ser salvo!';
        }
    }

    echo json_encode($arr);

} else {

    $idPessoa = $_POST['id'];
    $professor->setPessoa($pessoa);
    $confirmacao = $professor->deleteProf($idPessoa);

    // $confirmacao = (new ProfessorDao())->deleteProf($_POST['id']);

    if($confirmacao){
        $arr['status'] = true;
        $arr['mensagem'] = "Professor excluído com sucesso!";
    } else {
        $arr['status'] = false;
        $arr['mensagem'] = "Professor não pôde ser exluído do sistema!";
    }
    echo json_encode($arr);

}