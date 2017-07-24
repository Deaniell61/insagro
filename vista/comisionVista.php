<?php

function mostrarComision()
{


    //creacion de la tabla
?>

<table id='tabla' class='bordered centered highlight responsive-table centrarT'>
    <thead>
        <tr>
            <th>Fecha Iniciuo</th>
            <th>Fecha Fin</th>
            <th>Vendedor</th>
            <th>Monto de Venta</th>
            <th>Comision a Pagar</th>

            <th></th>

        </tr>
    </thead>
    <tbody>
        <?php
	$extra="";
    $mysql = conexionMysql();
    $sql = "SELECT c.fechaini,c.fechafin,c.monto,c.total,u.user,c.idcomisiones FROM comisiones c inner join usuarios u on u.idusuarios=c.idusuarios  where c.estado=1";
    $tabla="";
    if($resultado = $mysql->query($sql))
    {

        if(mysqli_num_rows($resultado)==0)
        {
            $respuesta = "<div class='error'>No hay Comisiones BD vacia</div>";
        }

        else
        {

            while($fila = $resultado->fetch_row())
            {

                $tabla .= "<tr>";

                $tabla .="<td>"     .$fila["0"].    "</td>";
                $tabla .="<td>" .$fila["1"].      "</td>";
                $tabla .="<td>" .$fila["4"].      "</td>";
				$tabla .="<td>" .toMoney($fila["2"]).      "</td>";
				$tabla .="<td>" .toMoney($fila["3"]).      "</td>";





                $tabla .="<td class='anchoC'><a class='waves-effect waves-light btn red lighten-1 modal-trigger botonesm modaleliminar' onclick=\"eliminar('".$fila["5"]."')\"><i class='material-icons left'><img class='iconoaddcrud' src='../app/img/boton-borrar.png' /></i></a></td>";
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
