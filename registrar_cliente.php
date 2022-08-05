<?php

include 'conexiondb.php';

$fecha_alta = date('d/m/Y');;
$cliente = $_POST['cliente'];
$referente = $_POST['referente'];
$departamento = $_POST['departamento']; 
$direccion = $_POST['direccion']; 
$codigo_postal = $_POST['codigo_postal']; 
$localidad = $_POST['localidad']; 
$pais_provincia = $_POST['pais_provincia'];
$suscripcion = $_POST['suscripcion']; 
$cuenta_aws = $_POST['cuenta_aws']; 
$instancia_aws = $_POST['instancia_aws'];
$base_datos_aws = $_POST['base_datos_aws'];
$sonarqube = $_POST['sonarqube'];
$defect_dojo = $_POST['defect_dojo'];
$acunetix = $_POST['acunetix'];
$repositorio_github = $_POST['repositorio_github'];

$conexion = conexion_db();

$conexion->query("INSERT INTO `clientes`(`fecha_alta`, `cliente`, `referente`, `departamento`, `direccion`, `codigo_postal`, `localidad`, `pais_provincia`, `suscripcion`, `cuenta_AWS`, `instancia_AWS`, `base_datos_AWS`, `sonarqube`, `defect_dojo`, `acunetix`, `github`) VALUES
('$fecha_alta','$cliente','$referente','$departamento','$direccion ','$codigo_postal','$localidad','$pais_provincia','$suscripcion','$cuenta_aws','$instancia_aws','$base_datos_aws','$sonarqube','$defect_dojo','$acunetix','$repositorio_github')");


header('Location:clientes.php');

?>