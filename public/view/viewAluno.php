<?php
include_once 'components/header.php';
include_once 'components/menu.php';



?>
<div class="col-md-12 text-center mt-5">
    <h2>Alunos Cadastrados</h2>
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
                    <th>Telefone</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <!--            --><?php //for ($i = 0; $i < count($professores); $i++) { ?>
                <tr class="text-center">
                    <td>
                        <!--                    --><?//= $professores[$i]['id'] ?>
                        2365897-4
                    </td>
                    <td>
                        <!--                    --><?//= $professores[$i]['nomePessoa'] ?>
                        João
                    </td>
                    <td>
                        <!--                    --><?//= $professores[$i]['telefone'] ?>
                        700746101-20
                    </td>
                    <td>
                        <!--                        --><?//= $professores[$i]['telefone'] ?>
                        (62) 98264-5896
                    </td>
                    <td>
                        <!--                        <a href="novo.php?id=--><?//= $professores[$i]['id'] ?><!--" class="btn btn-warning btn-sm" id="editar" >-->
                        <!--                            <i class="fas fa-edit"></i>-->
                        <!--                        </a>-->
                        <button href="control.php" class="btn btn-danger btn-sm" id="excluir" >
                            <i class="fas fa-trash-alt"></i>
                            <!--                            onclick="deletePerson(--><?//= $professores[$i]['id'] ?><!--)"-->
                        </button>
                        <button class="btn btn-success btn-sm" id="verificar" data-toggle="modal" data-target="#modalView">
                            <i class="fas fa-user-check"></i>
                            <!--                            onclick="showForm(--><?//= $professores[$i]['id'] ?><!--)"-->
                        </button>
                    </td>
                </tr>
                <!--            --><?php //} ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
include_once 'components/footer.php';
?>