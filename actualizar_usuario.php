<?php

include 'conexiondb.php';

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$usuario = $_POST['usuario'];
$rol = $_POST['rol'];

$conexion = conexion_db();

$conexion->query("UPDATE `usuarios` SET `nombre`='$nombre',`apellido`='$apellido',`email`='$email',`usuario`='$usuario',`rol`='$rol'WHERE id = '$id'");

header('Location:gestion_usuarios.php');

?>