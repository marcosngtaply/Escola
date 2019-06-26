<?php
include_once 'components/header.php';
include_once 'components/menu.php';

?>
<div class="container" id="app">
    <div class="col-md-12">
        <div class="col-md-12 text-center mt-5">
            <h2>Cadastro de Alunos</h2>
        </div>
    </div> <br>
    <cadastro :aluno="<?= isset($_GET['id']) ? $_GET['id'] : 0 ?>" >

            :listagem="<?= isset($_GET['listar']) ? true : false ?>"
    </cadastro>
    <listar>
        :listagem="<?= isset($_GET['listar']) ? true : false ?>"
    </listar>
</div>

<template id="templateCadastroAlunos">
    <?php require_once 'templates/templateAlunos.php' ?>
</template>

<template id="templateViewAluno">
    <?php require_once 'templates/templateViewAluno.php' ?>
</template>

<script src="../assets/vuejs/componentes/viewAluno.vue.js"></script>
<script src="../assets/vuejs/componentes/cadastroAluno.vue.js"></script>
<script src="../assets/js/utilsAluno.js"></script>
<script src="../assets/vuejs/aluno.vue.js"></script>
<?php include_once 'components/footer.php' ?>
