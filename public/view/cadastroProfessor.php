<?php
include_once 'components/header.php';
include_once 'components/menu.php';


?>
<div class="container" id="app">
    <cadastro
            :professor="<?= isset($_GET['id']) ? $_GET['id'] : 0 ?>"
            :listagem="<?= isset($_GET['listar']) ? 1 : 0 ?>"
    >
    </cadastro>
    <listar
            :listagem="<?= isset($_GET['listar']) ? 1 : 0 ?>"
    >
    </listar>
</div>

<template id="templateCadastroProfessores">
    <?php require_once 'templates/templateProfessores.php' ?>
</template>
<template id="templateViewProfessor">
    <?php require_once 'templates/templateViewProfessor.php' ?>
</template>

<script src="../assets/vuejs/componentes/viewProfessor.vue.js"></script>
<script src="../assets/vuejs/componentes/cadastroProfessor.vue.js"></script>
<script src="../assets/vuejs/professor.vue.js"></script>
<script src="../assets/js/utilsProfessor.js"></script>
<?php include_once 'components/footer.php' ?>
