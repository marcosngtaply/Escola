<?php
include_once 'components/header.php';
include_once 'components/menu.php';

use App\Dao\PessoaDao;
use App\Dao\ProfessorDao;
?>

<main role="main">

  <!-- Main jumbotron for a primary marketing message or call to action -->
  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3 text-center">INSIGHT Tecnologia</h1>
      <p>Este é apenas um exemplo para compreensão da linguagem PHP. Neste módulo, iremos aprender detalhes de como implementar Orientação a Objetos e avançar um pouco mais na organização estrutural dos diretórios.</p>
      <p>Para melhor exemplificar, iremos construir um sistema de Gestão Escolar. Acesso os módulos a partir dos menus na parte superior, ou clicando no botão referente à opção desejada abaixo:</p>
      <p class="text-center"><a class="btn btn-primary btn-lg" href="#" role="button">Esse botão não faz nada <i class="fas fa-angry"></i></a></p>
    </div>
  </div>

<!--    --><?php
//
//    $pessoa = new PessoaDao();
//    $pessoa->setNome('teeeeesste');
//    $pessoa->setCpf(258963);
//    $pessoa->setSexo('M');
//
//    $pessoa->save();
//    ?>
<!--        --><?php
//
//        $professor = new ProfessorDao();
//
//        $professor->setIngresso(2005-05-05);
//        $professor->setMatricula(3658952);
//        $professor->setSalario(3500);
//        $professor->getPessoa(new PessoaDao(new \App\Model\Pessoa('Linguajar', 2365894, 'masculino')));
//
//        $professor->save();
//        ?>

  <div class="container">
    <!-- Example row of columns -->
    <div class="row">
      <div class="col-md-4">
        <h2>Professores</h2>
        <p style="text-align: justify">Clique abaixo para listar os professores e respectivos status (disponível = sem turma ou lotado = já lotado em turma)</p>
        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
      </div>
      <div class="col-md-4">
        <h2>Alunos</h2>
        <p style="text-align: justify">Clique abaixo para listar os alunos e respectivos status.</p>
        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
      </div>
      <div class="col-md-4">
        <h2>Turmas</h2>
        <p style="text-align: justify">Clique abaixo para listar as turmas e respectivos status.</p>
        <p><a class="btn btn-secondary" href="#" role="button">View details &raquo;</a></p>
      </div>
    </div>

    <hr>

  </div> <!-- /container -->

</main>

<?php
include_once 'components/footer.php';
?>
