<?php

//Primero se debe incluir el archivo donde esta la funcion a usar
include "conexiondb.php";

session_start();



if(!isset($_SESSION['id'])){



   header('Location:/');



}

//Se guarda en una variable la conexion para poder usarla
$mysqli = conexion_db();

// Se ejecuta la consulta y se asigna el resultado a una variable, en este caso llamada resultado
$resultado = $mysqli->query("SELECT * FROM clientes");

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DevSecOps | Clientes </title>
  <link rel="icon" type="image/x-icon" href="images/favicon.ico">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
</head>
<style>
  @media (min-width: 576px) {
    .col-sm-2 {
      flex: 0 0 37% !important;
      max-width: 45% !important;
    }
  }

  .form-control {
    width: 200% !important;
  }

  #divs-juntos {
    float: left;
  }

  .table thead th {
    vertical-align: baseline;
  }

  .text-nowrap {
    white-space: normal !important;
  }

  table{
    table-layout: fixed;
    width: 250px;
}

th, td {
    width: 150px;
    word-wrap: break-word;
}
</style>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color:#000000">
      <a href="#" class="brand-link">
        <img src="dist/img/Logo.PNG" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8;margin-left: 0.3rem;">
        <span class="brand-text font-weight-light">Portal DevSecOps</span>
      </a>

      <div class="sidebar">

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="dashboard.php" class="nav-link">
                <i class="nav-icon fas fa-infinity"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="clientes.php" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Clientes
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="gestion_usuarios.php" class="nav-link">
                <i class="nav-icon fas fa-user-shield"></i>
                <p>
                  Gesti??n de usuarios
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="reportes_seguridad.php" class="nav-link">
                <i class="nav-icon fas fa-chart-pie"></i>
                <p>
                  Reportes de seguridad
                </p>
              </a>
            </li>
            <!--  <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cubes"></i>
                <p>
                  Aplicaciones
                </p>
              </a>
            </li>-->
            <hr width=500 style="background-color:grey">
            <li class="nav-item">
              <a href="cerrar_sesion.php" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                  Cerrar sesi??n
                </p>
              </a>
            </li>
          </ul>
        </nav>

      </div>

    </aside>


    <div class="content-wrapper">


      <section class="content">


        <div class="card-header">
          <h3 class="card-title"><b>Clientes</b></h3>
          <div class="card-tools">
            <div class="input-group input-group-sm">
              <div>
                <a class="btn btn-primary" style="width: 100%;background-color:blue;border-color:blue;" href="alta_cliente.php">+ Nuevo cliente</a>
              </div>
            </div>
          </div>
        </div>


        <div class="card-body table-responsive p-0">
          <br>
          <table class="table table-hover text-nowrap" id="myTable" name="myTable">
            <thead>
              <tr style="background-color:#ababab">
                <th>Fecha Alta</th>
                <th>Empresa</th>
                <th>Referente</th>
                <th>Departamento</th>
                <th>Direccion</th>
                <th>C.P</th>
                <th>Localidad</th>
                <th>Pais/Provincia</th>
                <th>Suscripci??n</th>
                <th>Cuenta AWS</th>
                <th>Instancia AWS</th>
                <th>Base de datos AWS</th>
                <th>Aplicaciones</th>
                <th style="text-align: center;">Opciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($filas = $resultado->fetch_assoc()) {
              ?>
                <tr>
                  <td style="font-size: 14px;padding-top:0.5%;"><?php echo $filas['fecha_alta'] ?></td>
                  <td style="font-size: 14px;padding-top:0.5%;"><?php echo $filas['cliente'] ?></td>
                  <td style="font-size: 14px;padding-top:0.5%;"><?php echo $filas['referente'] ?></td>
                  <td style="font-size: 14px;padding-top:0.5%;"><?php echo $filas['departamento'] ?></td>
                  <td style="font-size: 14px;padding-top:0.5%;"><?php echo $filas['direccion'] ?></td>
                  <td style="font-size: 14px;padding-top:0.5%;"><?php echo $filas['codigo_postal'] ?></td>
                  <td style="font-size: 14px;padding-top:0.5%;"><?php echo $filas['localidad'] ?></td>
                  <td style="font-size: 14px;padding-top:0.5%;"><?php echo $filas['pais_provincia'] ?></td>           
                  <?php 
                    if($filas['suscripcion'] == "activa"){
                      ?>
                         <td style="font-size: 14px;padding-top:0.5%;color:green;"><b><?php echo $filas['suscripcion'] ?></b></td>
                      <?php
                    }else{
                      ?>

                        <td style="font-size: 14px;padding-top:0.5%;color:red;"><b><?php echo $filas['suscripcion'] ?></b></td>

                  <?php
                    }
                  ?>
                        <td style="font-size: 14px;padding-top:0.5%;"><?php echo $filas['cuenta_AWS'] ?></td>
                  <td style="font-size: 14px;padding-top:0.5%;"><?php echo $filas['instancia_AWS'] ?></td>
                  <td style="font-size: 14px;padding-top:0.5%;"><?php echo $filas['base_datos_AWS'] ?></td>
                  <td style="font-size: 14px;padding-top:0.5%;">
                    <?php
                    if (!empty($filas['sonarqube'])) {
                    ?>
                      <div style="padding-bottom:5%">
                        <a href="<?php echo $filas['sonarqube'] ?>" target="_blank">Sonarqube</a>
                      </div>

                    <?php
                    }
                    if (!empty($filas['defect_dojo'])) {
                    ?>

                      <div style="padding-bottom:5%">
                        <a href="<?php echo $filas['defect_dojo'] ?>" target="_blank">Defect dojo</a>
                      </div>

                    <?php
                    }
                    if (!empty($filas['acunetix'])) {
                    ?>
                      <div style="padding-bottom:5%">
                        <a href="<?php echo $filas['acunetix'] ?>" target="_blank">Acunetix</a>
                      </div>
                    <?php
                    }
                    if (!empty($filas['github'])) {
                    ?>
                      <div style="padding-bottom:5%">
                        <a href="<?php echo $filas['github'] ?>" target="_blank">Github</a>
                      </div>
                    <?php
                    }
                    ?>
                  </td>
                  <td style="font-size: 14px;padding-top:0.5%;text-align:center">
                    <div>
                      <a href="modificar_cliente.php?id=<?php echo $filas['id'] ?>" style="padding-right:6%"><i class="fa-solid fas fa-edit"></i> Editar</a>
                    </div>
                    <br>
                    <div>
                      <a href="eliminar_cliente.php?id=<?php echo $filas['id'] ?>"><i class="fa-solid fas fa-trash"></i> Eliminar</a>
                    </div>
                    <br>
                  </td>
                </tr>
              <?php

              }

              ?>
            </tbody>
          </table>
        </div>

    </div>

  </div>
  </div>

  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020-<?php echo date('Y') ?><a href="https://www.devcode.com.ar" style="color: black"> Devcode</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>V.</b> 1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="plugins/moment/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>

  <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#myTable').DataTable({
        language: {
          "decimal": "",
          "emptyTable": "No hay informaci??n",
          "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
          "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
          "infoFiltered": "(Filtrado de _MAX_ total entradas)",
          "infoPostFix": "",
          "thousands": ",",
          "lengthMenu": "Mostrar _MENU_ Entradas",
          "loadingRecords": "Cargando...",
          "processing": "Procesando...",
          "search": "Buscar:",
          "zeroRecords": "Sin resultados encontrados",
          "paginate": {
            "first": "Primero",
            "last": "Ultimo",
            "next": "Siguiente",
            "previous": "Anterior"
          }
        },
      });
    });
  </script>
</body>

</html>