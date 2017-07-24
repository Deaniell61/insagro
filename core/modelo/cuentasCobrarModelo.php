<?php
function ingresoCuentaCobrar($datos)
{
	$mysql = conexionMysql();
    $form="";
	
		$mysql->query("BEGIN");
    $sql = "insert cuentascobrar(plazo,tipoPlazo,total,idventas,estado,creditodado) values('".$datos[1]."','".$datos[2]."',0,'".$datos[0]."',2,0)";
//echo $sql;
    if($mysql->query($sql))
    {
		
		$mysql->query("COMMIT");
			    
		
    
    }
    else
    {   
		$sql = "update cuentascobrar set plazo='".$datos[1]."',tipoPlazo='".$datos[2]."',fecha_ant=fecha,fecha='".date('Y-m-d')."' where idventas='".$datos[0]."'";
//echo $sql;
			if($mysql->query($sql))
			{
				
				$mysql->query("COMMIT");
						
				
			
			}
			else
			{
				$mysql->query("ROLLBACK");
				$form = "<div>$sql<script>console.log('".$datos[0]."');</script></div>";
			}
    
    }
    
    
    $mysql->close();
    
    return printf($form);
}

function editarCuentaC($dato)
{
	

    $mysql = conexionMysql();
    $form="";
    $sql = "SELECT cc.fecha,cc.plazo,cc.tipoPlazo,cc.creditodado,cc.total,cc.idventas,(select c.nombre from cliente c where c.idcliente=v.idcliente limit 1),(select c.apellido from cliente c where c.idcliente=v.idcliente limit 1),(select c.direccion from cliente c where c.idcliente=v.idcliente limit 1) FROM cuentascobrar cc inner join ventas v on v.idventas=cc.idventas where (cc.estado=1 or cc.estado=3) and cc.idcuentasC='".$dato[0]."' ";

    if($resultado = $mysql->query($sql))
    {
      if($resultado->num_rows>0)
	  {
		  if($fila = $resultado->fetch_row())
		  {
		  	$form .="<script>";
			$form .="document.getElementById('clienteED').disabled=false;document.getElementById('clienteED').value='".$fila[6]." ".$fila[7]."';document.getElementById('clienteED').focus();document.getElementById('clienteED').disabled=true;";
			$form .="document.getElementById('fechaInicialED').disabled=false;document.getElementById('fechaInicialED').value='".substr($fila[0],0,10)."';document.getElementById('fechaInicialED').focus();document.getElementById('fechaInicialED').disabled=true;";
			$form .="document.getElementById('saldoE').innerHTML='Saldo: ".toMoney($fila[4])."';";
			$form .="document.getElementById('direccionV').disabled=false;document.getElementById('direccionV').value='".$fila[8]."';document.getElementById('direccionV').focus();document.getElementById('direccionV').disabled=true;";
			$form .="document.getElementById('totalCreditoED').disabled=false;document.getElementById('totalCreditoED').value='".$fila[3]."';document.getElementById('totalCreditoED').focus();document.getElementById('totalCreditoED').disabled=true;";
			$form .="document.getElementById('saldoED').disabled=false;document.getElementById('saldoED').value='".$fila[4]."';document.getElementById('saldoED').focus();document.getElementById('saldoED').disabled=true;";
			$form .="document.getElementById('plazoED').disabled=false;document.getElementById('plazoED').value='".$fila[1]."';document.getElementById('plazoED').focus();document.getElementById('plazoED').disabled=true;";
			$form .="document.getElementById('codigo').disabled=false;document.getElementById('codigo').value='".$dato[0]."';document.getElementById('codigo').focus();document.getElementById('codigo').disabled=true;";
			//$form .="document.getElementById('tipoCompra').disabled=false;document.getElementById('tipoCompra').value='".$fila[5]."'.selected;document.getElementById('tipoCompra').focus();document.getElementById('tipoCompra').disabled=true;";
			$form .="\$('#tipoPlazoED').val(\"".$fila[2]."\");$('select').material_select(); ";
			$form .="cargarDetalleCuentasC('".$dato[0]."');";
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
function verCuentaC($dato)
{
	

    $mysql = conexionMysql();
    $form="";
    $sql = "SELECT cc.fecha,cc.plazo,cc.tipoPlazo,cc.creditodado,cc.total,cc.idventas,(select c.nombre from cliente c where c.idcliente=v.idcliente limit 1),(select c.apellido from cliente c where c.idcliente=v.idcliente limit 1),(select c.direccion from cliente c where c.idcliente=v.idcliente limit 1),(select c.telefono from cliente c where c.idcliente=v.idcliente limit 1) FROM cuentascobrar cc inner join ventas v on v.idventas=cc.idventas where cc.estado=1 and cc.idcuentasC='".$dato[0]."' ";

    if($resultado = $mysql->query($sql))
    {
      if($resultado->num_rows>0)
	  {
		  if($fila = $resultado->fetch_row())
		  {
		  	$form .="<script>";
			$form .="document.getElementById('clienteV').disabled=false;document.getElementById('clienteV').value='".$fila[6]." ".$fila[7]."';document.getElementById('clienteV').focus();document.getElementById('clienteV').disabled=true;";
			$form .="document.getElementById('fechaCredito').disabled=false;document.getElementById('fechaCredito').value='".substr($fila[0],0,10)."';document.getElementById('fechaCredito').focus();document.getElementById('fechaCredito').disabled=true;";
			$form .="document.getElementById('saldoV').innerHTML='Saldo: ".toMoney($fila[4])."';";
			$form .="document.getElementById('plazoV').disabled=false;document.getElementById('plazoV').value='".$fila[1]."';document.getElementById('plazoV').focus();document.getElementById('plazoV').disabled=true;";
			$form .="document.getElementById('direccionV').disabled=false;document.getElementById('direccionV').value='".$fila[8]."';document.getElementById('direccionV').focus();document.getElementById('direccionV').disabled=true;";
			$form .="document.getElementById('TelefonoV').disabled=false;document.getElementById('TelefonoV').value='".$fila[9]."';document.getElementById('TelefonoV').focus();document.getElementById('TelefonoV').disabled=true;";
			//$form .="document.getElementById('tipoCompra').disabled=false;document.getElementById('tipoCompra').value='".$fila[5]."'.selected;document.getElementById('tipoCompra').focus();document.getElementById('tipoCompra').disabled=true;";
			$form .="\$('#tipoPlazoV').val(\"".$fila[2]."\");$('select').material_select(); ";
			$form .="cargarDetalleCuentasC('".$dato[0]."');";
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
function abonarCuentaC($datos)
{
	$mysql = conexionMysql();
    $form="";
	session_start();
	$mysql->query("BEGIN");
	
	if($cont=$mysql->query("select total from cuentascobrar where idcuentasc='".$datos[0]."'"))
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
    $sql = "INSERT INTO movimientosc(credito,abono,saldo,fecha,descripcion,idcuentasC,idusuario) values('".$datos[5]."','".$datos[1]."','".$saldo."','".date('Y-m-d H:i:s')."','".$datos[4]."',".$datos[0].",'".$_SESSION['SOFT_USER_ID']."')";
 
		if($mysql->query($sql))
		{
				 
						  if(!$mysql->query("update cuentascobrar set total=total-".$datos[1]." where idcuentasC='".$datos[0]."'"))
						 {
							
							 $mysql->query("ROLLBACK");
						 }
						 else
						 {
							  if($total==0)
						 		{
									 if(!$mysql->query("update cuentascobrar set estado=3 where idcuentasC='".$datos[0]."'"))
									 {
										  $mysql->query("ROLLBACK");
									 }
								 }
							 echo "<script>window.location.reload();cargarDetalleCuentasC('".$datos[0]."');limpiarAbono();document.getElementById('saldoE').innerHTML='Saldo: ".toMoney($saldo)."';</script>";
							 
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


function  datosReciboCobrar($dato)
{
    

    $mysql = conexionMysql();
    $form=array();
	
    $sqlVenta = "SELECT v.fecha,c.nombre,c.apellido,c.direccion,c.nit,v.idventas FROM ventas v inner join cliente c on v.idcliente=c.idcliente WHERE v.idventas='".$dato[0]."' ";
 	//echo $sql;
	 
    if($resultadoVenta = $mysql->query($sqlVenta))
    {
      if($resultadoVenta->num_rows>0)
	  {
		  $form['estatus']=1;
		  
		  if($filaVenta = $resultadoVenta->fetch_row())
		  {
			$form['venta'] = $filaVenta;
		  	$form['venta']['anio'] = substr($filaVenta[0],0,4);
			$form['venta']['mes'] = substr($filaVenta[0],5,2);
			$form['venta']['dia'] = substr($filaVenta[0],8,2);
			
		  
			}
		$resultadoVenta->free();    
	  }
	  else
	  {
		$form['estatus']=0;
	  }
    
    }
    else
    {   
    
    	$form['estatus']=0;
    
    }


	$sqlDetalleVenta = "SELECT vd.subtotal,vd.cantidad,vd.precio,p.nombre FROM ventasdetalle vd inner join productos p on p.idproductos=vd.idproductos WHERE vd.idventa='".$form['venta'][5]."' ";
 	//echo $sql;
	$form['total'] = 0;
    if($resultadoDetalleVenta = $mysql->query($sqlDetalleVenta))
    {
      if($resultadoDetalleVenta->num_rows>0)
	  {
		  $form['estatus']=1;
		   $i=0;
		 //  $form['estatus']=$sqlDetalleVenta;
		  while($filaDetalleVenta = $resultadoDetalleVenta->fetch_assoc())
		  {
		  	$form['DetalleVenta'][$i] = $filaDetalleVenta;
			$form['total'] += $filaDetalleVenta['subtotal'];
			$i++;
		}
		$resultadoDetalleVenta->free();    
	  }
	  else
	  {
		$form['estatus']=0;
	  }
    
    }
    else
    {   
    
    $form['estatus']=0;
    
    }
    
    //$mysql->close();
    
    echo json_encode($form);
    
}


function  datosCuentasCobrar($dato)
{
    

    $mysql = conexionMysql();
    $form=array();
	
    $sqlCuentaC = "SELECT cc.fecha,c.nombre,c.apellido,c.direccion,c.nit,cc.idcuentasc,cc.plazo,cc.tipoplazo,cc.total,cc.creditodado FROM cuentascobrar cc inner join ventas v on v.idventas=cc.idventas inner join cliente c on v.idcliente=c.idcliente WHERE cc.idcuentasc='".$dato[0]."'; ";
 	//echo $sql;
	 $plazo = array('','Dia','Mes','Año');
$fecha=date('Y-m-d');
    if($resultadoCuentaC = $mysql->query($sqlCuentaC))
    {
      if($resultadoCuentaC->num_rows>0)
	  {
		  $form['estatus']=1;
		  
		  if($filaCuentaC = $resultadoCuentaC->fetch_row())
		  {
			   $segundos=strtotime($fecha) - strtotime($filaCuentaC["0"]); //para tu fecha de ejmplo
				$diferencia_dias=intval($segundos/60/60/24);
			$form['CuentaC'] = $filaCuentaC;
		  	$form['CuentaC']['anio'] = substr($filaCuentaC[0],0,4);
			$form['CuentaC'][7] = $plazo[$filaCuentaC[7]];
			$form['CuentaC']['diasTrans'] = $diferencia_dias;
			$form['CuentaC']['mes'] = substr($filaCuentaC[0],5,2);
			$form['CuentaC']['dia'] = substr($filaCuentaC[0],8,2);
			$form['CuentaC'][0] = substr($filaCuentaC[0],0,10);
			
		  
			}
		$resultadoCuentaC->free();    
	  }
	  else
	  {
		$form['estatus']=0;
	  }
    
    }
    else
    {   
    
    	$form['estatus']=0;
    
    }


	$sqlDetalleCuentaC = "SELECT m.credito,m.abono,m.saldo,m.fecha,m.descripcion FROM movimientosc m WHERE m.idcuentasc='".$form['CuentaC'][5]."' ";
 	//echo $sql;
	$form['total'] = 0;
    if($resultadoDetalleCuentaC = $mysql->query($sqlDetalleCuentaC))
    {
      if($resultadoDetalleCuentaC->num_rows>0)
	  {
		  $form['estatus']=1;
		   $i=0;
		 //  $form['estatus']=$sqlDetalleCuentaC;
		  while($filaDetalleCuentaC = $resultadoDetalleCuentaC->fetch_assoc())
		  {
		  	$form['DetalleCuentaC'][$i] = $filaDetalleCuentaC;
			$form['total'] += $filaDetalleCuentaC['abono'];
			$i++;
		}
		$resultadoDetalleCuentaC->free();    
	  }
	  else
	  {
		$form['estatus']=0;
	  }
    
    }
    else
    {   
    
    $form['estatus']=0;
    
    }
    
    //$mysql->close();
    
    echo json_encode($form);
    
}
function datosImpPorCobrarVencidas($datos){

	$mysql = conexionMysql();
    $sql="select cc.fecha,cc.plazo,cc.tipoPlazo,cc.creditodado,cc.total,(select sum(abono) from movimientosc mc where mc.idcuentasc=cc.idcuentasc),(select v.nocomprobante from ventas v where v.idventas=cc.idventas),(select cl.nombre from cliente cl where cl.idcliente=v.idcliente),(select cl.apellido from cliente cl where cl.idcliente=v.idcliente) from cuentascobrar cc inner join ventas v on cc.idventas=v.idventas where v.estado=1 and cc.estado=1  group by cc.idcuentasc";
	$fecha=date('Y-m-d');
    $cont=0;
	$i=0;
	$return=array();
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

                $fechaINI = $fila["0"];
				$fechaHOY = date('Y-m-d');
                if($fila[1]>0){
                    $nuevafecha = strtotime ( '+'.$fila[1].' '.$plazo[$fila["2"]] , strtotime ( $fechaINI ) ) ;
                }else{
                    $nuevafecha = strtotime ( '+'.($fila[1]*(-1)).' '.$plazo[$fila["2"]] , strtotime ( $fechaINI ) ) ;
                }
                $fechaPAGO = date ( 'Y-m-d' , $nuevafecha );

                if($fechaHOY>$fechaPAGO)
                {
					$segundos=strtotime($fecha) - strtotime($fila["0"]); //para tu fecha de ejmplo
						$diferencia_dias=intval($segundos/60/60/24);
				
					$return[$i]=$fila;
                    $return[$i]["1"]=$fila["1"]." ".$plazo2[$fila["2"]];
					$return[$i]["difDia"]=$diferencia_dias;
					$i++;
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
	echo json_encode($return);
}
function datosImpPorCliente($datos){

	$mysql = conexionMysql();
    $sqlClientes = "SELECT c.idcliente,c.nombre,c.apellido FROM cliente c inner join ventas v on v.idcliente=c.idcliente inner join cuentascobrar cc on cc.idventas=v.idventas where v.estado=1 and cc.estado=1 and c.estado=1 and v.tipoventa=2 group by c.idcliente";
    $fecha=date('Y-m-d');
	$cont=0;
	$cli=0;
	$return=array();
    if($resultadoClientes = $mysql->query($sqlClientes))
    {

        if(mysqli_num_rows($resultadoClientes)==0)
        {
            $respuesta = "<div class='error'>No hay usuarios BD vacia</div>";
        }

        else
        {

            while($filaClientes = $resultadoClientes->fetch_row())
            {

                 $plazo = array('','Dia','Mes','Año');
            
            $return[$cli]['nombre']=$filaClientes[1]." ".$filaClientes[2].""; 
             
			$return[$cli]["total"]=0;
            $sqlCuentas="select cc.fecha,cc.plazo,cc.tipoPlazo,cc.creditodado,cc.total,(select sum(abono) from movimientosc mc where mc.idcuentasc=cc.idcuentasc),(select v.nocomprobante from ventas v where v.idventas=cc.idventas) from cuentascobrar cc inner join ventas v on cc.idventas=v.idventas where v.idcliente='".$filaClientes[0]."' and v.estado=1 and cc.estado=1 group by cc.idcuentasc";
            if($resultadoCuentas = $mysql->query($sqlCuentas))
            {

                if(mysqli_num_rows($resultadoCuentas)==0)
                {
                    $respuesta = "<div class='error'>No hay usuarios BD vacia</div>";
                }

                else
                {
                    $plazo = array('','Dia','Mes','Año');
                    $i=0;
                    while($filaCuentas = $resultadoCuentas->fetch_row())
                    {
						$segundos=strtotime($fecha) - strtotime($filaCuentas["0"]); //para tu fecha de ejmplo
						$diferencia_dias=intval($segundos/60/60/24);
                       
					        $return[$cli]["Abonos"][$i]=$filaCuentas;
                            $return[$cli]["Abonos"][$i]['1']=$filaCuentas["1"]." ".$plazo[$filaCuentas["2"]];
                            $return[$cli]["Abonos"][$i]['difDia']=$diferencia_dias;
                            $return[$cli]["Abonos"][$i]['0']=substr($filaCuentas["0"],0,10);
							$return[$cli]['total']+=$filaCuentas["4"];
                         $i++;
                    }

                }
                $resultadoCuentas->free();
            }
			$cli++;
				
                
		

            }

            $resultadoClientes->free();//librerar variable


           
        }
    }
    else
    {
        $respuesta = "<div class='error'>Error: no se ejecuto la consulta a BD</div>";

    }

    //cierro la conexion
    $mysql->close();
	echo json_encode($return);
}

function anularAbono($datos)
{
	$mysql = conexionMysql();
    $form="";
	
		$mysql->query("BEGIN");
    $sql = "delete from movimientosc where idmovimientoc='".$datos[0]."'";
//echo $sql;
    if($mysql->query($sql))
    {
		if(!$mysql->query("update cuentascobrar set total=total+".$datos[1].",estado=1 where idcuentasc='".$datos[2]."'"))
		{
			$mysql->query("ROLLBACK");
		}
		else
		{
			$mysql->query("COMMIT");
			$form = "<script>alert(\"Abono Borrado\");setTimeout(window.location.reload(), 3000);</script>";
		}
    }
    else
    {   
    	$mysql->query("ROLLBACK");
    	$form = "<div><script>location.reload();console.log('".$datos[0]."');</script></div>";
    
    }
    
    
    $mysql->close();
    
    echo ($form);
}
?>