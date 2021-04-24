<?php
ob_start();
session_start();
require('config/dbaSis.php');
require('config/outSis.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Escola Maria Ester</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="index2.html" class="h1"><b>Escola</b> Maria Ester</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Logar No Painel Da Secretaria</p>
        <?php
        if (isset($_POST['sendLogin'])) {
          $dados  = filter_input_array(INPUT_POST, FILTER_DEFAULT);
          if (!$dados['email'] || !valMail($dados['email'])) {
            echo ' <p class="login-box-msg">Email não é valido</p>';
          } elseif (strlen($dados['senha']) < 5 || strlen($dados['senha']) > 80) {
            echo ' <p class="login-box-msg">Senha deve ter entre 6 e 80 caracteres!</p>';
          } else {
            $autEmail     = $dados['email'];
            $autSenha     = md5($dados['senha']);
            $usuarios = select('id','secretaria', 'WHERE email = "' . $autEmail . '" AND senha = "' . $autSenha . '"');
            if ($usuarios->num_rows) {
              foreach ($usuarios as $autUser);
              $_SESSION['autUser']['id'] = $autUser['id'];
              $_SESSION['autUser']['nome'] = $autUser['nome'];
              $_SESSION['autUser']['nivel'] = $autUser['nivel'];
              header("Location: index.php");
            } else {
              echo ' <p class="login-box-msg"><b>Erro:</b> e-mail ou senha não confere!</p>';
            }
          }
        }
        ?>
      <form method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Senha" name="senha">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
          <div class="col-4">
            <button type="submit" name="sendLogin" class="btn btn-primary btn-block">Entrar</button>
          </div>
          <!-- /.col -->
        </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
<?php
ob_end_flush();
?>
