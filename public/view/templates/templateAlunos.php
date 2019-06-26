<div>
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
                <input type="text" v-model="nomeAluno" class="form-control form-control-sm required" id="nomeAluno" name="nomeAluno">
            </div>
            <div class="col-md-4">
                <label for="cpfAluno">Cpf: </label>
                <input type="text" v-model="cpfAluno" class="form-control form-control-sm required" id="cpfAluno" name="cpfAluno">
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
                <input type="text" v-model="matriculaAluno" class="form-control form-control-sm required" id="matriculaAluno" name="matriculaAluno">
            </div>
            <div class="col-md-4">
                <label for="telefone">Telefone: </label>
                <input type="text" v-model="telefone" class="form-control form-control-sm required" id="telefone" name="telefone">
                <br>
            </div>
        </div>
    </div>
    <div class="form-control-sm text-center mt-2">
        <button @click="saveAluno" class="btn btn-primary btn-sm" type="button" id="salvar" name="salvar">
            <i class="fas fa-plus"></i> Salvar
        </button>
        <a href="home.php" class="btn btn-secondary btn-sm">
            <i class="fas fa-undo-alt"></i> Voltar
        </a>
    </div>
</div>
