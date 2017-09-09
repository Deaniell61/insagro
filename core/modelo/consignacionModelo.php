<?php


function editarConsignacion($dato)
{
	

    $mysql = conexionMysql();
    $form="";
    $sql = "SELECT c.fecha,c.nocomprobante,p.nit,p.nombreempresa,c.total,c.tipocompra,c.idcompras,p.direccion,(select cong.saldo from consignacion cong where cong.idcompras=c.idcompras order by cong.fecha desc limit 1) FROM compras c inner join proveedor p on p.idproveedor=c.iddistribuidor where (c.estado=1 or c.estado=0) and c.tipocompra=5 and c.idcompras='".$dato[0]."' ";
	

    if($resultado = $mysql->query($sql))
    {
      if($resultado->num_rows>0)
	  {
		  if($fila = $resultado->fetch_row())
		  {
			  if($fila[8]==''){
				$fila[8]=$fila[4];
			  }
		  	$form .="<script>";
			$form .="document.getElementById('saldoED').disabled=false;document.getElementById('saldoED').value='".$fila[8]."';document.getElementById('saldoED').focus();document.getElementById('saldoED').disabled=true;";
			$form .="document.getElementById('codigo').disabled=false;document.getElementById('codigo').value='".$fila[6]."';document.getElementById('codigo').focus();document.getElementById('codigo').disabled=true;";
			$form .="document.getElementById('totalCreditoED').disabled=false;document.getElementById('totalCreditoED').value='".$fila[4]."';document.getElementById('totalCreditoED').focus();document.getElementById('totalCreditoED').disabled=true;";
			$form .="document.getElementById('fechaInicialED').disabled=false;document.getElementById('fechaInicialED').value='".substr($fila[0],0,10)."';document.getElementById('fechaInicialED').focus();document.getElementById('fechaInicialED').disabled=true;";
			$form .="document.getElementById('proveedorED').disabled=false;document.getElementById('proveedorED').value='".$fila[3]."';document.getElementById('proveedorED').focus();document.getElementById('proveedorED').disabled=true;";
			$form .="cargarConsignaciones('".$dato[0]."');";
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
    
    return printf($form);
    
}
function verConsignacion($dato)
{
	

    $mysql = conexionMysql();
    $form="";
    $sql = "SELECT cc.fecha,cc.plazo,cc.tipoPlazo,cc.creditodado,cc.total,cc.idcompras,(select c.nombreempresa from proveedor c where c.idproveedor=v.iddistribuidor limit 1),(select c.direccion from proveedor c where c.idproveedor=v.iddistribuidor limit 1),(select c.telefono from proveedor c where c.idproveedor=v.iddistribuidor limit 1) FROM cuentaspagar cc inner join compras v on v.idcompras=cc.idcompras WHERE cc.estado=1 and cc.idcuentasP='".$dato[0]."' ";
	$sql = "SELECT c.fecha,c.nocomprobante,p.nit,p.nombreempresa,c.total,c.tipocompra,c.idcompras,p.direccion,(select cong.saldo from consignacion cong where cong.idcompras=c.idcompras order by cong.fecha desc limit 1) FROM compras c inner join proveedor p on p.idproveedor=c.iddistribuidor where (c.estado=1 or c.estado=0) and c.tipocompra=5 and c.idcompras='".$dato[0]."' ";

    if($resultado = $mysql->query($sql))
    {
      if($resultado->num_rows>0)
	  {
		  if($fila = $resultado->fetch_row())
		  {
			if($fila[8]==''){
				$fila[8]=$fila[4];
			  }
			  $form .="<script>";
			  
			$form .="document.getElementById('proveedorV').disabled=false;document.getElementById('proveedorV').value='".$fila[3]."';document.getElementById('proveedorV').focus();document.getElementById('proveedorV').disabled=true;";
			$form .="document.getElementById('fechaCredito').disabled=false;document.getElementById('fechaCredito').value='".substr($fila[0],0,10)."';document.getElementById('fechaCredito').focus();document.getElementById('fechaCredito').disabled=true;";
			$form .="document.getElementById('saldoV').innerHTML='Saldo: ".toMoney($fila[8])."';";
			$form .="document.getElementById('direccionV').disabled=false;document.getElementById('direccionV').value='".$fila[7]."';document.getElementById('direccionV').focus();document.getElementById('direccionV').disabled=true;";
			$form .="cargarConsignaciones('".$dato[0]."');";
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
    
    return printf($form);
    
}

function abonarConsignacion($datos)
{
	$mysql = conexionMysql();
    $form="";
	session_start();
	$mysql->query("BEGIN");
	
	if($cont=$mysql->query("select total from compras where idcompras='".$datos[0]."'"))
	{
			 
				 $fila = $cont->fetch_row();
				 
				 if($fila[0]<$datos[1])
				 {
					 $datos[1]=$fila[0];
				 }
	$saldo=$datos[3]-$datos[1];
	$total=$fila[0]-$datos[1];
	if($datos[1]>0)
	{		 
    $sql = "INSERT INTO consignacion(consignado,retirado,saldo,fecha,descripcion,idCompras,idusuario) values('".$datos[5]."','".$datos[1]."','".$saldo."','".date('Y-m-d H:i:s')."','".$datos[4]."',".$datos[0].",'".$_SESSION['SOFT_USER_ID']."')";
 
    if($mysql->query($sql))
    {
			 
				 	  if(!$mysql->query("update compras set total=total where idCompras='".$datos[0]."'"))
					 {
						
						 $mysql->query("ROLLBACK");
					 }
					 else
					 {
						 if($total==0)
						 {
							 if(!$mysql->query("update compras set tipocompra=1 where idCompras='".$datos[0]."'"))
							 {
								  $mysql->query("ROLLBACK");
							 }
						 }
						 
						 echo "<script>window.location.reload();cargarConsignaciones('".$datos[0]."');limpiarAbono();document.getElementById('saldoE').innerHTML='Saldo: ".toMoney($saldo)."';</script>";
						 
					 }
				     
			 
			 
		
    		$mysql->query("COMMIT");
		
	
    }
    else
    {   
    
    	$form = $sql;
    
    }
    
    }
	else
	{
		 	
		 $mysql->query("ROLLBACK");
		 
	 }
	}
	else
	{
		echo "<script>window.location.reload();</script>";
	}
    $mysql->close();
    
    return printf($form);
  
}

function abonarConsignacionInv($datos)
{
	$mysql = conexionMysql();
    $form="";
	session_start();
	$mysql->query("BEGIN");
	
	if($cont=$mysql->query("select cantidad from inventarioC where idinventarioC='".$datos[0]."'"))
	{
			 
				 $fila = $cont->fetch_row();
				 
				 if($fila[0]<$datos[1])
				 {
					 $datos[1]=$fila[0];
				 }
	$saldo=$datos[3]-$datos[1];
	$total=$fila[0]-$datos[1];
	if($datos[1]>0)
	{		 
    $sql = "INSERT INTO consignacionInv(consignado,retirado,saldo,fecha,descripcion,idInventario,idusuario) values('".$datos[5]."','".$datos[1]."','".$saldo."','".date('Y-m-d H:i:s')."','".$datos[4]."',".$datos[0].",'".$_SESSION['SOFT_USER_ID']."')";
 
    if($mysql->query($sql))
    {
			 
				 	  if(!$mysql->query("update inventarioC set cantidad=cantidad-".$datos[1]." where idinventarioC='".$datos[0]."'"))
					 {
						 $mysql->query("ROLLBACK");
					 }
					 else
					 {
						 if($cont=$mysql->query("select idinventarioC from inventarioP where idproducto='".$datos[6]."'"))
						 {
							if($cont->num_rows>0)
							{
							
								$fila2 = $cont->fetch_row();
								if(!$mysql->query("update inventarioP set cantidad=cantidad+".$datos[1]." where idinventarioC='".$fila2[0]."'"))
								{
									$mysql->query("ROLLBACK");
								}

							}else{
								if(!$mysql->query("INSERT INTO inventarioP(cantidad,precioCosto,precioVenta,precioClienteEs,precioDistribuidor, idproducto,idpresentacion) VALUES ('".$datos[1]."',0,0,0,0,'".$datos[6]."','".$datos[7]."')"))
								{
									$mysql->query("ROLLBACK");
								}
							}
						 }
						
						$mysql->query("COMMIT");
						 
						 echo "<script>window.location.reload();</script>";
						 
					 }
				     
			 
			 
		
    		
		
	
    }
    else
    {   
    
    	$form = $sql;
    
    }
    
    }
	else
	{
		 	
		 $mysql->query("ROLLBACK");
		 
	 }
	}
	else
	{
		echo "<script>window.location.reload();</script>";
	}
    $mysql->close();
    
    return printf($form);
  
}

function abonarConsignacionInvEntr($datos)
{
	$mysql = conexionMysql();
    $form="";
	session_start();
	$mysql->query("BEGIN");
	
	if($cont=$mysql->query("select cantidad from inventarioCxCob where idinventarioC='".$datos[0]."'"))
	{
			 
				 $fila = $cont->fetch_row();
				 
				 if($fila[0]<$datos[1])
				 {
					 $datos[1]=$fila[0];
				 }
	$saldo=$datos[3]-$datos[1];
	$total=$fila[0]-$datos[1];
	if($datos[1]>0)
	{		 
    $sql = "INSERT INTO consignacionInvEnt(consignado,retirado,saldo,fecha,descripcion,idInventario,idusuario) values('".$datos[5]."','".$datos[1]."','".$saldo."','".date('Y-m-d H:i:s')."','".$datos[4]."',".$datos[0].",'".$_SESSION['SOFT_USER_ID']."')";
	echo "error";
    if($mysql->query($sql))
    {
			 
				 	  if(!$mysql->query("update inventarioCxCob set cantidad=cantidad-".$datos[1]." where idinventarioC='".$datos[0]."'"))
					 {
						 $mysql->query("ROLLBACK");
					 }
					 else
					 {
						//  if($cont=$mysql->query("select idinventario from inventario where idproducto='".$datos[6]."'"))
						//  {
						// 	if($cont->num_rows>0)
						// 	{
							
						// 		$fila2 = $cont->fetch_row();
						// 		if(!$mysql->query("update inventario set cantidad=cantidad+".$datos[1]." where idinventario='".$fila2[0]."'"))
						// 		{
						// 			$mysql->query("ROLLBACK");
						// 		}

						// 	}else{
						// 		if(!$mysql->query("INSERT INTO inventario(cantidad,precioCosto,precioVenta,precioClienteEs,precioDistribuidor, idproducto,idpresentacion) VALUES ('".$datos[1]."',0,0,0,0,'".$datos[6]."','".$datos[7]."')"))
						// 		{
						// 			$mysql->query("ROLLBACK");
						// 		}
						// 	}
						//  }
						
						$mysql->query("COMMIT");
						 
						 echo "<script>window.location.reload();</script>";
						 
					 }
				     
			 
			 
		
    		
		
	
    }
    else
    {   
    
    	$form = $sql;
    
    }
    
    }
	else
	{
		 	
		 $mysql->query("ROLLBACK");
		 
	 }
	}
	else
	{
		echo "<script>window.location.reload();</script>";
	}
    $mysql->close();
    
    return printf($form);
  
}




function editarConsignacionxCobrar($dato)
{
	

    $mysql = conexionMysql();
	$form="";
	
    $sql = "SELECT c.fecha,c.nocomprobante,p.nit,p.nombre,c.total,c.tipoventa,c.idventas,p.direccion,(select cong.saldo from consignacionxCob cong where cong.idventas=c.idventas order by cong.fecha desc limit 1) FROM ventas c inner join cliente p on p.idcliente=c.idcliente where (c.estado=1 or c.estado=0) and c.tipoventa=5 and c.idventas='".$dato[0]."' ";
	

    if($resultado = $mysql->query($sql))
    {
      if($resultado->num_rows>0)
	  {
		  if($fila = $resultado->fetch_row())
		  {
			  if($fila[8]==''){
				$fila[8]=$fila[4];
			  }
		  	$form .="<script>";
			$form .="document.getElementById('saldoED').disabled=false;document.getElementById('saldoED').value='".$fila[8]."';document.getElementById('saldoED').focus();document.getElementById('saldoED').disabled=true;";
			$form .="document.getElementById('codigo').disabled=false;document.getElementById('codigo').value='".$fila[6]."';document.getElementById('codigo').focus();document.getElementById('codigo').disabled=true;";
			$form .="document.getElementById('totalCreditoED').disabled=false;document.getElementById('totalCreditoED').value='".$fila[4]."';document.getElementById('totalCreditoED').focus();document.getElementById('totalCreditoED').disabled=true;";
			$form .="document.getElementById('fechaInicialED').disabled=false;document.getElementById('fechaInicialED').value='".substr($fila[0],0,10)."';document.getElementById('fechaInicialED').focus();document.getElementById('fechaInicialED').disabled=true;";
			$form .="document.getElementById('proveedorED').disabled=false;document.getElementById('proveedorED').value='".$fila[3]."';document.getElementById('proveedorED').focus();document.getElementById('proveedorED').disabled=true;";
			$form .="cargarConsignaciones('".$dato[0]."');";
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
    
    return printf($form);
    
}

function abonarConsignacionxCob($datos)
{
	$mysql = conexionMysql();
    $form="";
	session_start();
	$mysql->query("BEGIN");
	
	if($cont=$mysql->query("select total from ventas where idventas='".$datos[0]."'"))
	{
			 
				 $fila = $cont->fetch_row();
				 
				 if($fila[0]<$datos[1])
				 {
					 $datos[1]=$fila[0];
				 }
	$saldo=$datos[3]-$datos[1];
	$total=$fila[0]-$datos[1];
	if($datos[1]>0)
	{		 
    $sql = "INSERT INTO consignacionxCob(consignado,retirado,saldo,fecha,descripcion,idVentas,idusuario) values('".$datos[5]."','".$datos[1]."','".$saldo."','".date('Y-m-d H:i:s')."','".$datos[4]."',".$datos[0].",'".$_SESSION['SOFT_USER_ID']."')";
 
    if($mysql->query($sql))
    {
			 
				 	  if(!$mysql->query("update compras set total=total where idCompras='".$datos[0]."'"))
					 {
						
						 $mysql->query("ROLLBACK");
					 }
					 else
					 {
						 if($total==0)
						 {
							 if(!$mysql->query("update compras set tipocompra=1 where idCompras='".$datos[0]."'"))
							 {
								  $mysql->query("ROLLBACK");
							 }
						 }
						 
						 echo "<script>window.location.reload();</script>";
						 
					 }
				     
			 
			 
		
    		$mysql->query("COMMIT");
		
	
    }
    else
    {   
    
    	$form = $sql;
    
    }
    
    }
	else
	{
		 	
		 $mysql->query("ROLLBACK");
		 
	 }
	}
	else
	{
		echo "<script>window.location.reload();</script>";
	}
    $mysql->close();
    
    return printf($form);
  
}


function datosImpCongnacion($datos){
	
		$mysql = conexionMysql();
		$sql = "SELECT c.fecha,c.nocomprobante,p.nit,p.nombreempresa,c.total,c.tipocompra,c.idcompras,p.direccion,(select cong.saldo from consignacion cong where cong.idcompras=c.idcompras order by cong.fecha desc limit 1) FROM compras c inner join proveedor p on p.idproveedor=c.iddistribuidor where (c.estado=1 or c.estado=0) and c.tipocompra=5 and c.idcompras='".$datos[0]."' ";
		$fecha=date('Y-m-d');
		$cont=0;
		$i=0;
		$return="";
		$encab="<div class=\"navbar-fixed\"><nav><div class=\"nav-wrapper grey darken-4\"><a  class=\"brand-logo\"><img class=\"logo\" src=\"../app/img/logoinsagro1.png\"/></a><div style=\"height: 18px; text-align:right;\">Insagro</div><div  style=\"height: 18px; text-align:right;\">\"Lo mejor para tus plantas\"</div><div  style=\"height: 18px; text-align:right;\">Direccion: Mazatenango</div><div  style=\"height: 18px; text-align:right;\">Tel. 77737775</div><div  style=\"height: 18px; text-align:right;\">Cel. 42207608</div></div></nav></div><br>";
		$plazo = array('','day','month','year');
				$plazo2 = array('','Dia','Mes','Año');
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

					
					$return.=$encab.'<div class="ingresos" style="margin-top:20px;">'.
					'<center><h5 style="text-align: left;" class="CuentasTitulo">Proveedor: '.$fila['3'].'</h5></center>'.
					'<center><div style="text-align: left;">Direccion: '.$fila['7'].'</div></center>'.
					'<center><div style="text-align: left;">Fecha: '.$fila['0'].' </div></center>'.
					'</div>';

					$return.='<div class="deposito">'.
					'<center><h5>Abonos</h5>';
					$return.='<table  class="depositos">';
					$return.='<tr>'.
							 '<th>Descripcion</th>'.
							 '<th>Descripcion</th>'.
							 '<th>Abono</th>'.
							 '</tr>';
				   
							 $sqlDetalleCuentaC = "SELECT cc.fecha,cc.descripcion,cc.retirado,cc.consignado FROM consignacion cc  WHERE cc.idventa=".$datos[0];
							 
							 if($resultado1 = $mysql->query($sqlDetalleCuentaC))
							 {
								 $total =0;
						 
								 if(mysqli_num_rows($resultado1)==0)
								 {
									 $respuesta = "<div class='error'>No hay usuarios BD vacia</div>";
								 }
						 
								 else
								 {
						 
									 while($fila1 = $resultado1->fetch_row())
									 {
										$return.='<tr class="FilaDeposito">'.
										'<td class="fechaFila">'.$fila1['0'].'</td>'.
										'<td class="noCuentaFila">'.$fila1['1'].'</td>'.
										'<td class="bancoFila">'.$fila1['2'].'</td>'.
										'</tr>';
										  
										  $total+=$fila1['2'];
									  }
								 }
								$return.='</table>';
								
				 
				 
							 }		 
				}
	
				$resultado->free();//librerar variable
	
	
			   
			}
		}
		else
		{
			$respuesta = "<div class='error'>Error: no se ejecuto la consulta a BD</div>";
	
		}
	
		//cierro la conexion
		$mysql->close();
		echo ($return);
	}

	function datosImpCongnacionxCob($datos){
		
			$mysql = conexionMysql();
			
			$sql = "SELECT c.fecha,c.nocomprobante,p.nit,p.nombre,c.total,(select tv.Descripcion from tipoventa tv where tv.idtipo=c.tipoventa),c.idventas,(select u.user from usuarios u where u.idusuarios=c.idusuario),(select cong.saldo from consignacionxCob cong where cong.idventas=c.idventas order by cong.fecha desc limit 1) FROM ventas c inner join cliente p on p.idcliente=c.idcliente inner join ventasdetalle cd on cd.idventa=c.idventas inner join productos pd on pd.idproductos=cd.idproductos where c.estado=1 and cd.estado=1 and c.tipoventa=5 and c.idventas='".$datos[0]."' order by c.fecha desc";
			//$sql = "SELECT c.fecha,c.nocomprobante,p.nit,p.nombre,c.total,c.tipoventa,c.idventas,p.direccion,(select cong.saldo from consignacionxCob cong where cong.idventas=c.idventas order by cong.fecha desc limit 1) FROM ventas c inner join cliente p on p.idcliente=c.idcliente where (c.estado=1 or c.estado=0) and c.tipoventa=5 and c.idventa='".$datos[0]."' ";
			$fecha=date('Y-m-d');
			$cont=0;
			$i=0;
			$return="";
			$encab="<div class=\"navbar-fixed\"><nav><div class=\"nav-wrapper grey darken-4\"><a  class=\"brand-logo\"><img class=\"logo\" src=\"../app/img/logoinsagro1.png\"/></a><div style=\"height: 18px; text-align:right;\">Insagro</div><div  style=\"height: 18px; text-align:right;\">\"Lo mejor para tus plantas\"</div><div  style=\"height: 18px; text-align:right;\">Direccion: Mazatenango</div><div  style=\"height: 18px; text-align:right;\">Tel. 77737775</div><div  style=\"height: 18px; text-align:right;\">Cel. 42207608</div></div></nav></div><br>";
			$plazo = array('','day','month','year');
					$plazo2 = array('','Dia','Mes','Año');
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
	
						
						$return.=$encab.'<div class="ingresos" style="margin-top:20px;">'.
						'<center><h5 style="text-align: left;" class="CuentasTitulo">Proveedor: '.$fila['3'].'</h5></center>'.
						'<center><div style="text-align: left;">Direccion: '.$fila['7'].'</div></center>'.
						'<center><div style="text-align: left;">Fecha: '.$fila['0'].' </div></center>'.
						'</div>';
	
						$return.='<div class="deposito">'.
						'<center><h5>Abonos</h5>';
						$return.='<table  class="depositos">';
						$return.='<tr>'.
								 '<th>Descripcion</th>'.
								 '<th>Descripcion</th>'.
								 '<th>Abono</th>'.
								 '</tr>';
					   
								 $sqlDetalleCuentaC = "SELECT cc.fecha,cc.descripcion,cc.retirado,cc.consignado FROM consignacionxCob cc  WHERE cc.idVentas=".$datos['0'];
								 
								 if($resultado1 = $mysql->query($sqlDetalleCuentaC))
								 {
									 $total =0;
							 
									 if(mysqli_num_rows($resultado1)==0)
									 {
										 $respuesta = "<div class='error'>No hay usuarios BD vacia</div>";
									 }
							 
									 else
									 {
							 
										 while($fila1 = $resultado1->fetch_row())
										 {
											$return.='<tr class="FilaDeposito">'.
											'<td class="fechaFila">'.$fila1['0'].'</td>'.
											'<td class="noCuentaFila">'.$fila1['1'].'</td>'.
											'<td class="bancoFila">'.$fila1['2'].'</td>'.
											'</tr>';
											  
											  $total+=$fila1['2'];
										  }
									 }
									$return.='</table>';
									
					 
					 
								 }		 
					}
		
					$resultado->free();//librerar variable
		
		
				   
				}
			}
			else
			{
				$respuesta = "<div class='error'>Error: no se ejecuto la consulta a BD</div>";
		
			}
		
			//cierro la conexion
			$mysql->close();
			echo ($return);
		}


function datosImpInvCongnacion($datos){
	
		$mysql = conexionMysql();
		$sql = "SELECT p.nombre,i.preciocosto,p.idproductos,p.codigoproducto,p.descripcion,i.precioCosto,i.precioVenta,i.precioClienteEs,i.precioDistribuidor,i.cantidad,p.marca2,p.codigoproducto,i.idinventarioC,p.idproductos,(select ps.descripcion from presentacion ps where ps.idpresentacion=i.idpresentacion),p.tiporepuesto FROM inventarioC i inner join productos p on p.idproductos=i.idproducto where  i.cantidad>=0 and i.idInventarioC='".$datos[0]."' order by p.codigoproducto";
		$fecha=date('Y-m-d');
		$cont=0;
		$i=0;
		$return="";
		$encab="<div class=\"navbar-fixed\"><nav><div class=\"nav-wrapper grey darken-4\"><a  class=\"brand-logo\"><img class=\"logo\" src=\"../app/img/logoinsagro1.png\"/></a><div style=\"height: 18px; text-align:right;\">Insagro</div><div  style=\"height: 18px; text-align:right;\">\"Lo mejor para tus plantas\"</div><div  style=\"height: 18px; text-align:right;\">Direccion: Mazatenango</div><div  style=\"height: 18px; text-align:right;\">Tel. 77737775</div><div  style=\"height: 18px; text-align:right;\">Cel. 42207608</div></div></nav></div><br>";
		$plazo = array('','day','month','year');
				$plazo2 = array('','Dia','Mes','Año');
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

					
					$return.=$encab.'<div class="ingresos" style="margin-top:20px;">'.
					'<center><h5 style="text-align: left;" class="CuentasTitulo">Producto: '.$fila['0'].'</h5></center>'.
					'<center><div style="text-align: left;">Codigo: '.$fila['3'].'</div></center>'.
					'<center><div style="text-align: left;">Presentacion: '.$fila['14'].' </div></center>'.
					'<center><div style="text-align: left;">Cantidad: '.$fila['9'].' </div></center>'.
					'<center><div style="text-align: left;">Precio General: '.$fila['6'].' </div></center>'.
					'<center><div style="text-align: left;">Saldo: '.$fila['15'].' </div></center>'.
					'</div>';
					$return.='<div class="deposito">'.
					'<center><h5>Abonos</h5>';
					$return.='<table  class="depositos">';
					$return.='<tr>'.
								'<th>Descripcion</th>'.
								'<th>Descripcion</th>'.
								'<th>Abono</th>'.
								'</tr>';
					
								$sqlDetalleCuentaC = "SELECT cc.fecha,cc.descripcion,cc.retirado,cc.consignado FROM consignacionInv cc  WHERE cc.idInventario=".$datos['0'];
								
								if($resultado1 = $mysql->query($sqlDetalleCuentaC))
								{
									$total =0;
							
									if(mysqli_num_rows($resultado1)==0)
									{
										$respuesta = "<div class='error'>No hay usuarios BD vacia</div>";
									}
							
									else
									{
							
										while($fila1 = $resultado1->fetch_row())
										{
										$return.='<tr class="FilaDeposito">'.
										'<td class="fechaFila">'.$fila1['0'].'</td>'.
										'<td class="noCuentaFila">'.$fila1['1'].'</td>'.
										'<td class="bancoFila">'.$fila1['2'].'</td>'.
										'</tr>';
											
											$total+=$fila1['2'];
										}
									}
								$return.='</table>';
								
					
					
								}		 
				}
	
				$resultado->free();//librerar variable
	
	
				
			}
		}
		else
		{
			$respuesta = "<div class='error'>Error: no se ejecuto la consulta a BD</div>";
	
		}
	
		//cierro la conexion
		$mysql->close();
		echo ($return);
	}
		
