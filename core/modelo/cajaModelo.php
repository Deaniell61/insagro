<?php


function mostrarCorteCaja($dato)
{
	

    $mysql = conexionMysql();
    $form=array();
    $sqlCaja = "select fecha,saldo from caja order by fecha desc limit 1";

    if($resultadoCaja = $mysql->query($sqlCaja))
    {
      if($resultadoCaja->num_rows>0)
	  {
		  if($caja = $resultadoCaja->fetch_row())
		  {
			  $form['estatus']=1;
			  $form['saldoAnt']=toMoney($caja[1]);
			  $fechaF = date('Y-m-d H:i:s');
				$fechaI = ($caja[0]);
				$nuevafecha3 = strtotime ( '+1 day' , strtotime ( $fechaI ) ) ;
				//$fechaI = date ( 'Y-m-d' , $nuevafecha3 );
			$sqlVentas = "select sum(total) from ventas where (fecha between '".$fechaI."' and '".$fechaF."') and estado=1 and tipoventa=1";
			$form['fechaI']=$fechaI;
			$form['fechaF']=$fechaF;
			if($resultadoVentas = $mysql->query($sqlVentas))
			{
				if($resultadoVentas->num_rows>0)
				{
					if($Ventas = $resultadoVentas->fetch_row())
					{
						if($Ventas[0]==NULL){
							$form['ventas']=toMoney(0);
						}else{
						$form['ventas']=toMoney($Ventas[0]);
						}
					}
					$resultadoVentas->free();    
				}else{
					$form['ventas']=0;
				}
		  	
			
			}

			$sqlVentasC = "select sum(total) from ventas where (fecha between '".$fechaI."' and '".$fechaF."') and estado=1 and tipoventa=2";

			if($resultadoVentasC = $mysql->query($sqlVentasC))
			{
				if($resultadoVentasC->num_rows>0)
				{
					if($VentasC = $resultadoVentasC->fetch_row())
					{
						if($VentasC[0]==NULL){
							$form['ventasC']=toMoney(0);
						}else{
						$form['ventasC']=toMoney($VentasC[0]);
						}
					}
					$resultadoVentasC->free();    
				}else{
					$form['ventasC']=0;
				}
		  	
			
			}

			$sqlAbonos = "SELECT sum(abono) FROM movimientosc cc WHERE (cc.fecha between '".$fechaI."' and '".$fechaF."') and ((select c.estado from cuentascobrar c where c.idcuentasc=cc.idcuentasc)=1 or (select c.estado from cuentascobrar c where c.idcuentasc=cc.idcuentasc)=3)";     
    
			if($resultadoAbonos = $mysql->query($sqlAbonos))
			{
				if($resultadoAbonos->num_rows>0)
				{
					if($Abonos = $resultadoAbonos->fetch_row())
					{
						$form['abonosSQL']=($sqlAbonos);
						if($Abonos[0]==NULL){
							$form['abonos']=toMoney(0);
						}else{
						$form['abonos']=toMoney($Abonos[0]);
						}
					}
					$resultadoAbonos->free();    
				}else{
					$form['abonos']=0;
				}
		  	
			
			}

			$sqlGastos = "select sum(monto) from gastos where (fecha between '".$fechaI."' and '".$fechaF."')";

			if($resultadoGastos = $mysql->query($sqlGastos))
			{
				if($resultadoGastos->num_rows>0)
				{
					if($Gastos = $resultadoGastos->fetch_row())
					{
						if($Gastos[0]==NULL){
							$form['Gastos']=toMoney(0);
						}else{
						$form['Gastos']=toMoney($Gastos[0]);
						}
					}
					$resultadoGastos->free();    
				}else{
					$form['Gastos']=0;
				}
		  	
			
			}
		  }
		$resultadoCaja->free();
	  }
	  else
	  {
		$form['estatus']=0;
	  }
	      
    
    }
    else
    {   
    
    $form['estatus']="no se pudo ";
    
    }
    
    
    $mysql->close();
    
    echo json_encode($form);
    
}

