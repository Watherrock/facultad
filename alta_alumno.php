<?php
/*alta_alumno.php
 *Recibe los datos de from_alimno.php, los procesa e inserta en la BD
 * authoe: ian
 * date: 2021 03 18
 */ 
print_r($_POST);
$nombre = $_POST['nombre'];
$apaterno = $_POST['apaterno'];
$amaterno = $_POST['amaterno'];
$telefono = $_POST['telefono'];
$correoe = $_POST['correoe'];

//genera la conexión a la BD
$con = pg_connect("host=127.0.0.1 port=5432 dbname=miprueba user=postgres password=225234342A_i" , ) or die (pg_last_error());

if ($con){

    echo "<br />se abre la conexión a la BD";

}else{

    echo "hubo un error al intentar conectar";
}

//genera la consulta
$query = "insert into alumnos values('".$nombre."', '".$apaterno."', '".$amaterno."', '".$telefono."', '".$correoe."')";


?>