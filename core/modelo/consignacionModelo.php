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
							 if(!$mysql->query("update compras set estado=5 where idCompras='".$datos[0]."'"))
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


?>