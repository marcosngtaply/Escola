<div v-if="isListagem">
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
                    <tr class="form-control-sm text-center" v-for="item in dados">
                        <td>{{ item.matricula }}</td>
                        <td>{{ item.nome }}</td>
                        <td>{{ item.cpf }}</td>
                        <td>{{ item.telefone }}</td>
                        <td>
                            <button onclick="" class="btn btn-success btn-sm">
                                <i class="far fa-eye"></i>
                            </button>
                            <button type="button" onclick="editAluno()" class="btn btn-warning btn-sm" id="editar">
                                <i class="far fa-edit"></i>
                            </button>
                            <button onclick="" class="btn btn-danger btn-sm" id="excluir">
                                <i class="far fa-trash-alt"></i>
                            </button>

                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
