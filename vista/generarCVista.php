<?php


function mostrarCompras()
{



    //creacion de la tabla
?>

<table id='tabla' class='bordered centered highlight responsive-table centrarT'>
    <thead>
        <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>SubTotal</th>
            <th></th>
            
        </tr>
    </thead>
    <tbody>
        <?php
	$extra="";
    $mysql = conexionMysql();
    $sql = "SELECT cd.idcompradetalle,(select p.nombre from productos p where p.idproductos=cd.idproductos),cd.precio,cd.cantidad,cd.subtotal FROM compradetalle cd where cd.estado=1";
    $tabla="";
    if($resultado = $mysql->query($sql))
    {

        if(mysqli_num_rows($resultado)==0)
        {
            $respuesta = "<div class='error'>No hay Compras BD vacia</div>";
        }

        else
        {

            while($fila = $resultado->fetch_row())
            {

                $tabla .= "<tr>";

                $tabla .="<td>"     .$fila["0"].    "</td>";
                $tabla .="<td>" .$fila["1"].      "</td>";
                $tabla .="<td>" .$fila["2"].      "</td>";
				$tabla .="<td>" .$fila["3"].      "</td>";
				$tabla .="<td>" .$fila["4"].      "</td>";
                $tabla .="<td class='anchoC'><a class='waves-effect waves-light btn orange lighten-1 modal-trigger botonesm editar' onclick=\"editar('".$fila["0"]."')\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/editar.png' /></i></a>";

                $tabla .="<a class='waves-effect waves-light btn red lighten-1 modal-trigger botonesm modaleliminar' data-elim='".$fila["0"]."'><i class='material-icons left'><img class='iconoaddcrud' src='../app/img/boton-borrar.png' /></i></a>";

                $tabla .="<a class='waves-effect waves-light btn yellow dark-1 modal-trigger botonesm ver' data-ver='".$fila["0"]."'><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/ojo.png' /></i></a></td>";
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

function mostrarDetallesCompras($id)
{



    //creacion de la tabla
?>

<table id='tabla2' class='bordered centered highlight responsive-table centrarT'>
    <thead>
        <tr>
            <th>ID</th>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>SubTotal</th>
          
            
        </tr>
    </thead>
    <tbody>
        <?php
	$extra="";
    $mysql = conexionMysql();
    $sql = "SELECT cd.idcompradetalle,(select p.nombre from productos p where p.idproductos=cd.idproductos),cd.precio,cd.cantidad,cd.subtotal FROM compradetalle cd where cd.estado=1 and cd.idcompras='".$id."'";
    $tabla="";
    if($resultado = $mysql->query($sql))
    {

        if(mysqli_num_rows($resultado)==0)
        {
            $respuesta = "<div class='error'>No hay Compras BD vacia</div>";
        }

        else
        {

            while($fila = $resultado->fetch_row())
            {

                $tabla .= "<tr>";

                $tabla .="<td>"     .$fila["0"].    "</td>";
                $tabla .="<td>" .$fila["1"].      "</td>";
                $tabla .="<td>" .$fila["2"].      "</td>";
				$tabla .="<td>" .$fila["3"].      "</td>";
				$tabla .="<td>" .$fila["4"].      "</td>";
               
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
