<?php
/*alta_alumno.php
 *Recibe el id de consulta_alumno.php, para eliminar el registro
 * authoe: ian
 * date: 2021 04 22
 */ 
//print_r($_POST);
$id = $_GET['id'];

echo "Importante: una vez que el registro sea borrado, no se podrá recuperar. Favor de verificar que el registro a eliminar sea el correcto";

//genera la conexión a la BD
$con = pg_connect("port=5432 dbname=prueba1 user=alumno1 password=hola123.,") or die (pg_last_error());

if ($con){

    //echo "<br />se abre la conexión a la BD";

    $query = "select id_alumno,nombre_alumno,apaterno_alumno,amaterno_alumno,tel_alumno,correoe_alumno from alumnos where id_alumno=".$id;
    $query = pg_query($con, $query) or die (pg_last_error());
    $consulta = pg_fetch_assoc($query);

?>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido paterno</th>
            <th>Apellido materno</th>
            <th>Correo elctronico</th>
            <th>Teléfono</th>
        </tr>
    </thead>
    <tbody>

<?php

    echo "<tr>";
    echo "<td>".$consulta['id_alumno']."</td>";
    echo "<td>".$consulta['nombre_alumno']."</td>";
    echo "<td>".$consulta['apaterno_alumno']."</td>";
    echo "<td>".$consulta['amaterno_alumno']."</td>";
    echo "<td>".$consulta['correoe_alumno']."</td>";
    echo "<td>".$consulta['tel_alumno']."</td>";
    echo "</tr>";
  
?>

    </tbody>
</table>
<form name="borrar" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
<input type="submit" name="borrar" value="Eliminar registro">
</form>

<?php

    $borrar = $_POST['borrar'];
    if ($borrar){     
        $query = "delete from alumnos where id_alumno=".$id;
        //$query = "update alumnos (nombre_alumno,apaterno_alumno,amaterno_alumno,tel_alumno,correoe_alumno) set ('".$nombre."', '".$apaterno."', '".$amaterno."', '".$telefono."', '".$correoe."') where id_alumno=".$id;
        $query = pg_query($con, $query) or die (pg_last_error());

        if ($query) {
            echo "<p>Se elimino el registro de alumnos</p>";
            echo "<a href = 'index.php'>Volver al inicio<a/><br />";
            echo "<a href = 'form_alumno.php'>Volver al formulario de registro<a/><br />";

        } else {

            echo "No se pudo ejecutar la sentencia sql";
        }
    }

}else{

    echo "hubo un error al intentar conectar";
}
?>