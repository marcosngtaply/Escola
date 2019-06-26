<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="home.php">
        <img src="../assets/images/tecnologia.png" id="logoTop">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false"><i class="fas fa-chalkboard-teacher"></i> Professores</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="cadastroProfessor.php"><i class="fas fa-plus"></i> Novo</a>
                    <a class="dropdown-item" href="viewProfessor.php"><i class="far fa-list-alt"></i> Listar Professores</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-chalkboard-teacher"></i> Atribuir turma</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false"><i class="fas fa-user-graduate"></i> Alunos</a>
                <div class="dropdown-menu" aria-labelledby="dropdown02">
                    <a class="dropdown-item" href="cadastroAluno.php"><i class="fas fa-plus"></i> Novo</a>
                    <a class="dropdown-item" href="cadastroAluno.php"><i class="far fa-list-alt"></i> Listar Alunos</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-user-check"></i> Matricular</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false"><i class="fas fa-users"></i> Turmas</a>
                <div class="dropdown-menu" aria-labelledby="dropdown03">
                    <a class="dropdown-item" href="cadastroCurso.php"><i class="fas fa-plus"></i> Nova</a>
                    <a class="dropdown-item" href="viewCurso.php"><i class="far fa-list-alt"></i> Listar Turmas</a>
                    <a class="dropdown-item" href="#"><i class="fab fa-slideshare"></i> Listar Alunos</a>
                </div>
            </li>

        </ul>
    </div>
</nav>