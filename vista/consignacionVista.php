<?php



function mostrarConsignacion($dato)
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
            <th>No. Factura</th>
            <th>NIT</th>
            <th>Proveedor</th>
            <th>Total</th>
            <th>Saldo</th>
            <th></th>
            
        </tr>
    </thead>
    <tbody>
        <?php

    $mysql = conexionMysql();
    
    $sql = "SELECT c.fecha,c.nocomprobante,p.nit,p.nombreempresa,c.total,(select tv.Descripcion from tipocompra tv where tv.idtipo=c.tipocompra),c.idcompras,(select cong.saldo from consignacion cong where cong.idcompras=c.idcompras order by cong.fecha desc limit 1) FROM compras c inner join proveedor p on p.idproveedor=c.iddistribuidor inner join compradetalle cd on cd.idcompras=c.idcompras inner join productos pd on pd.idproductos=cd.idproductos where c.estado=1 and cd.estado=1 and c.tipocompra=5 $mas group by c.idcompras order by c.fecha desc";
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
				$tabla .="<td>" .$fila["1"].      "</td>";
				$tabla .="<td>" .$fila["2"].      "</td>";
                $tabla .="<td>" .$fila["3"].      "</td>";
                $tabla .="<td>" .toMoney($fila["4"]).      "</td>";
                $tabla .="<td>" .toMoney($fila["7"]).      "</td>";
                $tabla .="<td class='anchoC'>";
				if($_SESSION['SOFT_ACCESOModifica'.'cuentas']=='1')
				{
                $tabla .="<a class='waves-effect waves-light btn orange lighten-1 modal-trigger botonesm editar' onclick=\"editar('".$fila["6"]."')\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/editar.png' /></i></a>";
                
				}
				

                $tabla .="<a class='waves-effect waves-light btn yellow dark-1 modal-trigger botonesm ver' onClick=\"ver('".$fila["6"]."');\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/ojo.png' /></i></a>";
                $tabla .="<a class='waves-effect waves-light btn green lighten-1 modal-trigger botonesm editar' onclick=\"imprimirCuentaPagar11('".$fila["6"]."','mensajeccV');\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/imprimir.png' /></i></a>";
                
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


function mostrarMovimientosConsignacion($id)
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
    $sql = "SELECT cc.fecha,cc.descripcion,cc.retirado,cc.consignado FROM consignacion cc  WHERE cc.idcompras=".$id['0'];
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