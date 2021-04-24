<head>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cadastrar Alunos</h1>
        </div>
      </div><!-- /.container-fluid -->
    </section>
      <?php
      if(empty($_SESSION['autUser']['id']) && ($_SESSION['autUser']['id'] = session_id())){
      $autUser = read('secretaria','WHERE id = "'.$_SESSION['autUser']['id'].'" AND nivel = 1');
      header('LOCATION:?exe=403');
      }else{
        $dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
        if($dados){
          $numero = read('contatos','WHERE numero= "'.$dados['numero'].'"');
          $email = read('contatos','WHERE email="'.$dados['email'].'"');
          if(!$numero->num_rows){
              if (!$email->num_rows) {
                  create('contatos',$dados);
                  echo'<script>alert("Contato Cadastrado Com Sucesso");</script>';
                }else {
                echo'<script>alert("ERRO! Email Já Foi Cadastrado.");</script>';
            }
            }else{
                echo'<script>alert("ERRO! Numero Já Foi Cadastrado.");</script>';
            }
        }
      ?>
    <section class="content">
      <div class="container-fluid">
      <div class="card card-default">
        <div class="card-primary">
          <div class="card-header">
          <form  method="post">
                <h3 class="card-title col-md-10" style="margin: 1%;">Prencha o formulario de cadastro.</h3>
                <button type="submit" class="btn btn-success toastrDefaultSuccess" style="">
                Cadastrar
                </button>
          </div>
          <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Nome</label>
                     <input type="text" class="form-control" style="width: 100%;" placeholder="Nome Do Professor" name="nome">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Materia</label>
                     <input type="text" class="form-control" style="width: 100%;" placeholder="Materia Do Professor" name="materia">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Numero</label>
                     <input type="text" class="form-control" style="width: 100%;" placeholder="Numero Do Professor" name="numero">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Email</label>
                     <input type="email" class="form-control" style="width: 100%;" placeholder="Numero Do Professor" name="email">
                  </div>
                </div>
                </form>
<?php
}
?>