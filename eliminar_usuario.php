<?php

include 'conexiondb.php';

$id = $_GET['id'];

$conexion = conexion_db();

$conexion->query("DELETE FROM usuarios WHERE id='$id'");

header('Location:gestion_usuarios.php');




?>