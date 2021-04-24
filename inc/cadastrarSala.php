<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cadastrar Salas</h1>
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
    $whats = read('salas','WHERE whats = "'.$dados['whats'].'"');
    $drive = read('salas','WHERE drive = "'.$dados['drive'].'"');
    if(!$whats->num_rows){
      if(!$drive->num_rows){
        create('salas',$dados);
        echo'<script>alert("Sala Cadastrada Com Sucesso");</script>';
      }else{
        echo'<script>alert("ERRO! Link do Google Drive já cadastrado.");</script>';
      }
    }else{
      echo'<script>alert("ERRO! Link do WhatsApp já cadastrado.");</script>';
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
                        <label>Sala</label>
                        <input name="sala" type="text" class="form-control" placeholder="EX : 1 Ano D">
                      </div>
                    </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Grupo WhatsApp</label>
                        <input name="whats" type="text" class="form-control" placeholder="EX : https://chat.whatsapp.com/Dv1rQkad957KE2QzlNC5O3">
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Google Drive</label>
                        <input name="drive" type="text" class="form-control" placeholder="https://drive.google.com/drive/folders/1DAWwijKysnnFtR">
                      </div>
                    </div>
                    </form>                
                  </div>
<?php
}
?>
