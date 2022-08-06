<?php
// Incluimos el archivo donde se encuentra la funcion a usar
include "conexiondb.php";

/* obtenemos la variable id que pasa en el boton eliminar, que seria esta  ?id=<?php echo $filas['id']?>
Esta variable en este caso se la debe de recibir con el metodo GET
*/
$id = $_GET['id'];

$cliente = $_GET['cliente'];

// Se estable la conexion con la base de datos
$mysqli = conexion_db();

$archivo = $mysqli->query("SELECT * FROM reportes_pdf WHERE id ='$id'");

$archivo_registros = $archivo-> fetch_assoc();

$cliente_id = $archivo_registros['cliente_id'];

$nombre_archivo = $archivo_registros['nombre_archivo'];

unlink($cliente."/".$nombre_archivo);

//Se ejecuta la consulta, en este caso es del tipo delete o sea eliminar registros en base al id
$mysqli->query("DELETE FROM reportes_pdf WHERE id LIKE '$id'");

//Luego una vez ejecutada la eliminacion se procede a hacer una redireccion al index
header("Location: reportes_seguridad_informes.php?cliente_id=$cliente_id&cliente=$cliente");

?>