function datosImpInvCongnacionxCob($datos){
	
		$mysql = conexionMysql();
	    $sql = "SELECT p.nombre,i.preciocosto,p.idproductos,p.codigoproducto,p.descripcion,i.precioCosto,i.precioVenta,i.precioClienteEs,i.precioDistribuidor,i.cantidad,p.marca2,p.codigoproducto,i.idinventarioC,p.idproductos,(select ps.descripcion from presentacion ps where ps.idpresentacion=i.idpresentacion),p.tiporepuesto,(select cong.saldo from consignacionInvEnt cong where cong.idInventario=i.idInventarioC order by cong.fecha desc limit 1) FROM inventarioCxCob i inner join productos p on p.idproductos=i.idproducto where  i.cantidad>=0 and i.idInventarioC='".$datos[0]."' order by p.codigoproducto";
		//$sql = "SELECT c.fecha,c.nocomprobante,p.nit,p.nombre,c.total,(select tv.Descripcion from tipoventa tv where tv.idtipo=c.tipoventa),c.idventas,(select u.user from usuarios u where u.idusuarios=c.idusuario),(select cong.saldo from consignacionInvEnt cong where cong.idInventario=c.idInventario order by cong.fecha desc limit 1) FROM ventas c inner join cliente p on p.idcliente=c.idcliente inner join ventasdetalle cd on cd.idventa=c.idventas inner join productos pd on pd.idproductos=cd.idproductos where c.estado=1 and cd.estado=1 and c.tipoventa=5 and c.idventas='".$datos[0]."' order by c.fecha desc";
		$fecha=date('Y-m-d');
		$cont=0;
		$i=0;
		$return="";
		$encab="<div class=\"navbar-fixed\"><nav><div class=\"nav-wrapper grey darken-4\"><a  class=\"brand-logo\"><img class=\"logo\" src=\"../app/img/logoinsagro1.png\"/></a><div style=\"height: 18px; text-align:right;\">Insagro</div><div  style=\"height: 18px; text-align:right;\">\"Lo mejor para tus plantas\"</div><div  style=\"height: 18px; text-align:right;\">Direccion: Mazatenango</div><div  style=\"height: 18px; text-align:right;\">Tel. 77737775</div><div  style=\"height: 18px; text-align:right;\">Cel. 42207608</div></div></nav></div><br>";
		$plazo = array('','day','month','year');
				$plazo2 = array('','Dia','Mes','Año');
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

					
					$return.=$encab.'<div class="ingresos" style="margin-top:20px;">'.
					'<center><h5 style="text-align: left;" class="CuentasTitulo">Producto: '.$fila['0'].'</h5></center>'.
					'<center><div style="text-align: left;">Codigo: '.$fila['3'].'</div></center>'.
					'<center><div style="text-align: left;">Presentacion: '.$fila['14'].' </div></center>'.
					'<center><div style="text-align: left;">Cantidad: '.$fila['9'].' </div></center>'.
					'<center><div style="text-align: left;">Precio General: '.$fila['6'].' </div></center>'.
					'<center><div style="text-align: left;">Saldo: '.$fila['15'].' </div></center>'.
					'</div>';

					$return.='<div class="deposito">'.
					'<center><h5>Abonos</h5>';
					$return.='<table  class="depositos">';
					$return.='<tr>'.
								'<th>Descripcion</th>'.
								'<th>Descripcion</th>'.
								'<th>Abono</th>'.
								'</tr>';
					
								$sqlDetalleCuentaC = "SELECT cc.fecha,cc.descripcion,cc.retirado,cc.consignado FROM consignacionInvEnt cc  WHERE cc.idInventario=".$datos['0'];
								
								if($resultado1 = $mysql->query($sqlDetalleCuentaC))
								{
									$total =0;
							
									if(mysqli_num_rows($resultado1)==0)
									{
										$respuesta = "<div class='error'>No hay usuarios BD vacia</div>";
									}
							
									else
									{
							
										while($fila1 = $resultado1->fetch_row())
										{
										$return.='<tr class="FilaDeposito">'.
										'<td class="fechaFila">'.$fila1['0'].'</td>'.
										'<td class="noCuentaFila">'.$fila1['1'].'</td>'.
										'<td class="bancoFila">'.$fila1['2'].'</td>'.
										'</tr>';
											
											$total+=$fila1['2'];
										}
									}
								$return.='</table>';
								
					
					
								}		 
				}
	
				$resultado->free();//librerar variable
	
	
				
			}
		}
		else
		{
			$respuesta = "<div class='error'>Error: no se ejecuto la consulta a BD</div>";
	
		}
	
		//cierro la conexion
		$mysql->close();
		echo ($return);
	}


