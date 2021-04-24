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
          $verf = read('alunos','WHERE salaID = "'.$dados['salaID'].'"AND numero="'.$dados['numero'].'"');
          if(!$verf->num_rows){
              create('alunos',$dados);
              echo'<script>alert("Aluno Cadastrado Com Sucesso");</script>';
          }else{
            echo'<script>alert("ERRO! Esse Numero Já Foi Cadastrado Nessa Sala.");</script>';
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
                    <label>Sala</label>
                      <select class="form-control select2" style="width: 100%;" name="salaID">
                        <option selected="selected">Sala Do Aluno.</option>
                        <?php
                          $readCat = read('salas');
                          if ($readCat->num_rows == 0){
                          echo  '
                                  <option>Nenhuma Sala Cadastrada</option>
                                ';
                          }else{
                            foreach($readCat as $sala):
                              echo  '
                                      <option value="'.$sala['id'].'">'.$sala['sala'].'</option>
                                    ';
                          endforeach;}
                        ?>
                      </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Grupo</label>
                     <select class="form-control select2" style="width: 100%;" name="grupoID">
                        <option selected="selected">Grupo Do Aluno.</option>
                        <?php
                          $readGr = read('grupos');
                          if ($readGr->num_rows == 0){
                          echo  '
                                <option>Nenhum Grupo Cadastrado</option>
                                ';
                          }else{
                          foreach($readGr as $grupo):
                            echo  '
                                    <option value="'.$grupo['id'].'">'.$grupo['grupo'].'</option>
                                  ';
                          endforeach;}
                        ?>
                      </select>
                  </div>
                </div>
                <div class="col-md-9">
                  <div class="form-group">
                    <label>Nome</label>
                     <input type="text" class="form-control" style="width: 100%;" placeholder="Nome Do Aluno" name="aluno">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label>Numero</label>
                     <input type="text" class="form-control" style="width: 100%;" placeholder="Numero Do Aluno" name="numero">
                  </div>
                </div>
                </form>
<?php
}
?>