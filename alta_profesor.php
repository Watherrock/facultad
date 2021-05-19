<?php
/*alta_alumno.php
 *Recibe los datos de from_alumno.php, los procesa e inserta en la BD
 * authoe: ian
 * date: 2021 03 18
 */ 
//print_r($_POST);
//Incluir el  archivo conexión a la DB
include 'conexion.php';

$nombre = $_POST['nombre'];
$apaterno = $_POST['apaterno'];
$amaterno = $_POST['amaterno'];
$telefono = $_POST['telefono'];
$correoe = $_POST['correoe'];

//genera la conexión a la BD
//$con = pg_connect(" port=5432 dbname=miprueba user=postgres password=225234342A_i" , ) or die (pg_last_error());
//$con = pg_connect("port=5432 dbname=prueba1 user=alumno1 password=hola123.,") or die (pg_last_error());
//if ($con){

    //echo "<br />se abre la conexión a la BD";
    $query = "insert into profesores (nombre_profesor,apaterno_profesor,amaterno_profesor,tel_profesor,correoe_profesor) values('".$nombre."', '".$apaterno."', '".$amaterno."', '".$telefono."', '".$correoe."')";
    $query = pg_query($con, $query) or die (pg_last_error());
    if ($query) {

        echo "<p>Se guardó el registro del profesor</p>";
        echo "<a href='index.php'>Volver al inicio</a><br />";
        echo "<a href='form_profesor.php'>Volver al formulario</a><br />";

    }else{

        echo "No se pudo ejecutar la sentencia SQL";

    }

//}else{
//    echo "hubo un error al intentar conectar";
//}
//genera la consulta
?>