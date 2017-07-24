<?php



function mostrarCaja($datos)
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
            <th>Corte</th>
            <th>Descripcion</th>
            <th>No. Deposito</th>
            <th>Cuenta Deposito</th>
            <th>Saldo proximo corte</th>
            <th></th>
            
        </tr>
    </thead>
    <tbody>
        <?php

    $mysql = conexionMysql();
     $sql = "SELECT ca.fecha,ca.saldo,ca.descripcion,(select d.comprobante from deposito d where ca.idcaja=d.idcaja order by d.fecha desc limit 1),(select d.nocuenta from deposito d where ca.idcaja=d.idcaja order by d.fecha desc limit 1),ca.idcaja,ca.saldoAct,ca.fechaI,ca.fecha FROM caja ca where ca.fecha>'1991-02-02' order by ca.fecha desc ";
    $tabla="";
    if($resultado = $mysql->query($sql))
    {

        if(mysqli_num_rows($resultado)==0)
        {
            $respuesta = "<tr><td colspan=\"7\">No hay Caja BD vacia</td></tr>";
        }

        else
        {$cont=0;
            while($fila = $resultado->fetch_row())
            {
				$segundos=strtotime($fecha) - strtotime($fila["0"]); //para tu fecha de ejmplo
				$diferencia_dias=intval($segundos/60/60/24);

                $tabla .= "<tr>";

                $tabla .="<td>"     .($fila["0"]).    "</td>";
				$tabla .="<td>" .toMoney($fila["6"]).      "</td>";
                $tabla .="<td>" .$fila["2"]. "</td>";
                $tabla .="<td>" .$fila["3"].      "</td>";
                $tabla .="<td>" .($fila["4"]).      "</td>";
                $tabla .="<td>" .toMoney($fila["1"]).      "</td>";//saldoCorte($fila["0"],$fila["1"])
                $tabla .="<td class='anchoC'>";
				if($_SESSION['SOFT_ACCESOModifica'.'CajaT']=='1')
				{
                    if($cont==0){    
                    $tabla .="<a class='waves-effect waves-light btn orange lighten-1 modal-trigger botonesm editar' onclick=\"editar('".$fila["5"]."')\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/editar.png' /></i></a>";
                    
                    }
				}
				

                $tabla .="<a class='waves-effect waves-light btn yellow dark-1 modal-trigger botonesm ver' onClick=\"ver('".$fila["5"]."')\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/ojo.png' /></i></a>";
                
                if($cont==0){
                $tabla .="<a class='waves-effect waves-light btn green dark-1 modal-trigger botonesm ver' onClick=\"imprimirCorte('".$fila["5"]."','mensaje3','".$fila["7"]."','".$fila["8"]."')\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/imprimir.png' /></i></a>";
                }
                
                $tabla .= "</td></tr>";
                $cont++;
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
echo ($respuesta);
        ?>
    </tbody>
</table>
<?php

}
function saldoCorte($dato,$ant)
{
	

    $mysql = conexionMysql();
    $form=array();
    
			  
			  	$fechaI = $dato;
				//$fechaI = substr($caja[0],0,10);
				$nuevafecha3 = strtotime ( '+1 day' , strtotime ( $fechaI ) ) ;
				//$fechaI = date ( 'Y-m-d' , $nuevafecha3 );
			$sqlVentas = "select sum(total) from ventas where (fecha > '".$fechaI." 00:00:00') and estado=1";
			
			if($resultadoVentas = $mysql->query($sqlVentas))
			{
				if($resultadoVentas->num_rows>0)
				{
					if($Ventas = $resultadoVentas->fetch_row())
					{
						if($Ventas[0]==NULL){
							$form['ventas']=0;
						}else{
						    $form['ventas']=$Ventas[0];
						}
					}
					$resultadoVentas->free();    
				}else{
					$form['ventas']=0;
				}
		  	
			
			}

			$sqlVentasC = "select sum(total) from cuentascobrar where (fecha > '".$fechaI." 00:00:00') and estado=1";

			if($resultadoVentasC = $mysql->query($sqlVentasC))
			{
				if($resultadoVentasC->num_rows>0)
				{
					if($VentasC = $resultadoVentasC->fetch_row())
					{
						if($VentasC[0]==NULL){
							$form['ventasC']=0;
						}else{
						    $form['ventasC']=$VentasC[0];
						}
					}
					$resultadoVentasC->free();    
				}else{
					$form['ventasC']=0;
				}
		  	
			
			}

			$sqlAbonos = "select sum(abono) from movimientosc where (fecha > '".$fechaI." 00:00:00')";

			if($resultadoAbonos = $mysql->query($sqlAbonos))
			{
				if($resultadoAbonos->num_rows>0)
				{
					if($Abonos = $resultadoAbonos->fetch_row())
					{
						if($Abonos[0]==NULL){
							$form['abonos']=0;
						}else{
						    $form['abonos']=$Abonos[0];
						}
					}
					$resultadoAbonos->free();    
				}else{
					$form['abonos']=0;
				}
		  	
			
			}

			$sqlGastos = "select sum(monto) from gastos where (fecha > '".$fechaI." 00:00:00')";

			if($resultadoGastos = $mysql->query($sqlGastos))
			{
				if($resultadoGastos->num_rows>0)
				{
					if($Gastos = $resultadoGastos->fetch_row())
					{
						if($Gastos[0]==NULL){
							$form['Gastos']=0;
						}else{
						$form['Gastos']=$Gastos[0];
						}
					}
					$resultadoGastos->free();    
				}else{
					$form['Gastos']=0;
				}
		  	
			
			}
		  

	   
    $form['total']=($form['abonos']+$form['ventasC']+$form['ventas']+$ant)-($form['Gastos']);
    $mysql->close();
    
    return $form['total'];
    
}

function mostrarDepositos($id)
{

    //creacion de la tabla
?>

<table id='tabla' class='bordered centered highlight responsive-table centrarT'>
    <thead>
        <tr>
            <th>Fecha</th>
            <th>No. Cuenta</th>
            <th>Banco</th>
            <th>Monto</th>
            <th></th>
            
            
        </tr>
    </thead>
    <tbody>
        <?php
session_start();
    $mysql = conexionMysql();
	if($id[0]!="")
	{
		$id2=" WHERE d.idcaja=".$id[0]." and estado=1";
	}
    $sql = "SELECT d.fecha,d.comprobante,d.nocuenta,d.banco,d.monto,(select c.saldo from caja c where d.idcaja=c.idcaja),d.iddeposito FROM deposito d ".$id2;
    $tabla="";
    $total=0;
    $total2=0;
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
                $tabla .="<td>" .$fila["2"].  "</td>";
                $tabla .="<td>" .($fila["3"]).      "</td>";
				$tabla .="<td>" .toMoney($fila["4"]).      "</td>";
                $tabla .= "<td>";
               if($_SESSION['SOFT_ACCESOElimina'.'CajaT']=='1')
				{
                    //if($cont==0)
                    {
                    $tabla .="<a class='waves-effect waves-light btn red lighten-1 modal-trigger botonesm modaleliminarFila' onclick=\"eliminar('".$fila["6"]."','".$id[0]."');\"><i class='material-icons left'><img class='iconoaddcrud' src='../app/img/boton-borrar.png' /></i></a>";
                    }
                }
                $tabla .= "</td></tr>";
                $total+=$fila["4"];
                $total2=$fila["5"];
                
            }

            $resultado->free();//librerar variable


            $respuesta = $tabla;
        }
    }
    else
    {
        $respuesta = "<div class='error'>Error: no se ejecuto la consulta a BD</div>";

    }
     $respuesta .= "<script>
           // $('#saldoE').html('Saldo Proximo Corte: ".toMoney(saldoCorte($id[1],$total2))."');
     </script>";
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
