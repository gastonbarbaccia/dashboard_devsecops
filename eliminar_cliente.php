<?php

include 'conexiondb.php';

$id = $_GET['id'];

$conexion = conexion_db();

$conexion->query("DELETE FROM clientes WHERE id='$id'");

header('Location:clientes.php');

?>