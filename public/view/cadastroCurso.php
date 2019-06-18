<?php
include_once 'components/header.php';
include_once 'components/menu.php';

?>
    <script src="../assets/js/utilsCurso.js"></script>
    <div class="col-md-12">
        <div class="col-md-12 text-center mt-5">
            <h2>Cadastro de Cursos</h2>
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
                <label for="nomeCurso">Nome: </label>
                <input type="text" class="form-control form-control-sm" id="nomeCurso" name="nomeCurso">
            </div>
            <div class="col-md-2">
                <label for="capacidade">Capacidade: </label>
                <input type="text" class="form-control form-control-sm" id="capacidade" name="capacidade">
                <br>
            </div>
        </div>
    </div>
    <div class="form-control-sm text-center mt-2">
        <button class="btn btn-primary btn-sm" onclick="saveCurso()" type="button" id="salvar" name="salvar">
            <i class="fas fa-plus"></i> Salvar
        </button>
        <a href="home.php" id="voltar" name="voltar" type="button" class="btn btn-secondary btn-sm">
            <i class="fas fa-undo-alt"></i> Voltar
        </a>
    </div>

<?php
include_once 'components/footer.php';
?>