<?php

function mostrarSueldo()
{



    //creacion de la tabla
?>

<table id='tabla' class='bordered centered highlight responsive-table centrarT'>
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Empleado</th>
            <th>Descripcion</th>
            <th>Monto</th>

            <th></th>

        </tr>
    </thead>
    <tbody>
        <?php
	$extra="";
    $mysql = conexionMysql();
   $sql = "SELECT s.idsueldos,s.fecha,e.nombre,e.apellido,s.descripcion,s.monto FROM sueldos s inner join empleados e on e.idempleados=s.idempleado where s.estado=1;";
    $tabla="";
    if($resultado = $mysql->query($sql))
    {

        if(mysqli_num_rows($resultado)==0)
        {
            $respuesta = "<div class='error'>No hay sueldos pagados. BD vacia</div>";
        }

        else
        {

            while($fila = $resultado->fetch_row())
            {

                $tabla .= "<tr>";

                $tabla .="<td>"     .substr($fila["1"],0,10).    "</td>";
                $tabla .="<td>" .$fila["2"]." " .$fila["3"]."</td>";
                $tabla .="<td>" .$fila["4"].      "</td>";
				$tabla .="<td>" .toMoney($fila["5"]).      "</td>";

              



                $tabla .="<td class='anchoC'><a class='waves-effect waves-light btn red lighten-1 modal-trigger botonesm modaleliminar' onclick=\"eliminar('".$fila["0"]."')\"><i class='material-icons left'><img class='iconoaddcrud' src='../app/img/boton-borrar.png' /></i></a></td>";
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

function mostrarSueldoFlujo($datos)
{



    //creacion de la tabla
?>

<table id='tabla' class='bordered centered highlight responsive-table centrarT'>
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Empleado</th>
            <th>Descripcion</th>
            <th>Monto</th>

            <th></th>

        </tr>
    </thead>
    <tbody>
        <?php
	$extra="";
    $mysql = conexionMysql();
   $sql = "SELECT s.idsueldos,s.fecha,e.nombre,e.apellido,s.descripcion,s.monto FROM sueldos s inner join empleados e on e.idempleados=s.idempleado where (s.fecha between '".$datos[1]." 00:00:00' and '".$datos[2]." 23:59:59') and s.estado=1;";
    $tabla="";
    if($resultado = $mysql->query($sql))
    {

        if(mysqli_num_rows($resultado)==0)
        {
            $respuesta = "<div class='error'>No hay sueldos pagados. BD vacia</div>";
        }

        else
        {

            while($fila = $resultado->fetch_row())
            {

                $tabla .= "<tr>";

                $tabla .="<td>"     .substr($fila["1"],0,10).    "</td>";
                $tabla .="<td>" .$fila["2"]." " .$fila["3"]."</td>";
                $tabla .="<td>" .$fila["4"].      "</td>";
				$tabla .="<td>" .toMoney($fila["5"]).      "</td>";

              



                $tabla .="<td class='anchoC'></td>";
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
