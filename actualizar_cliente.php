<?php

include 'conexiondb.php';

$id = $_POST['id'];
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

$conexion->query("UPDATE `clientes` SET `cliente`='$cliente',`referente`='$referente',`departamento`='$departamento',`direccion`='$direccion',`codigo_postal`='$codigo_postal',`localidad`='$localidad',`pais_provincia`='$pais_provincia',`suscripcion`='$suscripcion',`cuenta_AWS`='$cuenta_aws',`instancia_AWS`='$instancia_aws',`base_datos_AWS`='$base_datos_aws',`sonarqube`='$sonarqube',`defect_dojo`='$defect_dojo',`acunetix`='$acunetix',`github`='$repositorio_github' WHERE id = '$id'");

header('Location:clientes.php');

?>