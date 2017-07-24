<?php



function mostrarCuentasP($dato)
{

    //creacion de la tabla
	$fecha=date('Y-m-d');
	session_start();
	
if(isset($_SESSION['codigoBuscaPagar_SOFT']))
{
	if($_SESSION['codigoBuscaPagar_SOFT']!="")
	{
		$mas=" and cc.idcuentasp='".$_SESSION['codigoBuscaPagar_SOFT']."' ";
	}
	else
		{
			$mas="";
		}
}
else
{
	$mas="";
}
?>

<table id='tabla' class='bordered centered highlight responsive-table centrarT'>
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Dias Transcurridos</th>
            <th>Comprobante</th>
            <th>Proveedor</th>
            <th>Saldo</th>
            <th></th>
            
        </tr>
    </thead>
    <tbody>
        <?php

    $mysql = conexionMysql();
    $sql = "SELECT cc.fecha,cc.total,(select c.nombreempresa from proveedor c where c.idproveedor=v.iddistribuidor limit 1),cc.idcuentasp,(select xx.nocomprobante from compras xx where xx.idcompras=cc.idcompras) FROM cuentaspagar cc inner join compras v on v.idcompras=cc.idcompras inner join compradetalle cd on cd.idcompras=v.idcompras inner join productos pp on pp.idproductos=cd.idproductos WHERE cc.estado=1 and cc.total>1 $mas group by cc.idcuentasp";
    $tabla="";
    if($resultado = $mysql->query($sql))
    {

        if(mysqli_num_rows($resultado)==0)
        {
            $respuesta = "<div class='error'>No hay Cuentas BD vacia</div>";
        }

        else
        {

            while($fila = $resultado->fetch_row())
            {
				$segundos=strtotime($fecha) - strtotime($fila["0"]); //para tu fecha de ejmplo
				$diferencia_dias=intval($segundos/60/60/24);
                $tabla .= "<tr>";

                $tabla .="<td>"     .substr($fila["0"],0,10).    "</td>";
				$tabla .="<td>" .$diferencia_dias.      "</td>";
				$tabla .="<td>" .$fila["4"].      "</td>";
                $tabla .="<td>" .$fila["2"].      "</td>";
                $tabla .="<td>" .toMoney($fila["1"]).      "</td>";
                $tabla .="<td class='anchoC'>";
				if($_SESSION['SOFT_ACCESOModifica'.'cuentas']=='1')
				{
                $tabla .="<a class='waves-effect waves-light btn orange lighten-1 modal-trigger botonesm editar' onclick=\"editar('".$fila["3"]."')\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/editar.png' /></i></a>";
                $tabla .="<a class='waves-effect waves-light btn green lighten-1 modal-trigger botonesm editar' onclick=\"imprimirCuentaPagar('".$fila["3"]."','mensajecv');\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/imprimir.png' /></i></a>";

				}
				

                $tabla .="<a class='waves-effect waves-light btn yellow dark-1 modal-trigger botonesm ver' onClick=\"ver('".$fila["3"]."');\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/ojo.png' /></i></a>";
                $tabla .= "</td></tr>";
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


function mostrarMovimientosCuentasP($id)
{

    //creacion de la tabla
?>

<table id='tabla' class='bordered centered highlight responsive-table centrarT'>
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Descripcion</th>
            <th>Abono</th>
            <!--<th>Credito</th>-->
            
            
        </tr>
    </thead>
    <tbody>
        <?php

    $mysql = conexionMysql();
    $sql = "SELECT cc.fecha,cc.descripcion,cc.abono,cc.credito FROM movimientosp cc  WHERE cc.idcuentasP=".$id;
    $tabla="";
    if($resultado = $mysql->query($sql))
    {

        if(mysqli_num_rows($resultado)==0)
        {
            $respuesta = "<div class='error'>No hay movimientos BD vacia</div>";
        }

        else
        {

            while($fila = $resultado->fetch_row())
            {

                $tabla .= "<tr>";

                $tabla .="<td>"     .$fila["0"].    "</td>";
                $tabla .="<td>" .$fila["1"]."</td>";
                $tabla .="<td>" .toMoney($fila["2"]).      "</td>";
				//$tabla .="<td>" .toMoney($fila["3"]).      "</td>";
               
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

function mostrarMovimientosCuentasPFlujo($id)
{

    //creacion de la tabla
?>

<table id='tabla' class='bordered centered highlight responsive-table centrarT'>
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Descripcion</th>
            <th>Abono</th>
            <!--<th>Credito</th>-->
            
            
        </tr>
    </thead>
    <tbody>
        <?php

    $mysql = conexionMysql();
    if($id[0]!="")
	{
		$id[0]=" and cc.idcuentasP=".$id[0];
	}
    $sql = "SELECT cc.fecha,cc.descripcion,cc.abono,cc.credito FROM movimientosp cc  WHERE (cc.fecha between '".$id[1]." 00:00:00' and '".$id[2]." 23:59:59')".$id[0];
    $tabla="";
    if($resultado = $mysql->query($sql))
    {

        if(mysqli_num_rows($resultado)==0)
        {
            $respuesta = "<div class='error'>No hay movimientos BD vacia</div>";
        }

        else
        {

            while($fila = $resultado->fetch_row())
            {

                $tabla .= "<tr>";

                $tabla .="<td>"     .$fila["0"].    "</td>";
                $tabla .="<td>" .$fila["1"]."</td>";
                $tabla .="<td>" .toMoney($fila["2"]).      "</td>";
				//$tabla .="<td>" .toMoney($fila["3"]).      "</td>";
               
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