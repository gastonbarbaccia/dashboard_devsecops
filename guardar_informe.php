<?php
// Se incluye el archivo donde esta la funcion
include "conexiondb.php";


$cliente = $_POST['cliente'];
$cliente_id = $_POST['cliente_id'];

$nombre_archivo = $_FILES["archivo"]["name"];
$tipo_archivo = $_FILES["archivo"]["type"];
$tamano_archivo = $_FILES["archivo"]["size"];


if($tipo_archivo == "application/pdf"){
    //Validamos que el archivo exista
    if($_FILES["archivo"]["name"]) {
        $filename = $_FILES["archivo"]["name"]; //Obtenemos el nombre original del archivo
        $source = $_FILES["archivo"]["tmp_name"]; //Obtenemos un nombre temporal del archivo
        
        $directorio = $cliente."/"; //Declaramos un  variable con la ruta donde guardaremos los archivos
        
        //Validamos si la ruta de destino existe, en caso de no existir la creamos
        if(!file_exists($directorio)){
            mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
        }

        //Obtenemos la fecha y hora para agregarle al archivo para poder diferenciarlo si se suben 2 archivos con el mismo nombre
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        
        $fecha = date('mdY_his');
        $timestamp = $fecha;
        $archivo_timestamp = $timestamp.'_'.$filename;
        
        $dir=opendir($directorio); //Abrimos el directorio de destino
        $target_path = $directorio.$timestamp.'_'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
        
        //Movemos y validamos que el archivo se haya cargado correctamente
        //El primer campo es el origen y el segundo el destino
        if(move_uploaded_file($source, $target_path)) {	
            echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
            } else {	
            echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
        }
        closedir($dir); //Cerramos el directorio de destino
    }
}else{
    echo "No se admiten archivos que no sean PDF.";
}

// Se estable la conexion y se la guarda en una variable para poder usarla
$mysqli = conexion_db();

// Se ejecuta el insert en la tabla usuarios y se guarda el resultado en la variable guardar.
$guardar = $mysqli->query("INSERT INTO reportes_pdf (cliente_id,ruta_archivo,nombre_archivo) VALUES ('$cliente_id','$directorio','$archivo_timestamp')");

// Esta funcion sirve para hacer una redireccion hacia una pagina, en este caso queres que luego de guardar
// sea redireccionado el usuario al index para ver el nuevo registro
header("Location: reportes_seguridad_informes.php?cliente_id=$cliente_id&cliente=$cliente");