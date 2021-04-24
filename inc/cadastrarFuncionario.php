<head>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cadastrar Funcionario.</h1>
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
    $verf = read('secretaria','WHERE email = "'.$dados['email'].'"');
    if(!$verf->num_rows){
        $dados['nivel'] = 1;
        $dados['senha'] = md5($dados['senha']);
        create('secretaria',$dados);
        echo'<script>alert("Funcionario Cadastrado Com Sucesso");</script>';
    }else{
        echo'<script>alert("ERRO! Esse Email Já Foi Cadastrado.");</script>';
    }
  }
?>
    <!-- Main content -->
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
                    <input type="text" class="form-control" placeholder="Nome" name="nome">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Email</label>
                        <input type="email" class="form-control" placeholder="Email" name="email">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                  <label>Senha</label>
                    <input type="password" class="form-control" placeholder="Senha" name="senha">
                  </div>
                </div>
                </form>
<?php
}
?>