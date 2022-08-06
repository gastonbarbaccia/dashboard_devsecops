<?php


//Primero se debe incluir el archivo donde esta la funcion a usar
include "conexiondb.php";

$username = $_POST['username'];

$password = $_POST['password'];

//Se guarda en una variable la conexion para poder usarla
$mysqli = conexion_db();

// Se ejecuta la consulta y se asigna el resultado a una variable, en este caso llamada resultado
$resultado = $mysqli->query("SELECT * FROM usuarios");

while($registros = $resultado->fetch_assoc()){

    if($registros['usuario'] == $username && $registros['contrasena'] == $password){
        
        session_start();

        $_SESSION['id'] = session_id();

        header('Location: dashboard.php');

    }else{

        header('Location: index.php');
        
    }
}
