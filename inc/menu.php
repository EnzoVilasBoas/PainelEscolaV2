  <?php
  require('config/dbaSis.php');
  require('config/setSis.php');
  require('config/outSis.php');
  if(!empty($_SESSION['autUser']['id']) && ($_SESSION['autUser']['id'] != session_id())){
    $autUser = read('secretaria','WHERE id = "'.$_SESSION['autUser']['id'].'" AND nivel = 1');
    if($autUser->num_rows){
      foreach($autUser as $autUser);
      echo '"'
  ?>
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index.php" class="brand-link">
      <span class="brand-text font-weight-light" style="margin-left: 30px;">Escola Maria Ester</span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-1 d-flex">
        <div class="image">
          <img src="dist/img/Avatar.png" class="img-circle elevation-2" alt="IMAGEM DE USUARIO">
        </div>
        <?php
            /* Nome Do Usuario */
              echo '<div class="info">
                      <a href="#" class="d-block">'.$autUser['nome'].'</a>
                    </div>';
        ?>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">Diretoria</li>
            <!-- Menu Area Funcionarios -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-address-card"></i>
                <p>
                  Funcionarios
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?exe=cadastrarFuncionario" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Cadastrar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?exe=listarFuncionario" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listar</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Menu Area Salas -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-search"></i>
                <p>
                  Sala
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?exe=cadastrarSala" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Cadastrar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?exe=listarSala" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listar</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Menu Area Grupos -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-users"></i>
                <p>
                  Grupos
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?exe=cadastrarGrupo" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Cadastrar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?exe=listarGrupo" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listar</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Menu Area Alunos -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-user"></i>
                <p>
                  Alunos
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?exe=cadastrarAluno" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Cadastrar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?exe=listarAluno" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listar</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Menu Area Contato -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-address-book"></i>
                <p>
                  Contatos
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?exe=cadastrarContato" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Cadastrar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?exe=listarContato" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listar</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Menu Area Noticias -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-bullhorn"></i>
                <p>
                  Noticias
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?exe=cadastrarNoticia" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Cadastrar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?exe=listarNoticia" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listar</p>
                  </a>
                </li>
              </ul>
            </li>
            <!-- Menu Area Duvidas -->
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-question"></i>
                <p>
                  Duvidas
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?exe=cadastrarFAQ" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Cadastrar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?exe=listarFAQ" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Listar</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?exe=listarPergunta" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Perguntas</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
      </nav>
    </div>
  </aside>
  <?php
    '"';}}
    else {
      unset($_SESSION['autUser']['id']);
      echo'"'
  ?>
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index.php" class="brand-link">
      <span class="brand-text font-weight-light" style="margin-left: 30px;">Escola Maria Ester</span>
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/Avatar.png" class="img-circle elevation-2" alt="IMAGEM DE USUARIO">
        </div>
        <!-- Painel Do Aluno -->
        <div class="info">
          <a href="login.php" class="d-block">Login</a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">Alunos</li>
          <li class="nav-item">
              <a href="?exe=salas" class="nav-link">
                <i class="nav-icon fas fa-search"></i>
                <p>
                  Salas
                </p>
              </a>
            </li>
          <li class="nav-item">
              <a href="?exe=contato" class="nav-link">
                <i class="nav-icon fa fa-address-book"></i>
                <p>
                  Contatos
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fa fa-question"></i>
                <p>
                  Duvidas
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="?exe=FAQ" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>FAQ</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="?exe=perguntar" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Peguntar</p>
                  </a>
                </li>
              </ul>
            </li>
        
      </nav>
    </div>
  </aside>
<?php
  '"';}
?>