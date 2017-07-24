<?php
function ingresoCuentaPagar($datos)
{
	$mysql = conexionMysql();
    $form="";
	
		$mysql->query("BEGIN");
    $sql = "insert cuentaspagar(plazo,tipoPlazo,total,idcompras,estado,CreditoDado,fecha) values('".$datos[1]."','".$datos[2]."',0,'".$datos[0]."',2,0,'".date('Y-m-d  H:i:s')."')";
//echo $sql;
    if($mysql->query($sql))
    {
		
		$mysql->query("COMMIT");
			    
		
    
    }
    else
    {   
		$sql = "update cuentaspagar set plazo='".$datos[1]."',tipoPlazo='".$datos[2]."',fecha_ant=fecha,fecha='".$datos[3]."' where idcompras='".$datos[0]."'";
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

function editarCuentasP($dato)
{
	

    $mysql = conexionMysql();
    $form="";
    $sql = "SELECT cc.fecha,cc.plazo,cc.tipoPlazo,cc.creditodado,cc.total,cc.idcompras,(select c.nombreempresa from proveedor c where c.idproveedor=v.iddistribuidor limit 1),(select c.direccion from proveedor c where c.idproveedor=v.iddistribuidor limit 1) FROM cuentaspagar cc inner join compras v on v.idcompras=cc.idcompras WHERE cc.estado=1 and cc.idcuentasP='".$dato[0]."' ";

    if($resultado = $mysql->query($sql))
    {
      if($resultado->num_rows>0)
	  {
		  if($fila = $resultado->fetch_row())
		  {
		  	$form .="<script>";
			$form .="document.getElementById('proveedorED').disabled=false;document.getElementById('proveedorED').value='".$fila[6]."';document.getElementById('proveedorED').focus();document.getElementById('proveedorED').disabled=true;";
			$form .="document.getElementById('fechaInicialED').disabled=false;document.getElementById('fechaInicialED').value='".substr($fila[0],0,10)."';document.getElementById('fechaInicialED').focus();document.getElementById('fechaInicialED').disabled=true;";
			$form .="document.getElementById('totalCreditoED').disabled=false;document.getElementById('totalCreditoED').value='".$fila[3]."';document.getElementById('totalCreditoED').focus();document.getElementById('totalCreditoED').disabled=true;";
			$form .="document.getElementById('saldoE').innerHTML='Saldo: ".toMoney($fila[4])."';";
			$form .="document.getElementById('direccionV').disabled=false;document.getElementById('direccionV').value='".$fila[7]."';document.getElementById('direccionV').focus();document.getElementById('direccionV').disabled=true;";
			$form .="document.getElementById('saldoED').disabled=false;document.getElementById('saldoED').value='".$fila[4]."';document.getElementById('saldoED').focus();document.getElementById('saldoED').disabled=true;";
			$form .="document.getElementById('plazoED').disabled=false;document.getElementById('plazoED').value='".$fila[1]."';document.getElementById('plazoED').focus();document.getElementById('plazoED').disabled=true;";
			$form .="document.getElementById('codigo').disabled=false;document.getElementById('codigo').value='".$dato[0]."';document.getElementById('codigo').focus();document.getElementById('codigo').disabled=true;";
			//$form .="document.getElementById('tipoCompra').disabled=false;document.getElementById('tipoCompra').value='".$fila[5]."'.selected;document.getElementById('tipoCompra').focus();document.getElementById('tipoCompra').disabled=true;";
			$form .="\$('#tipoPlazoED').val(\"".$fila[2]."\");$('select').material_select(); ";
			$form .="cargarDetalleCuentasP('".$dato[0]."');";
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
function verCuentaP($dato)
{
	

    $mysql = conexionMysql();
    $form="";
    $sql = "SELECT cc.fecha,cc.plazo,cc.tipoPlazo,cc.creditodado,cc.total,cc.idcompras,(select c.nombreempresa from proveedor c where c.idproveedor=v.iddistribuidor limit 1),(select c.direccion from proveedor c where c.idproveedor=v.iddistribuidor limit 1),(select c.telefono from proveedor c where c.idproveedor=v.iddistribuidor limit 1) FROM cuentaspagar cc inner join compras v on v.idcompras=cc.idcompras WHERE cc.estado=1 and cc.idcuentasP='".$dato[0]."' ";

    if($resultado = $mysql->query($sql))
    {
      if($resultado->num_rows>0)
	  {
		  if($fila = $resultado->fetch_row())
		  {
		  	$form .="<script>";
			$form .="document.getElementById('proveedorV').disabled=false;document.getElementById('proveedorV').value='".$fila[6]."';document.getElementById('proveedorV').focus();document.getElementById('proveedorV').disabled=true;";
			$form .="document.getElementById('fechaCredito').disabled=false;document.getElementById('fechaCredito').value='".substr($fila[0],0,10)."';document.getElementById('fechaCredito').focus();document.getElementById('fechaCredito').disabled=true;";
			$form .="document.getElementById('saldoV').innerHTML='Saldo: ".toMoney($fila[4])."';";
			$form .="document.getElementById('plazoV').disabled=false;document.getElementById('plazoV').value='".$fila[1]."';document.getElementById('plazoV').focus();document.getElementById('plazoV').disabled=true;";
			$form .="document.getElementById('direccionV').disabled=false;document.getElementById('direccionV').value='".$fila[7]."';document.getElementById('direccionV').focus();document.getElementById('direccionV').disabled=true;";
			$form .="document.getElementById('TelefonoV').disabled=false;document.getElementById('TelefonoV').value='".$fila[8]."';document.getElementById('TelefonoV').focus();document.getElementById('TelefonoV').disabled=true;";
			//$form .="document.getElementById('tipoCompra').disabled=false;document.getElementById('tipoCompra').value='".$fila[5]."'.selected;document.getElementById('tipoCompra').focus();document.getElementById('tipoCompra').disabled=true;";
			$form .="\$('#tipoPlazoV').val(\"".$fila[2]."\");$('select').material_select(); ";
			$form .="cargarDetalleCuentasP('".$dato[0]."');";
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

function abonarCuentaP($datos)
{
	$mysql = conexionMysql();
    $form="";
	session_start();
	$mysql->query("BEGIN");
	
	if($cont=$mysql->query("select total from cuentaspagar where idcuentasp='".$datos[0]."'"))
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
    $sql = "INSERT INTO movimientosp(credito,abono,saldo,fecha,descripcion,idcuentasP,idusuario) values('".$datos[5]."','".$datos[1]."','".$saldo."','".date('Y-m-d H:i:s')."','".$datos[4]."',".$datos[0].",'".$_SESSION['SOFT_USER_ID']."')";
 
    if($mysql->query($sql))
    {
			 
				 	  if(!$mysql->query("update cuentaspagar set total=total-".$datos[1]." where idcuentasP='".$datos[0]."'"))
					 {
						
						 $mysql->query("ROLLBACK");
					 }
					 else
					 {
						 if($total==0)
						 {
							 if(!$mysql->query("update cuentaspagar set estado=3 where idcuentasp='".$datos[0]."'"))
							 {
								  $mysql->query("ROLLBACK");
							 }
						 }
						 
						 echo "<script>window.location.reload();cargarDetalleCuentasP('".$datos[0]."');limpiarAbono();document.getElementById('saldoE').innerHTML='Saldo: ".toMoney($saldo)."';</script>";
						 
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


function  datosCheque($dato)
{
    
setlocale (LC_ALL, "es_GT");
    $mysql = conexionMysql();
    $form=array();
	
    $sqlVenta = "SELECT (select c.nombreempresa from proveedor c where c.idproveedor=co.iddistribuidor) FROM cuentaspagar cp inner join compras co on co.idcompras=cp.idcompras WHERE cp.idcuentasp='".$dato[0]."' ";
 	//echo $sql;
	 
    if($resultadoVenta = $mysql->query($sqlVenta))
    {
      if($resultadoVenta->num_rows>0)
	  {
		  $form['estatus']=1;
		  
		  if($filaVenta = $resultadoVenta->fetch_row())
		  {
			$form['cliente'] = $filaVenta[0];
			
		  
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
	setlocale (LC_ALL, "es_GT");
	$form['fecha']=" Mazatenango ".date('d')." de ".strftime("%B")." de ".date('Y');
	$mysql->close();
    
    echo json_encode($form);
    
}

function  datosCuentasPagar($dato)
{
    

    $mysql = conexionMysql();
    $form=array();
	
    $sqlCuentaC = "SELECT cc.fecha,c.nombreempresa,cc.total,c.direccion,c.nit,cc.idcuentasp,cc.plazo,cc.tipoplazo,cc.total,cc.creditodado FROM cuentaspagar cc inner join compras v on v.idcompras=cc.idcompras inner join proveedor c on v.iddistribuidor=c.idproveedor WHERE cc.idcuentasp='".$dato[0]."'; ";
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


	$sqlDetalleCuentaC = "SELECT m.credito,m.abono,m.saldo,m.fecha,m.descripcion FROM movimientosp m WHERE m.idcuentasp='".$form['CuentaC'][5]."' ";
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

function datosImpPorPagarVencidas($datos){

	$mysql = conexionMysql();
    $sql="select cc.fecha,cc.plazo,cc.tipoPlazo,cc.creditodado,cc.total,(select sum(abono) from movimientosp mc where mc.idcuentasp=cc.idcuentasp),(select v.nocomprobante from compras v where v.idcompras=cc.idcompras),(select cl.nombreempresa from proveedor cl where cl.idproveedor=v.iddistribuidor) from cuentaspagar cc inner join compras v on cc.idcompras=v.idcompras where v.estado=1 and cc.estado=1 group by cc.idcuentasp";
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
$cont++;
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
function datosImpPorProveedor($datos){

	$mysql = conexionMysql();
    $sqlClientes = "SELECT c.idproveedor,c.nombreempresa FROM proveedor c inner join compras v on v.iddistribuidor=c.idproveedor inner join cuentaspagar cc on cc.idcompras=v.idcompras where v.estado=1 and cc.estado=1 and c.estado=1 and v.tipocompra=2  group by c.idproveedor";
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
            
            $return[$cli]['nombre']=$filaClientes[1]; 
             
			$return[$cli]["total"]=0;
            $sqlCuentas="select cc.fecha,cc.plazo,cc.tipoPlazo,cc.creditodado,cc.total,(select sum(abono) from movimientosp mc where mc.idcuentasp=cc.idcuentasp),(select v.nocomprobante from compras v where v.idcompras=cc.idcompras) from cuentaspagar cc inner join compras v on cc.idcompras=v.idcompras where v.iddistribuidor='".$filaClientes[0]."' and v.estado=1 and cc.estado=1 group by cc.idcuentasp";
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
?>