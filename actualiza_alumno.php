<?php
/*alta_alumno.php
 *Recibe los datos de from_alumno.php, los procesa e inserta en la BD
 * authoe: ian
 * date: 2021 03 18
 */ 
//print_r($_POST);
$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apaterno = $_POST['apaterno'];
$amaterno = $_POST['amaterno'];
$telefono = $_POST['tel'];
$correoe = $_POST['correoe'];

//genera la conexión a la BD
//$con = pg_connect(" port=5432 dbname=miprueba user=postgres password=225234342A_i" , ) or die (pg_last_error());
$con = pg_connect("port=5432 dbname=prueba1 user=alumno1 password=hola123.,") or die (pg_last_error());

if ($con){

    echo "<br />se abre la conexión a la BD";
    $query = "update alumnos set nombre_alumno ='".$nombre."',apaterno_alumno ='".$apaterno."',amaterno_alumno ='".$amaterno."',tel_alumno ='".$telefono."',correoe_alumno ='".$correoe."' where id_alumno=".$id;
    //$query = "update alumnos (nombre_alumno,apaterno_alumno,amaterno_alumno,tel_alumno,correoe_alumno) set ('".$nombre."', '".$apaterno."', '".$amaterno."', '".$telefono."', '".$correoe."') where id_alumno=".$id;
    $query = pg_query($con, $query) or die (pg_last_error());

    if ($query) {
        echo "<p>Se actualizo el registro de alumnos</p>";
        echo "<a href = 'index.php'>Volver al inicio<a/><br />";
        echo "<a href = 'form_alumno.php'>Volver al formulario de registro<a/><br />";

    } else {

        echo "No se pudo ejecutar la sentencia sql";
    }

}else{

    echo "hubo un error al intentar conectar";
}
?>