<?php

include 'conexiondb.php';

$fecha = $_POST['fecha_alta'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];
$rol = $_POST['rol'];


$conexion = conexion_db();

$conexion->query("INSERT INTO `usuarios`(`nombre`, `apellido`, `email`, `usuario`, `contrasena`, `fecha_alta`, `rol`) VALUES ('$nombre','$apellido','$email','$usuario','$contrasena','$fecha','$rol')");

header('Location:gestion_usuarios.php');

?>