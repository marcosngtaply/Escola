<div v-if="isListagem">
    <div>
        <div class="col-md-12">
            <div class="col-md-12 text-center mt-5">
                <h2>Lista de Alunos</h2>
            </div>
        </div>
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
                                <button @click="mostrarAluno(item.id)" class="btn btn-success btn-sm" title="Visualizar" id="verificar"
                                        data-toggle="modal" data-target="#modalAluno">
                                    <i class="far fa-eye" style="font-size: smaller"></i>
                                </button>
                                <button type="button" @click="editAluno(item.id)" class="btn btn-warning btn-sm" title="Editar" id="editar">
                                    <i class="far fa-edit" style="font-size: smaller"></i>
                                </button>
                                <button @click="deleteAluno(item.pessoa)" class="btn btn-danger btn-sm" title="Excluir" id="excluir">
                                    <i class="far fa-trash-alt" style="font-size: smaller"></i>
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

<!--        MODAL ALUNO-->
        <div>
            <div class="modal fade" id="modalAluno" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Aluno -
                                {{ pessoa.nome }}
                            </h5>
                        </div>
                        <div class="modal-body">
                            <table class="table table-sm table-striped table-hover">
                                <tr>
                                    <th>Id:
                                    <td>
                                        {{ pessoa.id }}
                                    </td>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Número da matrícula:
                                    <td>
                                        {{ pessoa.matricula }}
                                    </td>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Cpf:
                                    <td>
                                        {{ pessoa.cpf }}
                                    </td>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Telefone:
                                    <td>
                                        {{ pessoa.telefone }}
                                    </td>
                                    </th>
                                </tr>
                                <tr>
                                    <th>Sexo:
                                    <td>
                                        {{ pessoa.sexo }}
                                    </td>
                                    </th>
                                </tr>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
