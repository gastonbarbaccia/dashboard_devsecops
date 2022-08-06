<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DevSecOps | Devcode </title>
  <link rel="icon" type="image/x-icon" href="images/favicon.ico">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="css/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page" style="background-image: url('images/background_login.png');background-size:cover;">
<div class="login-box" style="opacity:0.7;">

  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <div class="login-logo" >
        <b>Devcode</b>
        <p style="font-size:30px ;">Portal DevSecOps</p>
      </div>
      <form action="dashboard.php" method="post">
        <div class="input-group mb-3">
          <input name="username" type="text" class="form-control" placeholder="Usuario">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control" placeholder="Contraseña">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row" >
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block" style="color:white;background-color: blue;border-color:blue ">Iniciar Sesión</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

</body>
</html>
