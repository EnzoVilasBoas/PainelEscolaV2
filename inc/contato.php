<body class="hold-transition sidebar-mini">
<div class="wrapper">
<div class="content-wrapper">
<script src="toastr.js"></script>
<link href="toastr.css" rel="stylesheet"/>
                  <?php
                    $readCat = read('contatos');
                    if ($readCat->num_rows == 0){
                    echo  '
                            <section class="content-header">
                            <div class="container-fluid">
                              <div class="row mb-2">
                                <div class="col-sm-6">
                                  <h1>Nenhum Contato Cadastrado</h1>
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
                                  <h1>Contatos Cadastrados</h1>
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
                                <h3 class="card-title" style="margin: 1%;">Lista De Contatos Cadastrados</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0" style="">
                              <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                  <tr>
                                  <th>Professor</th>
                                  <th>Materia</th>
                                  <th>Numero</th>
                                  <th>Email</th>
                                  </tr>
                                </thead>
                                <tbody>
                            ';
                          foreach($readCat as $sala):
                            echo  '
                                    <tr>
                                    <td>'.$sala['nome'].'</td>
                                    <td>'.$sala['materia'].'</td>
                                    <td>'.$sala['numero'].'</td>
                                    <td>'.$sala['email'].'</td>
                                    </tr>';
                      endforeach;
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