function ingresarCorteCaja($dato)
{
	

    $mysql = conexionMysql();
    $form=array();
    
	$fechaF = $dato[2];
	$fechaI = $dato[1];
	$saldo = $dato[3];
	$saldoAnt = $dato[5];
	$descripcion = $dato[4];
	$sqlCajaIns = "insert into caja(fecha,descripcion,saldo,estado,saldoAnt,saldoAct,fechaI) values('".$fechaF."','".$descripcion."','".$saldo."',1,'".$saldoAnt."','".$saldo."','".$fechaI."');";			
    $mysql->query("BEGIN");
	if($resultadoCaja = $mysql->query($sqlCajaIns))
    {
	$sqlCaja = "select idcaja,fecha,fechaI from caja order by idcaja desc limit 1";			
    if($resultadoCaja = $mysql->query($sqlCaja))	
	  {
		  if($caja = $resultadoCaja->fetch_row())
		  {
			  $form['estatus']=1;
			  $id=$caja[0];
				$fechaF = $caja[1];
				$fechaI = $caja[2];
			  	
			$sqlVentas = "select total,idventas from ventas where (fecha between '".$fechaI."' and '".$fechaF."') and estado=1 and tipoventa=1";
			if($resultadoVentas = $mysql->query($sqlVentas))
			{
				if($resultadoVentas->num_rows>0)
				{
					while($Ventas = $resultadoVentas->fetch_row())
					{
						if($Ventas[0]==NULL){
							$CajaIns="insert into detalleCaja(entrada,idventa,estado,idcaja) values(0,'".$Ventas[1]."',1,'".$id."')";
							$mysql->query($CajaIns);
						
						}else{
							$CajaIns="insert into detalleCaja(entrada,idventa,estado,idcaja) values('".$Ventas[0]."','".$Ventas[1]."',1,'".$id."')";
							$mysql->query($CajaIns);
						
						}
					}
					$resultadoVentas->free();    
				}else{
					$form['ventas']=0;
				}
		  	
			
			}

			$sqlVentasC = "select total,idcuentasc from cuentascobrar where (fecha between '".$fechaI."' and '".$fechaF."') and estado=1";

			if($resultadoVentasC = $mysql->query($sqlVentasC))
			{
				if($resultadoVentasC->num_rows>0)
				{
					while($VentasC = $resultadoVentasC->fetch_row())
					{
						if($VentasC[0]==NULL){
							$CajaIns="insert into detalleCaja(entrada,idcuentaC,estado,idcaja) values(0,'".$VentasC[1]."',1,'".$id."')";
							$mysql->query($CajaIns);
						}else{
							$CajaIns="insert into detalleCaja(entrada,idcuentaC,estado,idcaja) values('".$VentasC[0]."','".$VentasC[1]."',1,'".$id."')";
							$mysql->query($CajaIns);
						}
					}
					$resultadoVentasC->free();    
				}else{
					$form['ventasC']=0;
				}
		  	
			
			}

			$sqlAbonos = "SELECT abono,idmovimientoc FROM movimientosc cc WHERE (cc.fecha between '".$fechaI."' and '".$fechaF."') and ((select c.estado from cuentascobrar c where c.idcuentasc=cc.idcuentasc)=1 or (select c.estado from cuentascobrar c where c.idcuentasc=cc.idcuentasc)=3)";     
    
			if($resultadoAbonos = $mysql->query($sqlAbonos))
			{
				if($resultadoAbonos->num_rows>0)
				{
					if($Abonos = $resultadoAbonos->fetch_row())
					{
						if($Abonos[0]==NULL){
							$CajaIns="insert into detalleCaja(entrada,idabono,estado,idcaja) values(0,'".$Abonos[1]."',1,'".$id."')";
							$mysql->query($CajaIns);
						}else{
							$CajaIns="insert into detalleCaja(entrada,idabono,estado,idcaja) values('".$Abonos[0]."','".$Abonos[1]."',1,'".$id."')";
							$mysql->query($CajaIns);
						}
					}
					$resultadoAbonos->free();    
				}else{
					$form['abonos']=0;
				}
		  	
			
			}

			$sqlGastos = "select monto,idgastos from gastos where (fecha between '".$fechaI."' and '".$fechaF."') and estado=1";

			if($resultadoGastos = $mysql->query($sqlGastos))
			{
				if($resultadoGastos->num_rows>0)
				{
					if($Gastos = $resultadoGastos->fetch_row())
					{
						if($Gastos[0]==NULL){
							$CajaIns="insert into detalleCaja(salida,idgasto,estado,idcaja) values(0,'".$Gastos[1]."',1,'".$id."')";
							$mysql->query($CajaIns);
						}else{
							$CajaIns="insert into detalleCaja(salida,idgasto,estado,idcaja) values('".$Gastos[0]."','".$Gastos[1]."',1,'".$id."')";
							$mysql->query($CajaIns);
						}
					}
					$resultadoGastos->free();    
				}else{
					$form['Gastos']=0;
				}
		  	
			
			}
		  }
		$resultadoCaja->free();
		$mysql->query("COMMIT");
	  }
	  else
	  {
		$form['estatus']=0;
	  }
	      
    
    }
    else
    {   
    
    $form['estatus']="no se pudo ";
    
    }
    
    
    $mysql->close();
    
    echo json_encode($form);
    
}

