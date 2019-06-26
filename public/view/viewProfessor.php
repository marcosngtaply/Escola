<?php
include_once 'components/header.php';
include_once 'components/menu.php';

use App\Dao\ProfessorDao;

$professores = new ProfessorDao();

$arrProfessores = $professores->ListProf();

?>
<div class="col-md-12 text-center mt-5">
        <h2>Professores Cadastrados</h2>
</div>
<br>
<div class="container border">
    <div class="form-control-sm mt-4">
        <div class="col-md-12 text-right">
            <a href="home.php" id="voltar" name="voltar" type="button" class="btn btn-primary btn-sm">
                <i class="fas fa-undo-alt"></i> Voltar à página principal
            </a>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-md-12">
            <table class="form-control-sm table table-sm table-striped table-hover">
                <thead class="thead-dark">
                <tr class="text-center">
                    <th>Matricula</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Sexo</th>
                    <th>Ingresso</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php for ($i = 0; $i < count($arrProfessores); $i++) { ?>
                    <tr class="text-center">
                        <td>
                            <?= $arrProfessores[$i]['matricula'] ?>

                        </td>
                        <td>
                            <?= $arrProfessores[$i]['nome'] ?>

                        </td>
                        <td>
                            <?= $arrProfessores[$i]['cpf'] ?>

                        </td>
                        <td>
                            <?php if ($arrProfessores[$i]['sexo'] == 'F'){ ?>
                                Feminino
                            <?php } else { ?>
                                Masculino
                            <?php } ?>
                        </td>
                        <td>
                            <?= $arrProfessores[$i]['ingresso'] ?>

                        </td>
                        <td>
                            <a href="cadastroProfessor.php?id=<?= $arrProfessores[$i]['id'] ?>" class="btn btn-warning btn-sm" id="editar" >
                                <i class="fas fa-edit"></i>
                            </a>
                            <button onclick="deleteProf(<?= $arrProfessores[$i]['id'] ?>)" class="btn btn-danger btn-sm" id="excluir" type="button" >
                                <i class="fas fa-trash-alt"></i>
    <!--                            onclick="deleteProf(--><?//= $arrProfessores[$i]['id'] ?><!--)"-->
                            </button>
                            <button class="btn btn-success btn-sm" id="verificar" data-toggle="modal" data-target="#modalView">
                                <i class="fas fa-user-check"></i>
    <!--                            onclick="showProf(--><?//= $arrProfessores[$i]['id'] ?><!--)"-->
                            </button>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include_once 'components/footer.php';
?>
