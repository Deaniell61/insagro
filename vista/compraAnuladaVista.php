<?php


function mostrarComprasAnul($datos)
{


session_start();
    //creacion de la tabla
?>

<table id='tabla' class='bordered centered highlight responsive-table centrarT'>
    <thead>
        <tr>
            <th>Fecha</th>
            <th>No. Factura</th>
            <th>Nit</th>
            <th>Proveedor</th>
            <th>Total</th>
            <th>Tipo de Compra</th>
              <th></th>

        </tr>
    </thead>
    <tbody>
        <?php
	$extra="";
    $mysql = conexionMysql();
    $sql = "SELECT c.fecha,c.nocomprobante,p.nit,p.nombreempresa,c.total,(select tv.Descripcion from tipocompra tv where tv.idtipo=c.tipocompra),c.idcompras FROM compras c inner join proveedor p on p.idproveedor=c.iddistribuidor inner join compradetalle cd on cd.idcompras=c.idcompras inner join productos pd on pd.idproductos=cd.idproductos where c.estado=0 and cd.estado=0 and pd.tiporepuesto='".$datos[0]."'  group by c.idcompras order by c.fecha desc";
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

                $tabla .="<td>"     .substr($fila["0"],0,10).    "</td>";
                $tabla .="<td>" .$fila["1"].      "</td>";
                $tabla .="<td>" .$fila["2"].      "</td>";
				$tabla .="<td>" .$fila["3"].      "</td>";
				$tabla .="<td>" .toMoney($fila["4"]).      "</td>";

				$tabla .="<td>" .$fila["5"].      "</td>";
				if($_SESSION['SOFT_ACCESOElimina'.'compras']=='1')
				{
              
				}
				else
				{
					$tabla .="<td class='anchoC'>";
				}


                $tabla .="<td class='anchoC'><a class='waves-effect waves-light btn yellow dark-1 modal-trigger botonesm modalver'  onClick=\"buscarCompra('".$fila["6"]."');\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/ojo.png' /></i></a></td>";
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