function datosImpInvFragmentar($datos){
	
		$mysql = conexionMysql();
		$sql = "SELECT p.nombre,i.preciocosto,p.idproductos,p.codigoproducto,p.descripcion,i.precioCosto,i.precioVenta,i.precioClienteEs,i.precioDistribuidor,p.marca2,p.tiporepuesto,i.cantidad FROM inventario i inner join productos p on p.idproductos=i.idproducto where  i.idpresentacion=(select ppp.idpresentacion from presentacion ppp where ppp.descripcion='Quintales' and ppp.estado=1) and i.idproducto='".$datos[0]."'  order by p.codigoproducto";
		$fecha=date('Y-m-d');
		$cont=0;
		$i=0;
		$return="";
		$encab="<div class=\"navbar-fixed\"><nav><div class=\"nav-wrapper grey darken-4\"><a  class=\"brand-logo\"><img class=\"logo\" src=\"../app/img/logoinsagro1.png\"/></a><div style=\"height: 18px; text-align:right;\">Insagro</div><div  style=\"height: 18px; text-align:right;\">\"Lo mejor para tus plantas\"</div><div  style=\"height: 18px; text-align:right;\">Direccion: Mazatenango</div><div  style=\"height: 18px; text-align:right;\">Tel. 77737775</div><div  style=\"height: 18px; text-align:right;\">Cel. 42207608</div></div></nav></div><br>";
		$plazo = array('','day','month','year');
				$plazo2 = array('','Dia','Mes','Año');
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

					
					$return.=$encab.'<div class="ingresos" style="margin-top:20px;">'.
					'<center><h5 style="text-align: left;" class="CuentasTitulo">Producto: '.$fila['0'].'</h5></center>'.
					'<center><div style="text-align: left;">Codigo: '.$fila['3'].'</div></center>'.
					'<center><div style="text-align: left;">Cantidad: '.$fila['9'].' </div></center>'.
					'<center><div style="text-align: left;">Precio General: '.$fila['6'].' </div></center>'.
					'</div>';
					$return.='<div class="deposito">'.
					'<center><h5>Creditos</h5>';
					$return.='<table  class="depositos">';
					$return.='<tr>'.
								'<th>Descripcion</th>'.
								'<th>Descripcion</th>'.
								'<th>Qiintales Acreditados</th>'.
								'</tr>';
					
								$sqlDetalleCuentaC = "SELECT fecha,descripcion,retirado FROM detalleFragmentar where  idinventario=(select i.idinventario from inventario i where i.idproducto='".$datos[0]."')";
								
								if($resultado1 = $mysql->query($sqlDetalleCuentaC))
								{
									$total =0;
							
									if(mysqli_num_rows($resultado1)==0)
									{
										$respuesta = "<div class='error'>No hay usuarios BD vacia</div>";
									}
							
									else
									{
							
										while($fila1 = $resultado1->fetch_row())
										{
										$return.='<tr class="FilaDeposito">'.
										'<td class="fechaFila">'.$fila1['0'].'</td>'.
										'<td class="noCuentaFila">'.$fila1['1'].'</td>'.
										'<td class="bancoFila">'.$fila1['2'].'</td>'.
										'</tr>';
											
											$total+=$fila1['2'];
										}
									}
								$return.='</table>';
								
					
					
								}		 
				}
	
				$resultado->free();//librerar variable
	
	
				
			}
		}
		else
		{
			$respuesta = "<div class='error'>Error: no se ejecuto la consulta a BD</div>";
	
		}
	
		//cierro la conexion
		$mysql->close();
		echo ($return);
	}
		
