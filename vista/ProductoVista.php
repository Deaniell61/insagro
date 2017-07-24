<?php


function mostrarProveedor()
{



    //creacion de la tabla
?>

<table id='tablaPro' class='bordered centered highlight responsive-table centrarT'>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Nit</th>
            <th>Cuenta</th>
            <th></th>
            <th></th>
            
        </tr>
    </thead>
    <tbody>
        <?php
	$extra="";
    $mysql = conexionMysql();
    $sql = "SELECT idProveedor,NombreEmpresa,Direccion,Nit,Telefono FROM proveedor ";
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
                $tabla .="<td class='anchoC'><a class='waves-effect waves-light btn modal-close  green lighten-1 modal-trigger botonesm editar' onclick=\"seleccionar('".$fila["3"]."')\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/seleccion.png' /></i></a>";
				$tabla .="<td class='anchoC'><a class='waves-effect waves-light btn blue dark-1 modal-trigger botonesm editar' onclick=\"distribuidores('".$fila["0"]."')\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/nuevod.png' /></i></a>";

                
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
