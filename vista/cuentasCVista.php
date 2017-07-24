<?php



function mostrarCuentasC($datos)
{

session_start();
    //creacion de la tabla
$fecha=date('Y-m-d');
//$segundos=strtotime($fecha) - strtotime(date('Y-m-d')."00:00:00");//para fecha actual
if(isset($_SESSION['codigoBuscaCobrar_SOFT']))
{
	if($_SESSION['codigoBuscaCobrar_SOFT']!="")
	{
		$mas=" and cc.idcuentasc='".$_SESSION['codigoBuscaCobrar_SOFT']."' ";
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
            <th>Cliente</th>
            <th>Saldo</th>
            <th></th>
            
        </tr>
    </thead>
    <tbody>
        <?php

    $mysql = conexionMysql();
     $sql = "SELECT cc.fecha,cc.total,(select c.nombre from cliente c where c.idcliente=v.idcliente limit 1),(select c.apellido from cliente c where c.idcliente=v.idcliente limit 1),idcuentasC,(select xx.nocomprobante from ventas xx where xx.idventas=cc.idventas) FROM cuentascobrar cc inner join ventas v on v.idventas=cc.idventas inner join ventasdetalle vd on vd.idventa=v.idventas inner join productos pp on pp.idproductos=vd.idproductos WHERE (cc.estado=1) $mas group by cc.idcuentasc ";
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
				$segundos=strtotime($fecha) - strtotime($fila["0"]); //para tu fecha de ejmplo
				$diferencia_dias=intval($segundos/60/60/24);

                $tabla .= "<tr>";

                $tabla .="<td>"     .substr($fila["0"],0,10).    "</td>";
				$tabla .="<td>" .$diferencia_dias.      "</td>";
                $tabla .="<td>" .$fila["5"]. "</td>";
                $tabla .="<td>" .$fila["2"].      " " .$fila["3"].      "</td>";
                $tabla .="<td>" .toMoney($fila["1"]).      "</td>";
                $tabla .="<td class='anchoC'>";
				if($_SESSION['SOFT_ACCESOModifica'.'cuentas']=='1')
				{
                $tabla .="<a class='waves-effect waves-light btn orange lighten-1 modal-trigger botonesm editar' onclick=\"editar('".$fila["4"]."')\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/editar.png' /></i></a>";
                $tabla .="<a class='waves-effect waves-light btn green lighten-1 modal-trigger botonesm editar' onclick=\"imprimirCuentaCobrar('".$fila["4"]."','mensajecc');\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/imprimir.png' /></i></a>";

				}
				

                $tabla .="<a class='waves-effect waves-light btn yellow dark-1 modal-trigger botonesm ver' onClick=\"ver('".$fila["4"]."')\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/ojo.png' /></i></a>";
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



function mostrarMovimientosCuentasC($id)
{

    session_start()
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
	if($id!="")
	{
		$id=" WHERE cc.idcuentasC=".$id;
	}
    $sql = "SELECT cc.fecha,cc.descripcion,cc.abono,cc.credito,cc.idmovimientoc FROM movimientosc cc ".$id;
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
                $tabla .="<td>" .$fila["1"].  "</td>";
                $tabla .="<td>" .toMoney($fila["2"]).      "</td>";
				//$tabla .="<td>" .toMoney($fila["3"]).      "</td>";
               $tabla .="<td class='anchoC'>";
			
                if($_SESSION['SOFT_ACCESOElimina'.'cuentas']=='1')
  				{
                  $tabla .="<a class='waves-effect waves-light btn red lighten-1 modal-trigger botonesm ' onClick=\"anularAbono('".$fila["4"]."', '".$fila["2"]."');\"><i class='material-icons left'><img class='iconoaddcrud' src='../app/img/boton-borrar.png' /></i></a>";
  				}
	            $tabla .= "</td>";
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

function mostrarMovimientosCuentasCFlujo($id)
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
		$id[0]=" and cc.idcuentasC=".$id[0];
	}
    $sql = "SELECT cc.fecha,cc.descripcion,cc.abono,cc.credito FROM movimientosc cc WHERE (cc.fecha between '".$id[1]." 00:00:00' and '".$id[2]." 23:59:59')  and ((select c.estado from cuentascobrar c where c.idcuentasc=cc.idcuentasc)=1 or (select c.estado from cuentascobrar c where c.idcuentasc=cc.idcuentasc)=3) ".$id[0];
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
                $tabla .="<td>" .$fila["1"].  "</td>";
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



function mostrarCuentasCPagadas($datos)
{

session_start();
    //creacion de la tabla
$fecha=date('Y-m-d');
//$segundos=strtotime($fecha) - strtotime(date('Y-m-d')."00:00:00");//para fecha actual
if(isset($_SESSION['codigoBuscaCobrar_SOFT']))
{
	if($_SESSION['codigoBuscaCobrar_SOFT']!="")
	{
		$mas=" and cc.idcuentasc='".$_SESSION['codigoBuscaCobrar_SOFT']."' ";
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
            <th>Cliente</th>
            <th>Saldo</th>
            <th></th>
            
        </tr>
    </thead>
    <tbody>
        <?php

    $mysql = conexionMysql();
     $sql = "SELECT cc.fecha,cc.total,(select c.nombre from cliente c where c.idcliente=v.idcliente limit 1),(select c.apellido from cliente c where c.idcliente=v.idcliente limit 1),idcuentasC,(select xx.nocomprobante from ventas xx where xx.idventas=cc.idventas) FROM cuentascobrar cc inner join ventas v on v.idventas=cc.idventas inner join ventasdetalle vd on vd.idventa=v.idventas inner join productos pp on pp.idproductos=vd.idproductos WHERE (cc.estado=3) $mas group by cc.idcuentasc ";
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
				$segundos=strtotime($fecha) - strtotime($fila["0"]); //para tu fecha de ejmplo
				$diferencia_dias=intval($segundos/60/60/24);

                $tabla .= "<tr>";

                $tabla .="<td>"     .substr($fila["0"],0,10).    "</td>";
				$tabla .="<td>" .$diferencia_dias.      "</td>";
                $tabla .="<td>" .$fila["5"]. "</td>";
                $tabla .="<td>" .$fila["2"].      " " .$fila["3"].      "</td>";
                $tabla .="<td>" .toMoney($fila["1"]).      "</td>";
                $tabla .="<td class='anchoC'>";
				if($_SESSION['SOFT_ACCESOModifica'.'cuentas']=='1')
				{
                $tabla .="<a class='waves-effect waves-light btn orange lighten-1 modal-trigger botonesm editar' onclick=\"editar('".$fila["4"]."')\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/editar.png' /></i></a>";
                $tabla .="<a class='waves-effect waves-light btn green lighten-1 modal-trigger botonesm editar' onclick=\"imprimirCuentaCobrar('".$fila["4"]."','mensajecc');\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/imprimir.png' /></i></a>";

				}
				

                $tabla .="<a class='waves-effect waves-light btn yellow dark-1 modal-trigger botonesm ver' onClick=\"ver('".$fila["4"]."')\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/ojo.png' /></i></a>";
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

?>
