<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cadastrar Grupos</h1>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="card card-default">
<?php
if(empty($_SESSION['autUser']['id']) && ($_SESSION['autUser']['id'] = session_id())){
$autUser = read('secretaria','WHERE id = "'.$_SESSION['autUser']['id'].'" AND nivel = 1');
header('LOCATION:?exe=403');
}else{
  $dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
  if($dados){
    $emblema = read('grupos','WHERE emblema = "'.$dados['emblema'].'"');
      if(!$emblema->num_rows){
        create('grupos',$dados);
        echo'<script>alert("Grupo Cadastrado Com Sucesso");</script>';
      }else{
        echo'<script>alert("ERRO! Emblema Já Cadastrado.");</script>';
      }
  }
?>
    <div class="card-primary">
        <div class="card-header">
            <form  method="post">
                    <h3 class="card-title col-md-10" style="margin: 1%;">Prencha o formulario de cadastro.</h3>
                    <button type="submit" class="btn btn-success toastrDefaultSuccess" style="">
                    Cadastrar
                    </button>
                </div>
                <div class="card-body">
                    <div class="col-sm-13">
                        <div class="form-group">
                            <label>Grupo</label>
                            <input name="grupo" type="text" class="form-control" placeholder="Nome ou Titulo do grupo">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                        <div class="form-group">
                            <label>Emblema</label>
                            <input name="emblema" type="text" class="form-control" placeholder="Letra ou numero para exibir na lista e no cadastro de alunos">
                        </div>
                        </div>
                        <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nota</label>
                            <input name="nota" type="text" class="form-control" placeholder="Nota sobre o grupo em especifico">
                        </div>
                        </div>
                    </div>
                </div>
            </form>                
        </div>
    </div>
<?php
}
?>