function datosImpInvFragmentarxCob($datos){
	
	$mysql = conexionMysql();
	$sql = "SELECT p.nombre,i.preciocosto,p.idproductos,p.codigoproducto,p.descripcion,i.precioCosto,i.precioVenta,i.precioClienteEs,i.precioDistribuidor,p.marca2,p.tiporepuesto,i.cantidad,i.medida FROM inventarioFrag i inner join productos p on p.idproductos=i.idproducto where  i.idproducto='".$datos[0]."'";
	$fecha=date('Y-m-d');
	$cont=0;
	$i=0;
	$return="";
	$encab="<div class=\"navbar-fixed\"><nav><div class=\"nav-wrapper grey darken-4\"><a  class=\"brand-logo\"><img class=\"logo\" src=\"../app/img/logoinsagro1.png\"/></a><div style=\"height: 18px; text-align:right;\">Insagro</div><div  style=\"height: 18px; text-align:right;\">\"Lo mejor para tus plantas\"</div><div  style=\"height: 18px; text-align:right;\">Direccion: Mazatenango</div><div  style=\"height: 18px; text-align:right;\">Tel. 77737775</div><div  style=\"height: 18px; text-align:right;\">Cel. 42207608</div></div></nav></div><br>";
	$plazo = array('','day','month','year');
			$plazo2 = array('','Dia','Mes','Año');
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

				
				$return.=$encab.'<div class="ingresos" style="margin-top:20px;">'.
				'<center><h5 style="text-align: left;" class="CuentasTitulo">Producto: '.$fila['0'].'</h5></center>'.
				'<center><div style="text-align: left;">Codigo: '.$fila['3'].'</div></center>'.
				'<center><div style="text-align: left;">Cantidad: '.$fila['9'].' </div></center>'.
				'<center><div style="text-align: left;">Precio General: '.$fila['6'].' </div></center>'.
				'</div>';
				$return.='<div class="deposito">'.
				'<center><h5>Creditos</h5>';
				$return.='<table  class="depositos">';
				$return.='<tr>'.
							'<th>Descripcion</th>'.
							'<th>Descripcion</th>'.
							'<th>Qiintales Acreditados</th>'.
							'</tr>';
				
							$sqlDetalleCuentaC = "SELECT fecha,descripcion,retirado FROM detalleFragmentarEntr where  idinventario=(select i.idinventario from inventarioFrag i where i.idproducto='".$datos[0]."')";
							
							if($resultado1 = $mysql->query($sqlDetalleCuentaC))
							{
								$total =0;
						
								if(mysqli_num_rows($resultado1)==0)
								{
									$respuesta = "<div class='error'>No hay usuarios BD vacia</div>";
								}
						
								else
								{
						
									while($fila1 = $resultado1->fetch_row())
									{
									$return.='<tr class="FilaDeposito">'.
									'<td class="fechaFila">'.$fila1['0'].'</td>'.
									'<td class="noCuentaFila">'.$fila1['1'].'</td>'.
									'<td class="bancoFila">'.$fila1['2'].'</td>'.
									'</tr>';
										
										$total+=$fila1['2'];
									}
								}
							$return.='</table>';
							
				
				
							}		 
			}

			$resultado->free();//librerar variable


			
		}
	}
	else
	{
		$respuesta = "<div class='error'>Error: no se ejecuto la consulta a BD</div>";

	}

	//cierro la conexion
	$mysql->close();
	echo ($return);
}
?>