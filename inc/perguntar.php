<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Enviar Duvida</h1>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="card card-default">
<?php
  $dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
  if($dados){
        create('pergunta',$dados);
        echo'<script>alert("Pergunta Cadastrada Com Sucesso");</script>';
  }
?>
            <div class="card-primary">
              <div class="card-header">
              <form  method="post">
                <h3 class="card-title col-md-10" style="margin: 1%;">Prencha o formulario.</h3>
                <button type="submit" class="btn btn-success toastrDefaultSuccess" style="">
                Cadastrar
                </button>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Nome</label>
                        <input name="nome" type="text" class="form-control" placeholder="Nome Para Contato">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Contato</label>
                        <input name="contato" type="text" class="form-control" placeholder="Numero Email ou Rede Social">
                      </div>
                    </div>
                  </div>
                <div class="col-sm-13">
                      <div class="form-group">
                        <label>Duvida</label>
                        <input name="duvida" type="text" class="form-control" placeholder="duvida a ser respondida">
                      </div>
                    </div>
                    </form>                