function editarCaja($dato)
{
	

    $mysql = conexionMysql();
    $form="";
     $sql = "SELECT idcaja,fecha,saldoAct,descripcion,saldo FROM caja where estado=1 and idcaja='".$dato['0']."' ";

    if($resultado = $mysql->query($sql))
    {
      if($resultado->num_rows>0)
	  {
		  if($fila = $resultado->fetch_row())
		  {
		  	$form .="<script>";
			$form .="document.getElementById('codigo').disabled=false;document.getElementById('codigo').value='".$fila[0]."';document.getElementById('codigo').focus();document.getElementById('codigo').disabled=true;";
			$form .="document.getElementById('fechaCorte').disabled=false;document.getElementById('fechaCorte').value='".substr($fila[1],0,10)."';document.getElementById('fechaCorte').focus();document.getElementById('fechaCorte').disabled=true;";
			$form .="document.getElementById('totalCorte').disabled=false;document.getElementById('totalCorte').value='".toMoney($fila[2])."';document.getElementById('totalCorte').focus();document.getElementById('totalCorte').disabled=true;";
			$form .="document.getElementById('descripcion').disabled=false;document.getElementById('descripcion').value='".$fila[3]."';document.getElementById('descripcion').focus();document.getElementById('descripcion').disabled=true;";
			$form .="$('#saldoE').html('Saldo Proximo Corte: ".toMoney($fila[4])."');";
			 
			$form .="cargarDepositos('".$fila[0]."');";
			$form .="</script>";
			
		}
		$resultado->free();    
	  }
	  else
	  {
		$form .="<script>";
			$form .="document.getElementById('productosContenedor').hidden=true;";
			$form .="</script>";
	  }
    
    }
    else
    {   
    
    $form = "<div>$sql<script>console.log('".$dato[0]."');</script></div>";
    
    }
    
    
    $mysql->close();
    
    echo ($form);
    
}



function ingresoDeposito($dato)
{
	

    $mysql = conexionMysql();
    $form="";
     $sql = "insert into deposito(fecha,comprobante,nocuenta,banco,monto,idcaja,estado) values('".date('Y-m-d H:i:s')."','".$dato['2']."','".$dato['3']."','".$dato['4']."','".$dato['5']."','".$dato['0']."',1); ";

    if($resultado = $mysql->query($sql))
    {
		$sql2 = "update caja set saldo=saldo-".$dato['5']." where idcaja='".$dato['0']."'; ";

		if($resultado2 = $mysql->query($sql2))
		{
			$form .="<script>";
			$form .="location.reload();";
			$form .="</script>";
		}
    
    }
    else
    {   
    
    	$form = "<div>$sql</div>";
    
    }
    
    
    $mysql->close();
    
    echo ($form);
    
}

