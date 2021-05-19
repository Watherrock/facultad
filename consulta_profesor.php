<?php

$con = pg_connect("port=5432 dbname=prueba1 user=alumno1 password=hola123.,") or die (pg_last_error());
//$con = pg_connect("port=5432 dbname=prueba1 user=postgress password=225234342A_i.,") or die (pg_last_error());
if ($con) {
    //genera la consulta
    $query = "select id_profesor,nombre_profesor,apaterno_profesor,amaterno_profesor,tel_profesor,correoe_profesor from profesores order by apaterno_profesor asc";
    $query = pg_query($con, $query) or die (pg_last_error());
    //$arreglo = pg_fetch_all($query);
    

}



?>
<table>
    <caption>Lista de profesores</caption>
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
    while ($row = pg_fetch_array($query)) {
        //echo "el nombre: ".row['nombre_profesor']

        echo "<tr>";
        echo "<td>".$row['id_profesor']."</td>";
        echo "<td>".$row['nombre_profesor']."</td>";
        echo "<td>".$row['apaterno_profesor']."</td>";
        echo "<td>".$row['amaterno_profesor']."</td>";
        echo "<td>".$row['correoe_profesor']."</td>";
        echo "<td>".$row['tel_profesor']."</td>";
        echo "<td><a href=edita_profesor.php?id=".$row['id_profesor'].">Editar registro</a></td>";
        echo "<td><a href=elimina_profesor.php?id=".$row['id_profesor'].">Eliminar registro</a></td>";
        echo "</tr>";

    }
?>
    </tbody>
</table>
<a href='index.php'>Volver al inicio</a><br />
<a href='form_profesor.php'>Volver al formulario</a><br />