<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Home</h1>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-circle"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Contatos Cadastrados</span>
                <span class="info-box-number">
                <?php $contatos = read('contatos'); echo($contatos->num_rows);?>
                </span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-book"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Salas Cadastradas</span>
                <span class="info-box-number"><?php $salas = read('salas'); echo($salas->num_rows);?></span>
              </div>
            </div>
          </div>
          <div class="clearfix hidden-md-up"></div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Grupos Cadastrados</span>
                <span class="info-box-number"><?php $grupos = read('grupos'); echo($grupos->num_rows);?></span>
              </div>
            </div>
          </div>
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-bullhorn"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Noticias Cadastradas</span>
                <span class="info-box-number"><?php $noticias = read('noticias'); echo($noticias->num_rows);?></span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<?php
      /* Requisição Para Noticias Da Home */
        require('noticias.php');
      /* Requisição Para Noticias Da Home */
?>
          </div>
        </div>
      </div>
    </div>
  </div>