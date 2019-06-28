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
                                <button @click="mostrarAluno(item.id)" class="btn btn-success btn-sm" id="verificar"
                                        data-toggle="modal" data-target="#modalAluno"> <i class="far fa-eye"></i>
                                </button>
                                <button type="button" @click="editAluno(item.id)" class="btn btn-warning btn-sm" id="editar">
                                    <i class="far fa-edit"></i>
                                </button>
                                <button @click="deleteAluno(item.pessoa)" class="btn btn-danger btn-sm" id="excluir">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div>
            <div class="modal fade" id="modalAluno" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle">Aluno -
                                {{ pessoa.nome }}
                            </h5>
                            <button type="button" class="Fechar" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
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
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--    MODAL PARA MOSTRAR ALUNOS-->
<!--        <div v-for="pessoa in dados">-->
<!--            <div class="modal fade" id="modalAluno" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">-->
<!--                <div class="modal-dialog modal-dialog-centered" role="document">-->
<!--                    <div class="modal-content">-->
<!--                        <div class="modal-header">-->
<!--                            <h5 class="modal-title" id="exampleModalCenterTitle">Aluno --->
<!--                                {{ person.nome }}-->
<!--                            </h5>-->
<!--                            <button type="button" class="Fechar" data-dismiss="modal" aria-label="Close">-->
<!--                                <span aria-hidden="true">&times;</span>-->
<!--                            </button>-->
<!--                        </div>-->
<!--                        <div class="modal-body">-->
<!--                            <table class="table table-sm table-striped table-hover">-->
<!--                                <tr>-->
<!--                                    <th>Id:-->
<!--                                        <td>-->
<!--                                        {{ person.id }}-->
<!--                                        </td>-->
<!--                                    </th>-->
<!--                                </tr>-->
<!--                                <tr>-->
<!--                                    <th>Número da matrícula:-->
<!--                                        <td>-->
<!--                                        {{ person.matricula }}-->
<!--                                        </td>-->
<!--                                    </th>-->
<!--                                </tr>-->
<!--                                <tr>-->
<!--                                    <th>Cpf:-->
<!--                                        <td>-->
<!--                                        {{ person.cpf }}-->
<!--                                        </td>-->
<!--                                    </th>-->
<!--                                </tr>-->
<!--                                <tr>-->
<!--                                    <th>Telefone:-->
<!--                                        <td>-->
<!--                                            {{ person.telefone }}-->
<!--                                        </td>-->
<!--                                    </th>-->
<!--                                </tr>-->
<!--                                <tr>-->
<!--                                    <th>Sexo:-->
<!--                                        <td>-->
<!--                                            {{ person.sexo }}-->
<!--                                        </td>-->
<!--                                    </th>-->
<!--                                </tr>-->
<!--                            </table>-->
<!--                        </div>-->
<!--                        <div class="modal-footer">-->
<!--                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
</div>
