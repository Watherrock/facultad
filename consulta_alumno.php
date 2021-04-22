<?php

$con = pg_connect("port=5432 dbname=prueba1 user=alumno1 password=hola123.,") or die (pg_last_error());
//$con = pg_connect("port=5432 dbname=prueba1 user=postgress password=225234342A_i.,") or die (pg_last_error());
if ($con) {
    //genera la consulta
    $query = "select id_alumno,nombre_alumno,apaterno_alumno,amaterno_alumno,tel_alumno,correoe_alumno from alumnos order by apaterno_alumno asc";
    $query = pg_query($con, $query) or die (pg_last_error());
    //$arreglo = pg_fetch_all($query);
    

}



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
    while ($row = pg_fetch_array($query)) {
        //echo "el nombre: ".row['nombre_alumno']

        echo "<tr>";
        echo "<td>".$row['id_alumno']."</td>";
        echo "<td>".$row['nombre_alumno']."</td>";
        echo "<td>".$row['apaterno_alumno']."</td>";
        echo "<td>".$row['amaterno_alumno']."</td>";
        echo "<td>".$row['correoe_alumno']."</td>";
        echo "<td>".$row['tel_alumno']."</td>";
        echo "<td><a href=edita_alumno.php?id=".$row['id_alumno'].">Editar registro</a></td>";
        echo "<td><a href=elimina_alumno.php?id=".$row['id_alumno'].">Eliminar registro</a></td>";
        echo "</tr>";

    }
?>
    </tbody>
</table>