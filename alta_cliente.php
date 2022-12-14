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
//$resultado = $mysqli->query("");

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DevSecOps | Alta Cliente </title>
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
            <!-- <li class="nav-item">
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
          <h3 class="card-title"><b>Alta de cliente</b></h3>
          <div class="card-tools">

          </div>
        </div>

        <form method="POST" action="registrar_cliente.php">
          <div class="card-body table-responsive p-0" style="width:50%;margin-left:1%">
            <br>
            <div class="mb-3" style="width:50%">
              <label for="fecha_alta" class="form-label">Fecha de alta</label>
              <input type="text" class="form-control" id="fecha_alta" name="fecha_alta" value="<?php echo date('d/m/Y'); ?>" disabled>
            </div>
            <div class="mb-3" style="width:50%">
              <label for="cliente" class="form-label">Cliente</label>
              <input type="text" class="form-control" id="cliente" name="cliente" placeholder="Nombre de la empresa" required>
            </div>
            <div class="mb-3" style="width:50%">
              <label for="referente" class="form-label">Referente</label>
              <input type="text" class="form-control" id="referente" name="referente"  placeholder="Nombre del referente de la empresa" required>
            </div>
            <div class="mb-3" style="width:50%">
              <label for="departamento" class="form-label">Departamento</label>
              <input type="text" class="form-control" id="departamento" name="departamento" placeholder="Departamento que contrato la suscripci??n" required>
            </div>
            <div class="mb-3" style="width:50%">
              <label for="direccion" class="form-label">Direcci??n</label>
              <input type="text" class="form-control" id="direccion"  name="direccion" placeholder="Direcci??n de la empresa" required>
            </div>
            <div class="mb-3" style="width:50%">
              <label for="codigo_postal" class="form-label">C??digo postal</label>
              <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" placeholder="C??digo postal de la empresa" required>
            </div>
            <div class="mb-3" style="width:50%">
              <label for="localidad" class="form-label">Localidad</label>
              <input type="text" class="form-control" id="localidad" name="localidad"  placeholder="Localidad donde se encuentra la empresa" required>
            </div>
            <div class="mb-3" style="width:50%">
              <label for="pais_provincia" class="form-label">Pais / Provincia</label>
              <input type="text" class="form-control" id="pais_provincia" name="pais_provincia" placeholder="Pais / Provincia donde se encuentra ubicada la empresa" required>
            </div>
            <div class="mb-3" style="width:50%">
              <label for="suscripcion" class="form-label">Suscripci??n</label>
              <select class="form-control" id="suscripcion" name="suscripcion" required>
                <option value="" default></option>
                <option value="activa">Activa</option>
                <option value="inactiva">Inactiva</option>
              </select>
            </div>
            <br>
            <hr>
            <h4>Datos de AWS</h4>
            <br>
            <div class="mb-3" style="width:50%">
              <label for="cuenta_aws" class="form-label">Cuenta de AWS</label>
              <input type="text" class="form-control" id="cuenta_aws"  name="cuenta_aws" placeholder="Numero de cuenta de AWS" required>
            </div>
            <div class="mb-3" style="width:50%">
              <label for="instancia_aws" class="form-label">Instancia AWS</label>
              <input type="text" class="form-control" id="instancia_aws" name="instancia_aws" placeholder="Nombre de la instancia en AWS" required>
            </div>
            <div class="mb-3" style="width:50%">
              <label for="base_datos_aws" class="form-label">Base de datos AWS</label>
              <input type="text" class="form-control" id="base_datos_aws" name="base_datos_aws" placeholder="Numero de la base de datos en AWS" required>
            </div>
            <br>
            <hr>
            <h4>Aplicaciones</h4>
            <br>
            <div class="mb-3" style="width:50%">
              <label for="sonarqube" class="form-label">Servidor de Sonarqube</label>
              <input type="text" class="form-control" id="sonarqube" name="sonarqube"  placeholder="Ej. https://server.sonarqube.com:9000">
            </div>
            <div class="mb-3" style="width:50%">
              <label for="defect_dojo" class="form-label">Servidor de Defect Dojo</label>
              <input type="text" class="form-control" id="defect_dojo"  name="defect_dojo" placeholder="Ej. https://server.defectdojo.com:8080">
            </div>
            <div class="mb-3" style="width:50%">
              <label for="acunetix" class="form-label">Servidor de Acunetix</label>
              <input type="text" class="form-control" id="acunetix" name="acunetix" placeholder="Ej. https://server.acunetix.com:3443">
            </div>
            <div class="mb-3" style="width:50%">
              <label for="repositorio_github" class="form-label">Repositorio Github</label>
              <input type="text" class="form-control" id="repositorio_github" name="repositorio_github" placeholder="Ej. https://github.com/">
            </div>
            <div style="margin-bottom:3%;float:right">
              <div style="display: inline-block;">
                <button type="submit" class="btn btn-primary" style="background-color:blue;border-color:blue;display: inline-block;margin-top: 30px;width:150px" href="#">Guardar</button>
              </div>
              <div style="display:inline-block;">
                <a class="btn btn-primary" style="background-color:grey;border-color:grey;display: inline-block;margin-top: 30px;width:150px" href="clientes.php">Cancelar</a>
              </div>
            </div>
          </div>
        </form>
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