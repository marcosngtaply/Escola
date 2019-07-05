<div v-if="isListagem">
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
                    <tr class="form form-control-sm text-center" v-for="item in dados">
                        <td>
                            {{ item.matricula }}
                        </td>
                        <td>
                            {{ item.nome }}
                        </td>
                        <td>
                            {{ item.cpf }}
                        </td>
                        <td>
                            {{ item.sexo }}
                        </td>
                        <td>
                            {{ item.ingresso }}
                        </td>
                        <td>
                            <button @click="mostrarProf(item.id)" class="btn btn-success btn-sm" title="Visualizar" id="verificar"
                                    data-toggle="modal" data-target="#modalProf">
                                <i class="far fa-eye" style="font-size: smaller"></i>
                            </button>
                            <button type="button" @click="editProf(item.id)" class="btn btn-warning btn-sm" title="Editar" id="editar">
                                <i class="far fa-edit" style="font-size: smaller"></i>
                            </button>
                            <button @click="deleteProf(item.pessoa)" class="btn btn-danger btn-sm" title="Excluir" id="excluir">
                                <i class="far fa-trash-alt" style="font-size: smaller"></i>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<!--    MODAL PROFESSOR-->
    <div>
        <div class="modal fade" id="modalProf" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Professor -
                            {{ pessoa.nome }}
                        </h5>
                    </div>
                    <div class="modal-body">
                        <table class="table table-sm table-striped table-hover">
                            <tr>
                                <th>Id:
                                <td>{{ pessoa.id }}</td>
                                </th>
                            </tr>
                            <tr>
                                <th>Número da matrícula:
                                <td>{{ pessoa.matricula }}</td>
                                </th>
                            </tr>
                            <tr>
                                <th>Cpf:
                                <td>{{ pessoa.cpf }}</td>
                                </th>
                            </tr>
                            <tr>
                                <th>Ingresso:
                                <td>
                                    {{ pessoa.ingresso }}
                                </td>
                                </th>
                            </tr>
                            <tr>
                                <th>Sexo:
                                <td>{{ pessoa.sexo }}</td>
                                </th>
                            </tr>
                            <tr>
                                <th>Salário:
                                <td>{{ pessoa.salario }}</td>
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