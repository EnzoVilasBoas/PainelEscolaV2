<body class="hold-transition sidebar-mini">
<div class="wrapper">
<div class="content-wrapper">
<script src="toastr.js"></script>
<link href="toastr.css" rel="stylesheet"/>
                  <?php
                  if(empty($_SESSION['autUser']['id']) && ($_SESSION['autUser']['id'] = session_id())){
                    $autUser = read('secretaria','WHERE id = "'.$_SESSION['autUser']['id'].'" AND nivel = 1');
                    header('LOCATION:?exe=403');
                  }else{
                    if (isset ($_GET['delGrupo']) AND $_GET['delGrupo'] != 0) {
                      $DelGp = filter_input(INPUT_GET,'delGrupo', FILTER_DEFAULT);
                      $delAluno = delete('alunos','grupoID = '.$DelGp.'');
                      $delGrupo = delete('grupos','id = '.$DelGp.'');
                    }elseif (isset ($_GET['delGrupo']) AND $_GET['delGrupo'] == $DelGp) {
                      echo'<script>alert("Grupo Deletado Com Sucesso");</script>';
                    }
                    $readCat = read('grupos');
                    if ($readCat->num_rows == 0){
                    echo  '
                            <section class="content-header">
                            <div class="container-fluid">
                              <div class="row mb-2">
                                <div class="col-sm-6">
                                  <h1>Nenhum Grupo Cadastrado</h1>
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
                                  <h1>Grupos Cadastrados</h1>
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
                                <h3 class="card-title" style="margin: 1%;">Lista De Grupos Cadastrados</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="">
                              <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                  <tr>
                                  <th>Titulo</th>
                                  <th>Nota</th>
                                  <th>Emblema</th>
                                  <th>Opções</th>
                                  </tr>
                                </thead>
                                <tbody>
                            ';
                          foreach($readCat as $grupo):
                            echo  '
                                    <tr>
                                    <td>'.$grupo['grupo'].'</td>
                                    <td>'.$grupo['nota'].'</td>
                                    <td>'.$grupo['emblema'].'</td>
                                    <td>
                                      <a href="?exe=listarGrupo&delGrupo='.$grupo['id'].'" role="button"><button class="btn bg-blue active" style="margin: 2px !important;"><i class="fa fa-trash" aria-hidden="true"></i></a>
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