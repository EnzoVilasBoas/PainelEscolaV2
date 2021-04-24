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
                    if (isset ($_GET['delNoti']) AND $_GET['delNoti'] != 0) {
                      $salaId = filter_input(INPUT_GET,'delNoti', FILTER_DEFAULT);
                      $delSala = delete('noticias','id = '.$salaId.'');
                    }elseif (isset ($_GET['delNoti']) AND $_GET['delNoti'] == $salaId) {
                      echo'<script>alert("Noticia Deletada Com Sucesso");</script>';
                    }
                    $readCat = read('noticias');
                    if ($readCat->num_rows == 0){
                    echo  '
                            <section class="content-header">
                            <div class="container-fluid">
                              <div class="row mb-2">
                                <div class="col-sm-6">
                                  <h1>Nenhuma Noticia Cadastrada</h1>
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
                                  <h1>Noticias Cadastradas</h1>
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
                                <h3 class="card-title" style="margin: 1%;">Lista De Noticias Cadastradas</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="">
                              <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                  <tr>
                                  <th>Titulo</th>
                                  <th>Descrição</th>
                                  <th>Data</th>
                                  <th>Opções</th>
                                  </tr>
                                </thead>
                                <tbody>
                            ';
                          foreach($readCat as $sala):
                            echo  '
                                    <tr>
                                    <td>'.$sala['titulo'].'</td>
                                    <td>'.$sala['descr'].'</td>
                                    <td>'.$sala['data'].'</td>
                                    <td>
                                      <a href="?exe=listarNoticia&delNoti='.$sala['id'].'" role="button"><button class="btn bg-blue active" style="margin: 2px !important;"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
ob_end_flush();
?>