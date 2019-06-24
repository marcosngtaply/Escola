<?php
header("Content-Type: application/json");
use App\Dao\CursoDao;


if(!isset($_POST['excluir'])){

    $curso = new CursoDao();
    $curso->setNome($_POST['nomeCurso'] == '' ? null : $_POST['nomeCurso'])
        ->setCapacidade($_POST['capacidade'] == '' ? null : $_POST['capacidade']);

    $danielId = $curso->save();

    if($danielId > 0){
        $arr['status'] = true;
        $arr['msg'] = 'Cadastro do Curso ' . $curso->getNome() . ' foi salvo com sucesso!';
    } else {
        $arr['status'] = false;
        $arr['msg'] = 'Cadastro do Curso não pôde ser salvo!';
    }
    echo json_encode($arr);

} else {

}