function  datosImpresionCaja($dato)
{
    

    $mysql = conexionMysql();
    $form="";
	
		$valVenta="";
		$valVentaC="";
		$valAbono="";
		$valGasto="";
		$valSaldo="";
		$valSaldoAnt="";
		$valSaldoPC="";
	
    //$sqlCaja = "SELECT sum(entrada) as total FROM detalleCaja WHERE idventa>0 and idcaja='".$dato[0]."' ";
		$sqlCaja = "select sum(total) from ventas where (fecha between '".$dato[3]."' and '".$dato[2]."') and estado=1 and tipoventa=1";
			
 	//echo $sql;
	 
    if($resultadoCaja = $mysql->query($sqlCaja))
    {
      if($resultadoCaja->num_rows>0)
	  {
		  
		  
		  if($filaCaja = $resultadoCaja->fetch_row())
		  {
			if($filaCaja[0]==NULL){
			$valVenta = '0';
			  }else{
			$valVenta = $filaCaja[0];
			  }

			}
		$resultadoCaja->free();    
	  }
	  else
	  {
		
	  }
    
    }
    else
    {   
    
    	
    
    }

		$sqlCaja = "select sum(total) from ventas where (fecha between '".$dato[3]."' and '".$dato[2]."') and estado=1 and tipoventa=2";
			
 	//echo $sql;
	 
    if($resultadoCaja = $mysql->query($sqlCaja))
    {
      if($resultadoCaja->num_rows>0)
	  {
		  
		  
		  if($filaCaja = $resultadoCaja->fetch_row())
		  {
			if($filaCaja[0]==NULL){
			$valVentaC = '0';
			  }else{
			$valVentaC = $filaCaja[0];
			  }

			}
		$resultadoCaja->free();    
	  }
	  else
	  {
		
	  }
    
    }
    else
    {   
    
    	
    
    }

	//$sqlCaja = "SELECT sum(entrada) as total FROM detalleCaja WHERE idabono>0 and idcaja='".$dato[0]."' ";
	$sqlCaja = "SELECT sum(abono) FROM movimientosc cc WHERE (cc.fecha between '".$dato[3]."' and '".$dato[2]."') and ((select c.estado from cuentascobrar c where c.idcuentasc=cc.idcuentasc)=1 or (select c.estado from cuentascobrar c where c.idcuentasc=cc.idcuentasc)=3)";     
    
 	//echo $sql;
	
    if($resultadoCaja = $mysql->query($sqlCaja))
    {
      if($resultadoCaja->num_rows>0)
	  {
		  
		  
		  if($filaCaja = $resultadoCaja->fetch_row())
		  {
			  if($filaCaja[0]==NULL){
			$valAbono = '0';
			  }else{
			$valAbono = $filaCaja[0];
			  }
			}
		$resultadoCaja->free();    
	  }
	  else
	  {
		
	  }
    
    }
    else
    {   
    
    	
    
    }

	//$sqlCaja = "SELECT sum(salida) as total FROM detalleCaja WHERE idgasto>0 and idcaja='".$dato[0]."' ";
	$sqlCaja = "select sum(monto) from gastos where (fecha between '".$dato[3]."' and '".$dato[2]."')";
 	//echo $sql;
	 
    if($resultadoCaja = $mysql->query($sqlCaja))
    {
      if($resultadoCaja->num_rows>0)
	  {
		  
		  
		  if($filaCaja = $resultadoCaja->fetch_row())
		  {
			if($filaCaja[0]==NULL){
			$valGasto = '0';
			  }else{
			$valGasto = $filaCaja[0];
			  }

			}
		$resultadoCaja->free();    
	  }
	  else
	  {
		
	  }
    
    }
    else
    {   
    
    	
    
    }

	$sqlCaja = "SELECT saldoAct,saldoAnt,fecha,saldo as total,saldo FROM caja WHERE idcaja='".$dato[0]."' ";
 	//echo $sql;
	 
    if($resultadoCaja = $mysql->query($sqlCaja))
    {
      if($resultadoCaja->num_rows>0)
	  {
		  
		  
		  if($filaCaja = $resultadoCaja->fetch_row())
		  {
			if($filaCaja[0]==NULL){
			$valSaldo = '0';
			  }else{
			$valSaldo = $filaCaja[0];
			  }

			if($filaCaja[1]==NULL){
			$valSaldoAnt = '0';
			  }else{
			$valSaldoAnt = $filaCaja[1];
			  }
			if($filaCaja[0]==NULL){
			$valSaldoPC = '0';
			  }else{
			$valSaldoPC = ($filaCaja[3]);
			  }
			

			}
		$resultadoCaja->free();    
	  }
	  else
	  {
		
	  }
    
    }
    else
    {   
    
    	
    
    }
	$valIngredos = floatval($valAbono)+floatval($valVenta)+floatval($valSaldoAnt)+floatval($valVentaC);
	$valEgresos = floatval($valGasto);
	$valTotales = $valSaldo;
		$form .= '<div class="ingresos">'.
           '<div class="row FilaDeposito"><div class="col s2 offset-s4">(+) Saldo Anterior </div>'.
           '<div class="col s1 offset-s1">'.toMoney($valSaldoAnt).'</div></div>'.
           '<div class="row FilaDeposito"><div class="col s2 offset-s4">(+) Ventas al Contado </div>'.
           '<div class="col s1 offset-s1">'.toMoney($valVenta).'</div></div>'.
           '<div class="row FilaDeposito"><div class="col s2 offset-s4">(+) Ventas al Credito </div>'.
           '<div class="col s1 offset-s1">'.toMoney($valVentaC).'</div></div>';
	$sqlDetalleAbonos = "select cl.nombre,sum(mc.abono) from movimientosc mc inner join cuentascobrar cc on cc.idcuentasc=mc.idcuentasc inner join ventas v on v.idventas=cc.idventas inner join cliente cl on cl.idcliente=v.idcliente  WHERE (cc.fecha between '".$dato[3]."' and '".$dato[2]."') and (cc.estado=1 or cc.estado=3) group by cl.nombre;";
    if($resultadoDetalleAbonos = $mysql->query($sqlDetalleAbonos))
    {
			if($resultadoDetalleAbonos->num_rows>0)
			{
					while($filaDetalleAbonos = $resultadoDetalleAbonos->fetch_row())
					{
							$form .='<div class="row FilaDeposito"><div class="col s4 offset-s0">'.$filaDetalleAbonos['0'].'</div>'.
											'<div class="col s1">'.toMoney($filaDetalleAbonos['1']).'</div></div>';						
					}
				$resultadoDetalleAbonos->free();    
			}
			else
			{
				
			}
    
    }
    else
    {   
    
    	
    
    }

   $form .='<div class="row FilaDeposito"><div class="col s3 offset-s4">(+) Abonos de Clientes </div>'.
           '<div class="col s1 offset-s">'.toMoney($valAbono).'</div></div>'.
           '<div class="row FilaDeposito "><div class="col s2 offset-s4">Total Ingresos </div>'.
           '<div class="col s1 offset-s1 border">'.toMoney($valIngredos).'</div></div>'.
           '</div>';
			$sqlDepositos = "SELECT fecha,comprobante,nocuenta,banco,monto FROM deposito WHERE idcaja='".$dato[0]."' ";
			$totalD=0;
 		if($resultadoDepositos = $mysql->query($sqlDepositos))
    {
			if($resultadoDepositos->num_rows>0)
			{
					while($filaDepositos = $resultadoDepositos->fetch_row())
					{
							$form .='<div class="row FilaDeposito"><div class="col s1 offset-s0">'.$filaDepositos['3'].'</div>'.
											'<div class="col s3">'.($filaDepositos['1']==''?'':$filaDepositos['1']).'</div>'.
											'<div class="col s1">'.toMoney($filaDepositos['4']).'</div></div>';	
							$totalD += floatval($filaDepositos['4']);			
					}
				$resultadoDepositos->free();    
			}
			else
			{
				
			}
    
    }
    else
    {   
    
    	
    
    }
		$form .='<div class="row FilaDeposito"><div class="col s3 offset-s4">(-) Depositos Bancarios</div>'.
						'<div class="col s1 offset-s">'.toMoney($totalD).'</div></div>';
		$sqlDepositos = "select cl.nombre,sum(v.total) from cuentascobrar cc inner join ventas v on v.idventas=cc.idventas inner join cliente cl on cl.idcliente=v.idcliente  WHERE (v.fecha between '".$dato[3]."' and '".$dato[2]."') and v.estado>=1 and v.tipoventa=2 group by cl.nombre;";
  
			$totalC=0;
 		if($resultadoDepositos = $mysql->query($sqlDepositos))
    {
			if($resultadoDepositos->num_rows>0)
			{
					while($filaDepositos = $resultadoDepositos->fetch_row())
					{
							$form .='<div class="row FilaDeposito"><div class="col s4 offset-s0">'.$filaDepositos['0'].'</div>'.
											'<div class="col s1">'.toMoney($filaDepositos['1']).'</div></div>';	
							$totalC += floatval($filaDepositos['1']);			
					}
				$resultadoDepositos->free();    
			}
			else
			{
				
			}
    
    }
    else
    {   
    
    	
    
    }
		$form .='<div class="row FilaDeposito"><div class="col s3 offset-s4">(-) Ventas al Credito</div>'.
						'<div class="col s1 offset-s">'.toMoney($totalC).'</div></div>';

		$sqlDepositos = "select cl.nombre,sum(v.total) from cuentascobrar cc inner join ventas v on v.idventas=cc.idventas inner join cliente cl on cl.idcliente=v.idcliente  WHERE (v.fecha between '".$dato[3]."' and '".$dato[2]."') and v.estado>=1 and v.tipoventa=2 group by cl.nombre;";
		$sqlDepositos = "select descripcion,(monto) from gastos where (fecha between '".$dato[3]."' and '".$dato[2]."')";
 	
			$totalG=0;
 		if($resultadoDepositos = $mysql->query($sqlDepositos))
    {
			if($resultadoDepositos->num_rows>0)
			{
					while($filaDepositos = $resultadoDepositos->fetch_row())
					{
							$form .='<div class="row FilaDeposito"><div class="col s4 offset-s0">'.$filaDepositos['0'].'</div>'.
											'<div class="col s1">'.toMoney($filaDepositos['1']).'</div></div>';	
							$totalG += floatval($filaDepositos['1']);			
					}
				$resultadoDepositos->free();    
			}
			else
			{
				
			}
    
    }
    else
    {   
    
    	
    
    }

		$form .='<div class="row FilaDeposito"><div class="col s3 offset-s4">(-) Gastos</div>'.
           '<div class="col s1 offset-s">'.toMoney($valGasto).'</div></div>'.
           '<div class="row FilaDeposito"><div class="col s2 offset-s4">Total Egresos </div>'.
           '<div class="col s1 offset-s1 border">'.toMoney($valGasto+$totalD+$totalC).'</div></div>'.
           '</div>';
		$form .='<div class="row FilaDeposito"><div class="col s3 offset-s4">Saldo Final</div>'.
           '<div class="col s1 offset-s">'.toMoney($valSaldoPC).'</div></div>';
	//$form['caja']['egresos']+=$form['total'];
	//$form['estatus']=$sqlDetalleCaja;
    $mysql->close();
    
    echo ($form);
    
}

