<body class="hold-transition sidebar-mini">
<div class="wrapper">
<div class="content-wrapper">
                  <?php
                  if (isset ($_GET['Sala']) AND $_GET['Sala'] != 0) {
                    $readCat = read('grupos');
                    $salaID = filter_input(INPUT_GET,'Sala', FILTER_DEFAULT);
                    if (isset ($_GET['Grupo']) AND $_GET['Grupo'] != 0) {
                        $grupoId = filter_input(INPUT_GET,'Grupo', FILTER_DEFAULT);
                        $Alunos2 = read('alunos','WHERE salaID = '.$salaID.' AND grupoID = '.$grupoId.'');
                        if ($Alunos2->num_rows == 0){
                            echo  '
                                    <section class="content-header">
                                    <div class="container-fluid">
                                    <div class="row mb-2">
                                        <div class="col-sm-6">
                                        <h1>Nenhum Aluno Foi Cadastrado Nesse Grupo</h1>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </section>
                                ';
                        }else{
                            echo  '
                            <section class="content-header">
                                    <div class="container-fluid">
                                    <div class="row mb-2">
                                        <div class="col-sm-6">
                                        <h1>Alunos Cadastrados Nesse Grupo</h1>
                                        </div>';
                            echo '
                                    </div>
                                    </div>
                                </section>
                            <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                <div class="col-12">
                                    <div class="card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title" style="margin: 1%;">Lista De Alunos Cadastrados | Grupos : </h3>
                                        <a href="?exe=salas&Sala='.$salaID.'" class="btn btn-success toastrDefaultSuccess"><</a>';
                            foreach($readCat as $grupo):
                              echo  '
                                      <a href="?exe=salas&Sala='.$salaID.'&Grupo='.$grupo['id'].'" class="btn btn-success toastrDefaultSuccess">'.$grupo['emblema'].'</a>
                                    ';
                            endforeach;
                                    echo '</div>
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0" style="">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                        <th>Nome</th>
                                        <th>Numero</th>
                                        <th>Grupo</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                    ';
                        foreach($Alunos2 as $aluno):
                            echo  '
                                    <tr>
                                    <td>'.$aluno['aluno'].'</td>
                                    <td>'.$aluno['numero'].'</td>';
                                    $read = read('grupos','WHERE id = "'.$aluno['grupoID'].'"');
                                    foreach ($read as $grupo) {
                                      echo '<td>'.$grupo['emblema'].'</td>';
                                    }
                            echo   '</tr>';
                        endforeach;}
                    }else {
                        $salaId = filter_input(INPUT_GET,'Sala', FILTER_DEFAULT);
                        $Alunos = read('alunos','WHERE salaID = '.$salaId.'');
                        if ($Alunos->num_rows == 0){
                            echo  '
                                    <section class="content-header">
                                    <div class="container-fluid">
                                    <div class="row mb-2">
                                        <div class="col-sm-6">
                                        <h1>Nenhum Aluno Foi Cadastrado Nessa Sala</h1>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </section>
                                ';
                        }else{
                            echo  '
                            <section class="content-header">
                                    <div class="container-fluid">
                                    <div class="row mb-2">
                                        <div class="col-sm-6">
                                        <h1>Alunos Cadastrados Nessa Sala</h1>
                                        </div>';
                            echo '
                                    </div>
                                    </div>
                                </section>
                            <section class="content">
                            <div class="container-fluid">
                                <div class="row">
                                <div class="col-12">
                                    <div class="card-primary">
                                    <div class="card-header">
                                        <h3 class="card-title" style="margin: 1%;">Lista De Alunos Cadastrados | Grupos : </h3>';
                                        foreach($readCat as $grupo):
                                          echo  '
                                                  <a href="?exe=salas&Sala='.$salaID.'&Grupo='.$grupo['id'].'" class="btn btn-success toastrDefaultSuccess">'.$grupo['emblema'].'</a>
                                                ';
                                        endforeach;
                            echo '</div>
                                    <!-- /.card-header -->
                                    <div class="card-body table-responsive p-0" style="">
                                    <table id="example2" class="table table-bordered table-hover">
                                        <thead>
                                        <tr>
                                        <th>Nome</th>
                                        <th>Numero</th>
                                        <th>Grupo</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                    ';
                        foreach($Alunos as $aluno):
                            echo  '
                                    <tr>
                                    <td>'.$aluno['aluno'].'</td>
                                    <td>'.$aluno['numero'].'</td>';
                                    $read = read('grupos','WHERE id = "'.$aluno['grupoID'].'"');
                                    foreach ($read as $grupo) {
                                      echo '<td>'.$grupo['emblema'].'</td>';
                                    }
                            echo   '</tr>';
                        endforeach;}
                    }
                  }else{
                    $Salas = read('salas');
                    if ($Salas->num_rows == 0){
                    echo  '
                            <section class="content-header">
                            <div class="container-fluid">
                              <div class="row mb-2">
                                <div class="col-sm-6">
                                  <h1>Nenhuma Sala Cadastrada</h1>
                                </div>
                                </div>
                              </div>
                            </div>
                          </section>
                          ';
                    }else{
                      echo  '
                      <section class="content-header">
                            <div class="container-fluid">
                              <div class="row mb-2">
                                <div class="col-sm-6">
                                  <h1>Salas Cadastradas</h1>
                                </div>';
                      echo '
                              </div>
                            </div>
                          </section>
                      <section class="content">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-12">
                            <div class="card-primary">
                              <div class="card-header">
                                <h3 class="card-title" style="margin: 1%;">Lista De Salas Cadastradas</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="">
                              <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                  <tr>
                                  <th>Sala</th>
                                  <th>Google Drive</th>
                                  <th>WhatsApp</th>
                                  <th>Grupos</th>
                                  </tr>
                                </thead>
                                <tbody>
                            ';
                          foreach($Salas as $sala):
                            echo  '
                                    <tr>
                                    <td>'.$sala['sala'].'</td>
                                    <td>
                                    Abrir
                                    <a href="'.$sala['drive'].'" target="_blank">
                                    Google Drive 
                                    </a>
                                    </td>
                                    <td>
                                    Abrir
                                    <a href="'.$sala['whats'].'" target="_blank">
                                    WhatssApp 
                                    </a>
                                    </td>
                                    <td>
                                    Lista De
                                    <a href="?exe=salas&Sala='.$sala['id'].'">
                                    Alunos 
                                    </a>
                                    </td>
                                    </tr>';
                      endforeach;}
                    }
                  ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
<?php
?>