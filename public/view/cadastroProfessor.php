<?php
include_once 'components/header.php';
include_once 'components/menu.php';


?>
<form action="#">
<script src="../assets/js/utilsProfessor.js"></script>
<div class="col-md-12">
    <div class="col-md-12 text-center mt-5">
        <h2>Cadastro de Professores</h2>
    </div>
</div> <br>
<div class="container border mt-3">
    <div class="col-md-2 mt-2">
        <fieldset disabled>
            <label for="id">Id: </label>
            <input class="form-control form-control-sm" type="text" name="id" id="id" value="">
        </fieldset>
        <input type="hidden">
    </div>
    <div class="row col-md-12 mt-4">
        <div class="col-md-4">
            <label for="nomeProfessor">Nome: </label>
            <input type="text" class="form-control form-control-sm required" id="nomeProfessor" name="nomeProfessor">
        </div>
        <div class="col-md-4">
            <label for="cpfProfessor">Cpf: </label>
            <input type="text" class="form-control form-control-sm required" id="cpfProfessor" name="cpfProfessor">
        </div>
        <div class="col-md-2">
            <label for="sexoProfessor">Sexo: </label>
            <select class="form-control form-control-sm required" name="sexoProfessor" id="sexoProfessor">Selecione
                <option value="" selected>Selecione
                </option>
                <option value="Feminino">Feminino</option>
                <option value="Masculino">Masculino</option>
            </select>
            <br>
        </div>
    </div>
    <div class="row col-md-12">
        <div class="col-md-4">
            <label for="matriculaProfessor">Matricula: </label>
            <input type="text" class="form-control form-control-sm required" id="matriculaProfessor" name="matriculaProfessor">
        </div>
        <div class="col-md-4">
            <label for="salario">Salario: </label>
            <input type="text" class="form-control form-control-sm required" id="salario" name="salario">
        </div>
        <div class="col-md-4">
            <label for="ingresso">Ingresso: </label>
            <input type="date" class="form-control form-control-sm required" id="ingresso" name="ingresso">
            <br>
        </div>
    </div>
</div>
<div class="form-control-sm text-center mt-2">
    <button class="btn btn-primary btn-sm" onclick="saveProf()" type="button" id="salvar" name="salvar">
        <i class="fas fa-plus"></i> Salvar
    </button>
    <a href="home.php" id="voltar" name="voltar" type="button" class="btn btn-secondary btn-sm">
        <i class="fas fa-undo-alt"></i> Voltar
    </a>
</div>
</form>


<?php
include_once 'components/footer.php';
?>