function eliminaCaja($dato){
	$mysql = conexionMysql();
    $form="";
     $sql = "update deposito set estado=0 where iddeposito='".$dato['0']."'; ";

    if($resultado = $mysql->query($sql))
    {
		$sql2 = "update caja set saldo=saldo+(select monto from deposito where iddeposito='".$dato['0']."') where idcaja='".$dato['1']."'; ";

			if($resultado2 = $mysql->query($sql2))
			{
				//$form .=$sql.$sql2;
				$form .="<script>";
				$form .="location.reload();";
				$form .="</script>";
			}
    
    }
    else
    {   
    
    	$form = "<div>$sql</div>";
    
    }
    
    
    $mysql->close();
    
    echo ($form);
}
function clienteCuenta($idventas, $mysql){
	$sqlCliente = "(select cl.nombre,cl.apellido from cliente cl inner join ventas v on v.idcliente=cl.idcliente where v.idventas='".$idventas."')";
						
						if($resultadoCliente = $mysql->query($sqlCliente))
						{
							if($resultadoCliente->num_rows>0)
							{
								if($filaCliente = $resultadoCliente->fetch_row())
								{
									//array_push($form['DetalleCuentas'][$i], $filaCliente['nombre']);
									return $filaCliente[0];
									
								}
							}
							$resultadoCliente->free();  
						}
}
?>