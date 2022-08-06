<?php

//Primero se debe incluir el archivo donde esta la funcion a usar
include "conexiondb.php";

$cliente = $_POST['cliente'];

//Se guarda en una variable la conexion para poder usarla
$mysqli = conexion_db();

$cliente = $mysqli ->query("SELECT * FROM clientes WHERE cliente = '$cliente'");

$resultado = $cliente->fetch_assoc();

$cliente_id =  $resultado['id'];

$cliente = $resultado['cliente'];

// Se ejecuta la consulta y se asigna el resultado a una variable, en este caso llamada resultado
$mysqli->query("INSERT INTO `reportes` (`cliente`,`cliente_id`) VALUES ('$cliente','$cliente_id')");

header("Location: reportes_seguridad.php");



?>