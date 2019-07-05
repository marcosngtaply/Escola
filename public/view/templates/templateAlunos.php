<div v-if="listagem === 0">
    <div class="col-md-12">
        <div class="col-md-12 text-center mt-5">
            <h2 v-if="!isEdit">Cadastro de Alunos</h2>
            <h2 v-else>Edição de Alunos</h2>
        </div>
    </div>
    <div class="alert alert-dismissible fade show" :class="[erroCadastro ? 'alert-danger' : 'alert-success']" role="alert" v-if="statusCadastro">
        <strong v-if="!erroCadastro">Sucesso!</strong>
        <strong v-else >Erro!</strong>
        {{ mensagem }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
        <div class="container border mt-3">
            <div class="col-md-2 mt-2">
                <fieldset disabled>
                    <label for="id">Id: </label>
                    <input class="form-control form-control-sm" v-model="id" type="text" name="id" id="id" value="">
                </fieldset>
                <input type="hidden">
            </div>
            <div class="row col-md-12 mt-4">
                <div class="col-md-4">
                    <label for="nomeAluno">Nome: </label>
                    <input type="text" v-model="nomeAluno" placeholder="Nome do Aluno" class="form-control form-control-sm required" id="nomeAluno" name="nomeAluno">
                </div>
                <div class="col-md-4">
                    <label for="cpfAluno">Cpf: </label>
                    <input type="text" v-model="cpfAluno" placeholder="Cpf do Aluno" class="form-control form-control-sm required" id="cpfAluno" name="cpfAluno">
                </div>
                <div class="col-md-2">
                    <label for="sexoAluno">Sexo: </label>
                    <select v-model="sexoAluno" class="form-control form-control-sm required" name="sexoAluno" id="sexoAluno">Selecione
                        <option v-for="item in sexoLista" :value="item.valor"> {{ item.texto }}</option>
                    </select>
                    <br>
                </div>
            </div>
            <div class="row col-md-12">
                <div class="col-md-4">
                    <label for="matriculaAluno">Matricula: </label>
                    <input type="text" v-model="matriculaAluno" placeholder="Matricula do Aluno" class="form-control form-control-sm required" id="matriculaAluno" name="matriculaAluno">
                </div>
                <div class="col-md-4">
                    <label for="telefone">Telefone: </label>
                    <input type="text" v-model="telefone" placeholder="Telefone do Aluno" class="form-control form-control-sm required" id="telefone" name="telefone">
                    <br>
                </div>
            </div>
        </div>
    <div class="form-control-sm text-center mt-2">
<!--       Dentro do Cadastro-->
        <button v-if="!isEdit" @click="saveAluno" class="btn btn-primary btn-sm" type="button" id="salvar" name="salvar">
            <i class="fas fa-plus"></i> Salvar
        </button>
<!--        Dentro da Edição-->
        <button v-else @click="editAluno" class="btn btn-warning btn-sm" type="button" id="editar" name="editar">
            <i class="fas fa-plus"></i> Editar
        </button>
<!--       Dentro do Cadastro-->
        <a v-if="!isEdit" href="home.php" class="btn btn-outline-secondary btn-sm">
            <i class="fas fa-undo-alt"></i> Voltar
        </a>
<!--        Dentro da Edição-->
        <a v-else href="cadastroAluno.php?listar" class="btn btn-outline-secondary btn-sm">
            <i class="fas fa-undo-alt"></i> Voltar
        </a>
    </div>
</div>
