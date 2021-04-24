<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cadastrar Noticias</h1>
        </div>
      </div><!-- /.container-fluid -->
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
        create('noticias',$dados);
        echo'<script>alert("Noticia Cadastrada Com Sucesso");</script>';
  }
?>
            <div class="card-primary">
              <div class="card-header">
              <form  method="post">
                <h3 class="card-title col-md-10" style="margin: 1%;">Prencha o formulario de cadastro.</h3>
                <button type="submit" class="btn btn-success toastrDefaultSuccess" style="">
                Cadastrar
                </button>
                <aside class="control-sidebar control-sidebar-dark">
                <input name="data" value="<?php echo date('d/m/Y'); ?>">
                </aside>
              </div>
              <div class="card-body">
                <div class="col-sm-13">
                      <div class="form-group">
                        <label>Titulo</label>
                        <input name="titulo" type="text" class="form-control" placeholder="Titulo Da Noticia.">
                      </div>
                    </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label>Noticias</label>
                        <input name="descr" type="text" class="form-control" placeholder="Noticia.">
                      </div>
                    </div>
                    </form>                
                  </div>
<?php
}
?>
