<div>
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
                    <tr v-for="item in dados">
                        <td>{{ dados.matricula }}</td>
                        <td>{{ dados.nome }}</td>
                        <td>{{ dados.cpf }}</td>
                        <td>{{ dados.telefone }}</td>
                        <td>BOTOES</td>
                    </tr>
<!--                    --><?php //for ($i = 0; $i < count($arrAlunos); $i++) { ?>
                        <tr class="text-center">
                            <td>
<!--                                --><?//= $arrAlunos[$i]['matricula'] ?>
                            </td>
                            <td>
<!--                                --><?//= $arrAlunos[$i]['nome'] ?>

                            </td>
                            <td>
<!--                                --><?//= $arrAlunos[$i]['cpf'] ?>
                            </td>
                            <td>
<!--                                --><?//= $arrAlunos[$i]['telefone'] ?>
                            </td>
                            <td>
                                <a href="cadastroAluno.php?id=" class="btn btn-warning btn-sm" id="editar" >
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" @click="deleteAluno()" class="btn btn-danger btn-sm" id="excluir" >
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                                <button class="btn btn-success btn-sm" id="verificar" data-toggle="modal" data-target="#modalView">
                                    <i class="fas fa-user-check"></i>
                                </button>
                            </td>
                        </tr>
<!--                    --><?php //} ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
