<div v-if="listagem === 0">
    <div class="col-md-12">
        <div class="col-md-12 text-center mt-5">
            <h2 v-if="!isEdit">Cadastro de Professores</h2>
            <h2 v-else>Edição de Professores</h2>
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
                <label for="nomeProfessor">Nome: </label>
                <input type="text" v-model="nomeProfessor" class="form-control form-control-sm required" id="nomeProfessor" name="nomeProfessor">
            </div>
            <div class="col-md-4">
                <label for="cpfProfessor">Cpf: </label>
                <input type="text" v-model="cpfProfessor" class="form-control form-control-sm required" id="cpfProfessor" name="cpfProfessor">
            </div>
            <div class="col-md-2">
                <label for="sexoProfessor">Sexo: </label>
                <select v-model="sexoProfessor" class="form-control form-control-sm required" name="sexoProfessor" id="sexoProfessor">Selecione
                    <option v-for="item in sexoLista" :value="item.valor"> {{ item.texto }} </option>
                </select>
                <br>
            </div>
        </div>
        <div class="row col-md-12">
            <div class="col-md-4">
                <label for="matriculaProfessor">Matricula: </label>
                <input type="text" v-model="matriculaProfessor" class="form-control form-control-sm required" id="matriculaProfessor" name="matriculaProfessor">
            </div>
            <div class="col-md-4">
                <label for="salario">Salario: </label>
                <input type="text" v-model="salario" class="form-control form-control-sm required" id="salario" name="salario">
            </div>
            <div class="col-md-4">
                <label for="ingresso">Ingresso: </label>
                <input type="date" v-model="ingresso" class="form-control form-control-sm required" id="ingresso" name="ingresso">
                <br>
            </div>
        </div>
    </div>
    <div class="form-control-sm text-center mt-2">
<!--            DENTRO DE CADASTRO-->
        <button v-if="!isEdit" @click="saveProf" class="btn btn-primary btn-sm" type="button" id="salvar" name="salvar">
            <i class="fas fa-plus"></i> Salvar
        </button>
<!--        DENTRO DE EDIÇÃO-->
        <button v-else @click="editProf" class="btn btn-warning btn-sm" type="button" id="editar" name="editar">
            <i class="fas fa-plus"></i> Editar
        </button>
        <!--       Dentro do Cadastro-->
        <a v-if="!isEdit" href="home.php" class="btn btn-outline-secondary btn-sm">
            <i class="fas fa-undo-alt"></i> Voltar
        </a>
        <!--        Dentro da Edição-->
        <a v-else href="cadastroProfessor.php?listar" class="btn btn-outline-secondary btn-sm">
            <i class="fas fa-undo-alt"></i> Voltar
        </a>
    </div>
</div>