<?php


//Primero se debe incluir el archivo donde esta la funcion a usar
include "conexiondb.php";

$id = $_GET['id'];

//Se guarda en una variable la conexion para poder usarla
$mysqli = conexion_db();

// Se ejecuta la consulta y se asigna el resultado a una variable, en este caso llamada resultado
$mysqli->query("DELETE FROM reportes WHERE id = '$id'");

header("Location: reportes_seguridad.php");




?>