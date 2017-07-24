<?php

function mostrarCuentas()
{


    //creacion de la tabla
?>

<table id='tabla' class='bordered centered highlight responsive-table centrarT'>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php

    $mysql = conexionMysql();
    $sql = "SELECT idusuarios,user,email FROM Usuarios";
    $tabla="";
    if($resultado = $mysql->query($sql))
    {

        if(mysqli_num_rows($resultado)==0)
        {
            $respuesta = "<div class='error'>No hay usuarios BD vacia</div>";
        }

        else
        {

            while($fila = $resultado->fetch_row())
            {

                $tabla .= "<tr>";

                $tabla .="<td>"     .$fila["0"].    "</td>";
                $tabla .="<td>" .$fila["1"].      "</td>";
                $tabla .="<td>" .$fila["2"].      "</td>";
                $tabla .="<td><a class='waves-effect waves-light btn orange lighten-1 modal-trigger botonesr modaledit' data-edit='".$fila["0"]."'><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/editar.png' /></i>Editar</a></td>";

                $tabla .="<td>
            <a class='waves-effect waves-light btn red lighten-1 modal-trigger botonesr modaleliminar' data-elim='".$fila["0"]."'><i class='material-icons left'><img class='iconoaddcrud' src='../app/img/boton-borrar.png' /></i>Eliminar</a></td>";
                $tabla .= "</tr>";

            }

            $resultado->free();//librerar variable


            $respuesta = $tabla;
        }
    }
    else
    {
        $respuesta = "<div class='error'>Error: no se ejecuto la consulta a BD</div>";

    }

    //cierro la conexion
    $mysql->close();

    //debuelvo la variable resultado
    return printf($respuesta);
        ?>
    </tbody>
</table>
<?php


}



?>
