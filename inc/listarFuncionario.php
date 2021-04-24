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
                    if (isset ($_GET['delFun']) AND $_GET['delFun'] != 1) {
                      $salaId = filter_input(INPUT_GET,'delFun', FILTER_DEFAULT);
                      $delSala = delete('secretaria','id = '.$salaId.'');
                      echo'<script>alert("Funcionario Deletado Com Sucesso");</script>';
                    }elseif (isset ($_GET['delFun']) AND $_GET['delFun'] == 1) {
                      echo'<script>alert("Que Isso? Ta Doido Só Pode.");</script>';
                     
                    }
                    $readCat = read('secretaria');
                    if ($readCat->num_rows == 0){
                    echo  '
                            <section class="content-header">
                            <div class="container-fluid">
                              <div class="row mb-2">
                                <div class="col-sm-6">
                                  <h1>Nenhum Funcionario Cadastrado</h1>
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
                                  <h1>Funcionarios Cadastrados</h1>
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
                                <h3 class="card-title" style="margin: 1%;">Lista De Funcionarios Cadastrados</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="">
                              <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                  <tr>
                                  <th>ID</th>
                                  <th>Nome</th>
                                  <th>Email</th>
                                  <th>Opções</th>
                                  </tr>
                                </thead>
                                <tbody>
                            ';
                          foreach($readCat as $func):
                            echo  '
                                    <tr>
                                    <td>'.$func['id'].'</td>
                                    <td>'.$func['nome'].'</td>
                                    <td>'.$func['email'].'</td>
                                    <td>
                                      <a href="?exe=listarFuncionario&delFun='.$func['id'].'" role="button"><button class="btn bg-blue active" style="margin: 2px !important;"><i class="fa fa-trash" aria-hidden="true"></i></a>
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