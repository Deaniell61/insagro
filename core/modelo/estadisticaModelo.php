<?php
$meses="";
$fecha3 = date('Y-m-d');
function graficaVentasBarra($datos)
{
	
	?>
    <script>
   		 var chart = c3.generate({
								bindto: '#chart',
								data: {
									x: 'x',
							//        xFormat: '%Y%m%d', // 'xFormat' can be used as custom format of 'x'
									columns: [
										
									],
									type:"bar"
								},
								axis: {
									x: {
										type: 'timeseries',
										tick: {
											format: '%Y-%m-%d'
										},
									y: {
											show: true,
											tick: {
												format: d3.format("Q")
											}
										}
									}
								},
								bar: {
									width: {
										ratio: 0.25// this makes bar width 50% of length between ticks
									}
								},
								color: {
								  pattern: ['#1E88E5']
								},
								tooltip: {
									format: {
										value: function (value, id) {
											var format = d3.format('$');
											return format(value).replace("$","Q");
										}
							
									}
								}
							});
							</script>
    <?php
    $mysql = conexionMysql();
    $form="";
 
 
 	$fecha3 = date('Y-m-d');
     
 $nuevafecha3 = strtotime ( '+1 day' , strtotime ( $fecha3 ) ) ;
$fecha3 = date ( 'Y-m-d' , $nuevafecha3 );
  $sql = "SELECT sum(v.total),u.user,v.fecha FROM ventas v inner join usuarios u on v.idusuario=u.idusuarios where (v.fecha>'".$datos[0]."' and v.fecha<='".$fecha3."') and v.estado=1 group by date(v.fecha)";
	if($datos[0]<=$datos[1])
	{$fecha3=$datos[1];
    	$titulo="['x'";
		$meses="";
		$contar=0;
		$fechas[]="";
		$fecha2=$datos[0];
		$titulo.=",'".$fecha2."'";
			$meses.=",'".($contar+1)."'";
			$fechas[$contar]=$fecha2;
			$contar++;	
		while($fecha2<($fecha3))
		{
			
			
			$nuevafecha2 = strtotime ( '+1 day' , strtotime ( $fecha2 ) ) ;
			$fecha2 = date ( 'Y-m-d' , $nuevafecha2 );
			$titulo.=",'".$fecha2."'";
			$meses.=",'".($contar+1)."'";
			$fechas[$contar]=$fecha2;
			$contar++;			
			
		}
	}
    if($resultado = $mysql->query($sql))
    {
      
		
			if($resultado->num_rows>0)
			{
				$contar2=0;
				while($row= $fila = $resultado->fetch_row())
				{
						
						$reem=(round($row[0],5,5));
						//echo $reem.",";
						$meses=verificarDato($reem,$fechas,$contar,substr($row[2],0,10),$meses);
						
				}
				$meses=limpiarDato($reem,$fechas,$contar,"",$meses);
				echo "
							<script>
							chart.load({
									columns: [
										".$titulo."],
										['Ventas'".$meses."]
												
											]
											
									});
							
							</script>
							";
			}
			else
			{
				$reem="";
				$meses=limpiarDato($reem,$fechas,$contar,"",$meses);
				echo "
							<script>
							chart.load({
									columns: [
										".$titulo."],
										['Ventas'".$meses."]
												
											]
											
									});
							
							</script>
							";
			}
			
    $form .="<script>";
    $form .=" 
				
	";
	
    $form .="</script>";
        
    $resultado->free();    
    
    }
    else
    {   
    
    $form = "<div><script>console.log('$idedit');</script></div>";
    
    }
    
    
    $mysql->close();
    
    return printf($form);
}

function graficaVentasPie($datos)
{
	
	
		?>
        <script>
		var chart2 = c3.generate({
								bindto: '#chart2',
								data: {
									columns: [
										
									],
									type:"pie"
									,
										selection: {
													enabled: true
												  },
									onselected: function (d, element) 
									{ 
										cargarGrafico('2',d.id);
										cargarGrafico('3',d.id);
										
									 },
									 onunselected: function (d, element) 
									{ 
										cargarGrafico('2','');
										cargarGrafico('3','');
										
									 }
								},
								color: {
								  pattern: ['#61B045','#F7742C','#D4AE18','#F6921E','#9E1F63','#26A9E0','#8BC53F','#D6DE23']
								}/*,
								
								pie: {
									label: {
										format: function (value, ratio, id) {
											
											return "$"+currency(d3.format('')((value)));
										}
									}
								}*/,
								tooltip: {
									format: {
										value: function (value, id) {
											var format = d3.format('');
											return format(value);
										}
							
									}
								}
							});
					</script>
        
        <?php
		
		$mysql = conexionMysql();
    $form="";
 
 
 	$fecha3 = $datos[1];
     
 $nuevafecha3 = strtotime ( '+1 day' , strtotime ( $fecha3 ) ) ;
$fecha3 = date ( 'Y-m-d' , $nuevafecha3 );

  
    $sql = "SELECT (dv.subtotal),sum(dv.cantidad),p.nombre,p.codigoproducto,p.tiporepuesto FROM ventas v  inner join ventasdetalle dv on dv.idventa=v.idventas inner join productos p on p.idproductos=dv.idproductos inner join usuarios u on v.idusuario=u.idusuarios where (v.fecha>'".$datos[0]."' and v.fecha<'".$fecha3."') and v.estado=1 group by p.idproductos order by sum(dv.cantidad) desc limit 5;";
	if($datos[0]<=$datos[1])
	{	$meses="";
		
			
		
	
    if($resultado = $mysql->query($sql))
    {
      
		
			if($resultado->num_rows>0)
			{
				$contar2=0;
				while($row= $fila = $resultado->fetch_row())
				{
					if($row[1]=='1')
					{
						$titulo="Moto";
					}
					else
					if($row[1]=='2')
					{
						$titulo="Carro";
					}
					else
					
					{
						$titulo="No definido";
					}
					$meses.="['".(($row[2]))."','".(round($row[1],5,2))."'],";
						
						
				}
				
				echo "
							<script>
							chart2.load({
									columns: [
										
										".substr($meses,0,strlen($meses)-1)."
												
											]
											
									});
							
							</script>
							";
			}
			else
			{
				
			}
			
    
        
    $resultado->free();    
    
    }
    else
    {   
    
    $form = "<div><script>console.log('$idedit');</script></div>";
    
    }
    
    }
    $mysql->close();
    
    return printf($form);
}


function buscarBestFive($datos)
{
	
$mas="";
$cod2=$datos[2];
				if($cod2=='Moto')
					{
						$titulo="=1";
					}
					else
					if($cod2=='Carro')
					{
						$titulo="=2";
					}
					else
					
					{
						$titulo=" is NULL";
					}
	if($cod2!='')
	{
		$mas="and p.nombre='".$cod2."'";
	}
	
$mysql = conexionMysql();
    $form="";
 
 
 	$fecha3 = $datos[1];
     
 $nuevafecha3 = strtotime ( '+1 day' , strtotime ( $fecha3 ) ) ;
$fecha3 = date ( 'Y-m-d' , $nuevafecha3 );
   $sql = "SELECT sum(dv.subtotal),sum(dv.cantidad),p.nombre,p.codigoproducto,p.tiporepuesto FROM ventas v  inner join ventasdetalle dv on dv.idventa=v.idventas inner join productos p on p.idproductos=dv.idproductos inner join usuarios u on v.idusuario=u.idusuarios where (v.fecha>'".$datos[0]."' and v.fecha<'".$fecha3."') and v.estado=1 $mas group by p.idproductos order by sum(dv.subtotal) desc limit 5;";
	if($datos[0]<=$datos[1])
	{	$meses="";
		
			
		
	
    if($resultado = $mysql->query($sql))
    {
      
		$meses.="<table id='tabla' class='bordered centered highlight responsive-table centrarT'><thead><th>Producto</th><th>Codigo</th><th>Cantidad</th><th>Venta</th></thead><tbody>";
			if($resultado->num_rows>0)
			{
				$contar2=0;
				while($row= $fila = $resultado->fetch_row())
				{
					
					$meses.= "<tr><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[1]."</td><td>".toMoney($row[0])."</td></tr>";
						
						
				}
				
				echo "
							<script>
							document.getElementById('best5').innerHTML='';
							document.getElementById('best5').innerHTML='Top 5 Productos mas vendidos<div style=\" float:right; margin-right:20px;\"><strong>".$cod2."</strong></div><br>".str_replace("'","\'",$meses)."</tbody></table>';
							
							</script>
							";
			}
			else
			{
				echo "
							<script>
							document.getElementById('best5').innerHTML='';
							document.getElementById('best5').innerHTML='Top 5 Productos mas vendidos<div style=\" float:right; margin-right:20px;\"><strong>".$cod2."</strong></div><br>".str_replace("'","\'",$meses)."</tbody></table>';
							
							</script>
							";
			}
			
    
        
    $resultado->free();    
    
    }
    else
    {   
    
    $form = "<div><script>console.log('$idedit');</script></div>";
    
    }
    
    }
    $mysql->close();
    
    return printf($form);
				
				
}
function buscarBestFiveQ($datos)
{
	
$mas="";
$cod2=$datos[2];
				if($cod2=='Moto')
					{
						$titulo="=1";
					}
					else
					if($cod2=='Carro')
					{
						$titulo="=2";
					}
					else
					
					{
						$titulo=" is NULL";
					}
	if($cod2!='')
	{
		$mas="and p.nombre='".$cod2."'";
	}
	
$mysql = conexionMysql();
    $form="";
 
 
 	$fecha3 = $datos[1];
     
 $nuevafecha3 = strtotime ( '+1 day' , strtotime ( $fecha3 ) ) ;
$fecha3 = date ( 'Y-m-d' , $nuevafecha3 );
    $sql = "SELECT sum(dv.subtotal),sum(dv.cantidad),p.nombre,p.codigoproducto,p.tiporepuesto FROM ventas v  inner join ventasdetalle dv on dv.idventa=v.idventas inner join productos p on p.idproductos=dv.idproductos inner join usuarios u on v.idusuario=u.idusuarios where (v.fecha>'".$datos[0]."' and v.fecha<'".$fecha3."') and v.estado=1 $mas group by p.idproductos order by dv.cantidad desc limit 5;";
	if($datos[0]<=$datos[1])
	{	$meses="";
		
			
		
	
    if($resultado = $mysql->query($sql))
    {
      
		$meses.="<table id='tabla' class='bordered centered highlight responsive-table centrarT'><thead><th>Producto</th><th>Codigo</th><th>Cantidad</th><th>Venta</th></thead><tbody>";
			if($resultado->num_rows>0)
			{
				$contar2=0;
				while($row= $fila = $resultado->fetch_row())
				{
					
					$meses.= "<tr><td>".$row[2]."</td><td>".$row[3]."</td><td>".$row[1]."</td><td>".toMoney($row[0])."</td></tr>";
						
						
				}
				
				echo "
							<script>
							document.getElementById('best5Q').innerHTML='';
							document.getElementById('best5Q').innerHTML='Top 5 Productos mas solicitados<div style=\" float:right; margin-right:20px;\"><strong>".$cod2."</strong></div><br>".str_replace("'","\'",$meses)."</tbody></table>';
							
							</script>
							";
			}
			else
			{
				echo "
							<script>
							document.getElementById('best5Q').innerHTML='';
							document.getElementById('best5Q').innerHTML='Top 5 Productos mas solicitados<div style=\" float:right; margin-right:20px;\"><strong>".$cod2."</strong></div><br>".str_replace("'","\'",$meses)."</tbody></table>';
							
							</script>
							";
			}
			
    
        
    $resultado->free();    
    
    }
    else
    {   
    
    $form = "<div><script>console.log('$idedit');</script></div>";
    
    }
    
    }
    $mysql->close();
    
    return printf($form);
				
				
}
							
function graficaVendedoresBarra($datos)
{
	
	?>
    <script>
   		 var chart = c3.generate({
								bindto: '#chart',
								data: {
									x: 'x',
							//        xFormat: '%Y%m%d', // 'xFormat' can be used as custom format of 'x'
									columns: [
										
									],
									type:"bar"
								},
								axis: {
									x: {
										type: 'timeseries',
										tick: {
											format: '%Y-%m-%d'
										},
									y: {
											show: true,
											tick: {
												format: d3.format("Q")
											}
										}
									}
								},
								bar: {
									width: {
										ratio: 0.25// this makes bar width 50% of length between ticks
									}
								},
								color: {
								  pattern: ['#61B045','#F7742C','#D4AE18','#F6921E','#9E1F63','#26A9E0','#8BC53F','#D6DE23']
								},
								tooltip: {
									format: {
										value: function (value, id) {
											var format = d3.format('$');
											return format(value).replace("$","Q");
										}
							
									}
								}
							});
							</script>
    <?php
    $mysql = conexionMysql();
    $form="";
 
 
 	$fecha3 = $datos[1];
     
 $nuevafecha3 = strtotime ( '+1 day' , strtotime ( $fecha3 ) ) ;
$fecha3 = date ( 'Y-m-d' , $nuevafecha3 );
  $sql = "SELECT sum(v.total),u.user,v.fecha FROM ventas v inner join usuarios u on v.idusuario=u.idusuarios where (v.fecha>='".$datos[0]."' and v.fecha<='".$fecha3."') and v.estado=1 group by date(v.fecha)";
	if($datos[0]<=$datos[1])
	{$fecha3=$datos[1];
    	$titulo="['x'";
		$meses="";
		$todo="";
		$contar=0;
		$fechas[]="";
		$vender[]="";
		$fecha2=$datos[0];
		$titulo.=",'".$fecha2."'";
			$meses.=",'".($contar+1)."'";
			$fechas[$contar]=$fecha2;
			$contar++;	
		while($fecha2<=($fecha3))
		{
			
			
			$nuevafecha2 = strtotime ( '+1 day' , strtotime ( $fecha2 ) ) ;
			$fecha2 = date ( 'Y-m-d' , $nuevafecha2 );
			$titulo.=",'".$fecha2."'";
			$meses.=",'".($contar+1)."'";
			$fechas[$contar]=$fecha2;
			$contar++;			
			
		}
	}
	
							
			$titulo="['x',";
						$datosGra[][]="";				
							
    if($resultado = $mysql->query($sql))
    {
      
		
			if($resultado->num_rows>0)
			{
				
					for($i=0;$i<$contar;$i++)
					{
						$datosGra[$i]['0']="['".$fechas[$i]."',";
					}
				$contar2=0;
				while($row= $fila = $resultado->fetch_row())
				{
						$sql2 = "SELECT sum(v.total),u.user,v.fecha FROM ventas v inner join usuarios u on v.idusuario=u.idusuarios where v.fecha like '".substr($row[2],0,10)."%' and v.estado=1 group by (u.user)";
						//echo $sql2;
						if($resultado2 = $mysql->query($sql2))
    					{
      
		
								if($resultado2->num_rows>0)
								{
									$contar3=0;
									while($row2= $fila2 = $resultado2->fetch_row())
									{
										$meses2=$meses;
										$reem=(round($row2[0],5,5));
										//echo $reem.",";
										for($i=0;$i<$contar;$i++)
											{
												if($datosGra[$i]['0']=="['".substr($row2[2],0,10)."',")
												{
													$datosGra[$i][$row2[1]]="'".$reem."',";
												}
												else
												
													if(!isset($datosGra[$i][$row2[1]]))
													{
														$datosGra[$i][$row2[1]]="'',";
													}
												
											}
										$vender[$contar3]=$row2[1];
										
										if(strpos($titulo,"'".$row2[1]."',"))
										{
											$titulo=$titulo;
										}
										else
										{
											$titulo.="'".$row2[1]."',";
										}
										
										$meses2=limpiarDato($reem,$fechas,$contar,"",$meses2);
										$contar3++;
									}
								}
								
						}
						
						
				}
						
					
				echo "
							<script>
							chart.load({
									rows: [
										".substr($titulo,0,strlen($titulo)-1)."],\n";
										for($i=0;$i<$contar;$i++)
											{
													if($i==$contar-1)
													{
														
														echo $datosGra[$i]['0'];
														$sql2 = "SELECT sum(v.total),u.user,v.fecha FROM ventas v inner join usuarios u on v.idusuario=u.idusuarios where v.fecha like '".substr($row[2],0,10)."%' and v.estado=1 group by (u.user)";
															//echo $sql2;
															if($resultado2 = $mysql->query($sql2))
															{
										  
											
																	if($resultado2->num_rows>0)
																	{
																		$contar3=0;
																		while($row2= $fila2 = $resultado2->fetch_row())
																		{
																			if(isset($datosGra[$i][$row2[1]]))
																			{
																				echo $datosGra[$i][$row2[1]];
																			}
																			
																		}
																		echo "]\n";
																	}
															}
													}
													else
													{
													echo $datosGra[$i]['0'];
														$sql2 = "SELECT sum(v.total),u.user,v.fecha FROM ventas v inner join usuarios u on v.idusuario=u.idusuarios where v.fecha like '".substr($row[2],0,10)."%' and v.estado=1 group by (u.user)";
															//echo $sql2;
															if($resultado2 = $mysql->query($sql2))
															{
										  
											
																	if($resultado2->num_rows>0)
																	{
																		$contar3=0;
																		while($row2= $fila2 = $resultado2->fetch_row())
																		{
																			if(isset($datosGra[$i][$row2[1]]))
																			{
																				echo $datosGra[$i][$row2[1]];
																			}
																			
																			
																		}
																		echo "],\n";
																	}
															}
													}
													
											}
							echo "
												
											]
											
									});
							
							</script>
							";
			}
		}
		else
		{
			$reem="";
			$meses=limpiarDato($reem,$fechas,$contar,"",$meses);
			echo "
						<script>
						chart.load({
								columns: [
									".$titulo."],
									".substr($todo,0,strlen($todo)-1)."
											
										]
										
								});
						
						</script>
						";
						
						
		}
			
   
    $resultado->free();    
    
    
    
    
    $mysql->close();
    
    return printf($form);
}
function graficaVendedorPie($datos)
{
	
	
		?>
        <script>
		var chart2 = c3.generate({
								bindto: '#chart2',
								data: {
									columns: [
										
									],
									type:"pie"
									,
										selection: {
													enabled: true
												  },
									onselected: function (d, element) 
									{ 
										
										
									 },
									 onunselected: function (d, element) 
									{ 
										
										
									 }
								},
								color: {
								  pattern: ['#61B045','#F7742C','#D4AE18','#F6921E','#9E1F63','#26A9E0','#8BC53F','#D6DE23']
								}/*,
								
								pie: {
									label: {
										format: function (value, ratio, id) {
											
											return "$"+currency(d3.format('')((value)));
										}
									}
								}*/,
								tooltip: {
									format: {
										value: function (value, id) {
											var format = d3.format('$');
											return format(value).replace("$","Q");
										}
							
									}
								}
							});
					</script>
        
        <?php
		
		$mysql = conexionMysql();
    $form="";
 
 
 	$fecha3 = $datos[1];
     
 $nuevafecha3 = strtotime ( '+1 day' , strtotime ( $fecha3 ) ) ;
$fecha3 = date ( 'Y-m-d' , $nuevafecha3 );

	$sql = "SELECT sum(v.total),u.user,v.fecha FROM ventas v inner join usuarios u on v.idusuario=u.idusuarios where (v.fecha>'".$datos[0]."' and v.fecha<'".$fecha3."') and v.estado=1 group by u.user";
  
   //$sql = "SELECT sum(dv.subtotal),sum(dv.cantidad),p.nombre,p.codigoproducto,p.tiporepuesto FROM ventas v  inner join ventasdetalle dv on dv.idventa=v.idventas inner join productos p on p.idproductos=dv.idproductos inner join usuarios u on v.idusuario=u.idusuarios where (v.fecha>'".$datos[0]."' and v.fecha<='".$fecha3."') and v.estado=1 and dv.estado=1 and p.estado=1  group by p.idproductos order by sum(dv.cantidad) desc limit 5;";
	if($datos[0]<=$datos[1])
	{	$meses="";
		
			
		
	
    if($resultado = $mysql->query($sql))
    {
      
		
			if($resultado->num_rows>0)
			{
				$contar2=0;
				while($row= $fila = $resultado->fetch_row())
				{
					
					$meses.="['".(($row[1]))."','".(round($row[0],5,2))."'],";
						
						
				}
				
				echo "
							<script>
							chart2.load({
									columns: [
										
										".substr($meses,0,strlen($meses)-1)."
												
											]
											
									});
							
							</script>
							";
			}
			else
			{
				
			}
			
    
        
    $resultado->free();    
    
    }
    else
    {   
    
    $form = "<div><script>console.log('$idedit');</script></div>";
    
    }
    
    }
    $mysql->close();
    
    return printf($form);
}
function verificarDato($reem,$fechas,$contar,$fecha,$meses)
{
	for($i=1;$i<=$contar+1;$i++)
	{
		if($fecha==$fechas[$i-1])
		{
			$meses=str_replace(",'".$i."'",",'".$reem."'",$meses);
			break;
		}
		
	}
	return $meses;
}
function limpiarDato($reem,$fechas,$contar,$fecha,$meses)
{
	for($i=1;$i<$contar+1;$i++)
	{
			$meses=str_replace(",'".$i."'",",''",$meses);
		
		
	}
	return $meses;
}


function costosTotales($datos)
{
	
$mysql = conexionMysql();
    $form="";
 
 
 	$fecha3 = $datos[1];
     
 $nuevafecha3 = strtotime ( '+1 day' , strtotime ( $fecha3 ) ) ;
$fecha3 = date ( 'Y-m-d' , $nuevafecha3 );
 
	if($datos[0]<=$datos[1])
	{	$meses="";
		$form.="<script>\n";
			//$('#mover').append(resp);
	//Compras!!!!!
		$sql="SELECT sum(c.total) FROM compras c where (c.fecha>='".$datos[0]."' and c.fecha<='".$fecha3."') and c.estado=1;";
		if($resultadoC = $mysql->query($sql))
		{
			
			if($resultadoC->num_rows>0)
				{
					$contar2=0;
					while($rowC = $resultadoC->fetch_row())
					{
						
						$form.= "document.getElementById('compras111').value='".toMoney($rowC[0])."';\n";
							
							
					}
					
				}
	
			$resultadoC->free();    
	   
		}
		else
		{   
		
		$form = "<div><script>console.log('');</script></div>";
		
		}
		
	//Sueldos!!!!!
		$sql="SELECT sum(c.monto)+(select sum(co.monto) from comisiones co where (co.fechaINI>='".$datos[0]."' and co.fechaFin<='".$fecha3."')) FROM sueldos c where (c.fecha>'".$datos[0]."' and c.fecha<='".$fecha3."') and c.estado=1;";
		if($resultadoC = $mysql->query($sql))
		{
			
			if($resultadoC->num_rows>0)
				{
					$contar2=0;
					while($rowC = $resultadoC->fetch_row())
					{
						
						$form.= "document.getElementById('sueldos111').value='".toMoney($rowC[0])."';\n";
							
							
					}
					
				}
	
			$resultadoC->free();    
	   
		}
		else
		{   
		
		$form = "<div><script>console.log('');</script></div>";
		
		}
	//Creditos pagados!!!!!
		$sql="SELECT sum(c.abono) FROM movimientosp c where (c.fecha>'".$datos[0]."' and c.fecha<='".$fecha3."');";
		if($resultadoC = $mysql->query($sql))
		{
			
			if($resultadoC->num_rows>0)
				{
					$contar2=0;
					while($rowC = $resultadoC->fetch_row())
					{
						
						$form.= "document.getElementById('creditosP111').value='".toMoney($rowC[0])."';\n";
							
							
					}
					
				}
	
			$resultadoC->free();    
	   
		}
		else
		{   
		
		$form = "<div><script>console.log('');</script></div>";
		
		}
	//Gastos varios!!!!!
		$sql="SELECT sum(c.monto) FROM gastos c where (c.fecha>'".$datos[0]."' and c.fecha<='".$fecha3."') and estado=1;";
		if($resultadoC = $mysql->query($sql))
		{
			
			if($resultadoC->num_rows>0)
				{
					$contar2=0;
					while($rowC = $resultadoC->fetch_row())
					{
						
						$form.= "document.getElementById('gVarios111').value='".toMoney($rowC[0])."';\n";
							
							
					}
					
				}
	
			$resultadoC->free();    
	   
		}
		else
		{   
		
		$form = "<div><script>console.log('');</script></div>";
		
		}
    
    }
	$form.="SumaCostos();";
	$form.="</script>";
    $mysql->close();
    
    return printf($form);
				
				
}

function ingresosTotales($datos)
{
	
$mysql = conexionMysql();
    $form="";
 
 
 	$fecha3 = $datos[1];
     
 $nuevafecha3 = strtotime ( '+1 day' , strtotime ( $fecha3 ) ) ;
$fecha3 = date ( 'Y-m-d' , $nuevafecha3 );
 
	if($datos[0]<=$datos[1])
	{	$meses="";
		$form.="<script>\n";
			//$('#mover').append(resp);
	//Compras!!!!!
		$sql="SELECT sum(c.total) FROM ventas c where (c.fecha>'".$datos[0]."' and c.fecha<='".$fecha3."') and c.estado=1;";
		if($resultadoC = $mysql->query($sql))
		{
			
			if($resultadoC->num_rows>0)
				{
					$contar2=0;
					while($rowC = $resultadoC->fetch_row())
					{
						
						$form.= "document.getElementById('ventas111').value='".toMoney($rowC[0])."';\n";
							
							
					}
					
				}
	
			$resultadoC->free();    
	   
		}
		else
		{   
		
		$form = "<div><script>console.log('');</script></div>";
		
		}
		//Creditos pagados!!!!!
		$sql="SELECT sum(c.abono) FROM movimientosc c where (c.fecha>'".$datos[0]."' and c.fecha<='".$fecha3."');";
		if($resultadoC = $mysql->query($sql))
		{
			
			if($resultadoC->num_rows>0)
				{
					$contar2=0;
					while($rowC = $resultadoC->fetch_row())
					{
						
						$form.= "document.getElementById('abonosCobrados1111').value='".toMoney($rowC[0])."';\n";
							
							
					}
					
				}
	
			$resultadoC->free();    
	   
		}
		else
		{   
		
		$form = "<div><script>console.log('');</script></div>";
		
		}
	
	
    
    }
	$form.="SumaIngresos();";
	$form.="</script>";
    $mysql->close();
    
    return printf($form);
				
				
}

function graficaFlujoPie($datos)
{
	
	
		?>
        <script>
		var compras=parseFloat(document.getElementById('compras111').value.replace("Q","").replace(",",""));
		var ventas=parseFloat(document.getElementById('ventas111').value.replace("Q","").replace(",",""));
		var abonosp=parseFloat(document.getElementById('abonosCobrados1111').value.replace("Q","").replace(",",""));
		var abonosC=parseFloat(document.getElementById('creditosP111').value.replace("Q","").replace(",",""));
		var sueldos=parseFloat(document.getElementById('sueldos111').value.replace("Q","").replace(",",""));
		var gastos=parseFloat(document.getElementById('gVarios111').value.replace("Q","").replace(",",""));
		
		var chart2 = c3.generate({
								bindto: '#chart2222',
								data: {
									columns: [
										['Compras',compras]
										
										
										
										
									],
									type:"pie"
									,
										selection: {
													enabled: true
												  },
									onselected: function (d, element) 
									{ 
										
										
									 },
									 onunselected: function (d, element) 
									{ 
										
										
									 }
								},
								color: {
								  pattern: ['#61B045','#F7742C','#D4AE18','#F6921E','#9E1F63','#26A9E0','#8BC53F','#D6DE23']
								}/*,
								
								pie: {
									label: {
										format: function (value, ratio, id) {
											
											return "$"+currency(d3.format('')((value)));
										}
									}
								}*/,
								tooltip: {
									format: {
										value: function (value, id) {
											var format = d3.format('');
											return format(value);
										}
							
									}
								}
							});
						setTimeout(function () {
							chart2.load({
								columns: [
									['Ventas',ventas],
									['Abonos Pagados',abonosp]
								]
							});
						}, 500);
						setTimeout(function () {
							chart2.load({
								columns: [
									['Sueldos',sueldos],
										['Creditos Pagados',abonosC]
								]
							});
						}, 1000);
						setTimeout(function () {
							chart2.load({
								columns: [
									['Gastos',gastos]
								]
							});
						}, 1500);
						
							
							
							
					</script>
        
        <?php
		
		
}

function graficaClientesBarra($datos)
{
	
	?>
    <script>
   		 var chart = c3.generate({
								bindto: '#chart',
								data: {
									x: 'x',
							//        xFormat: '%Y%m%d', // 'xFormat' can be used as custom format of 'x'
									columns: [
										
									],
									type:"bar"
								},
								axis: {
									x: {
										type: 'timeseries',
										tick: {
											format: '%Y-%m-%d'
										},
									y: {
											show: true,
											tick: {
												format: d3.format("Q")
											}
										}
									}
								},
								bar: {
									width: {
										ratio: 0.25// this makes bar width 50% of length between ticks
									}
								},
								color: {
								  pattern: ['#61B045','#F7742C','#D4AE18','#F6921E','#9E1F63','#26A9E0','#8BC53F','#D6DE23']
								},
								tooltip: {
									format: {
										value: function (value, id) {
											var format = d3.format('$');
											return format(value).replace("$","Q");
										}
							
									}
								}
							});
							</script>
    <?php
    $mysql = conexionMysql();
    $form="";
 
 
 	$fecha3 = $datos[1];
     
 $nuevafecha3 = strtotime ( '+1 day' , strtotime ( $fecha3 ) ) ;
$fecha3 = date ( 'Y-m-d' , $nuevafecha3 );
  $sql = "SELECT sum(v.total),u.nombre,v.fecha,u.apellido FROM ventas v inner join cliente u on v.idcliente=u.idcliente where (v.fecha>='".$datos[0]."' and v.fecha<='".$fecha3."') and v.estado=1 group by date(v.fecha)";
	if($datos[0]<=$datos[1])
	{$fecha3=$datos[1];
    	$titulo="['x'";
		$meses="";
		$todo="";
		$contar=0;
		$fechas[]="";
		$vender[]="";
		$fecha2=$datos[0];
		$titulo.=",'".$fecha2."'";
			$meses.=",'".($contar+1)."'";
			$fechas[$contar]=$fecha2;
			$contar++;	
		while($fecha2<($fecha3))
		{
			
			
			$nuevafecha2 = strtotime ( '+1 day' , strtotime ( $fecha2 ) ) ;
			$fecha2 = date ( 'Y-m-d' , $nuevafecha2 );
			$titulo.=",'".$fecha2."'";
			$meses.=",'".($contar+1)."'";
			$fechas[$contar]=$fecha2;
			$contar++;			
			
		}
	}
	
							
			$titulo="['x',";
						$datosGra[][]="";				
							
    if($resultado = $mysql->query($sql))
    {
      
		
			if($resultado->num_rows>0)
			{
				
					for($i=0;$i<$contar;$i++)
					{
						$datosGra[$i]['0']="['".$fechas[$i]."',";
					}
				$contar2=0;
				while($row= $fila = $resultado->fetch_row())
				{
						$sql2 = "SELECT sum(v.total),u.nombre,v.fecha,u.apellido FROM ventas v inner join cliente u on v.idcliente=u.idcliente where v.fecha like '".substr($row[2],0,10)."%' and v.estado=1 group by (u.idcliente)";
						//echo $sql2;
						if($resultado2 = $mysql->query($sql2))
    					{
      
		
								if($resultado2->num_rows>0)
								{
									$contar3=0;
									while($row2= $fila2 = $resultado2->fetch_row())
									{
										$meses2=$meses;
										$reem=(round($row2[0],5,5));
										//echo $reem.",";
										for($i=0;$i<$contar;$i++)
											{
												if($datosGra[$i]['0']=="['".substr($row2[2],0,10)."',")
												{
													$datosGra[$i][$row2[1]." ".$row2[3]]="'".$reem."',";
												}
												else
												{
													if(!isset($datosGra[$i][$row2[1]." ".$row2[3]]))
													{
														$datosGra[$i][$row2[1]." ".$row2[3]]="'',";
													}
												}
											}
										$vender[$contar3]=$row2[1]." ".$row2[3];
										
										if(strpos($titulo,"'".$row2[1]." ".$row2[3]."',"))
										{
											$titulo=$titulo;
										}
										else
										{
											$titulo.="'".$row2[1]." ".$row2[3]."',";
										}
										
										$meses2=limpiarDato($reem,$fechas,$contar,"",$meses2);
										$contar3++;
									}
								}
								
						}
						
						
				}
						
					
				echo "
							<script>
							chart.load({
									rows: [
										".substr($titulo,0,strlen($titulo)-1)."],\n";
										for($i=0;$i<$contar;$i++)
											{
													if($i==$contar-1)
													{
														
														echo $datosGra[$i]['0'];
														$sql2 = "SELECT sum(v.total),u.nombre,v.fecha,u.apellido FROM ventas v inner join cliente u on v.idcliente=u.idcliente where v.fecha like '".substr($row[2],0,10)."%' and v.estado=1 group by (u.idcliente)";
															//echo $sql2;
															if($resultado2 = $mysql->query($sql2))
															{
										  
											
																	if($resultado2->num_rows>0)
																	{
																		$contar3=0;
																		while($row2= $fila2 = $resultado2->fetch_row())
																		{
																			if(isset($datosGra[$i][$row2[1]." ".$row2[3]]))
																			{
																				echo $datosGra[$i][$row2[1]." ".$row2[3]];
																			}
																			
																			
																		}
																		echo "]\n";
																	}
															}
													}
													else
													{
													echo $datosGra[$i]['0'];
														$sql2 = "SELECT sum(v.total),u.nombre,v.fecha,u.apellido FROM ventas v inner join cliente u on v.idcliente=u.idcliente where v.fecha like '".substr($row[2],0,10)."%' and v.estado=1 group by (u.idcliente)";
															//echo $sql2;
															if($resultado2 = $mysql->query($sql2))
															{
										  
											
																	if($resultado2->num_rows>0)
																	{
																		$contar3=0;
																		while($row2= $fila2 = $resultado2->fetch_row())
																		{
																			if(isset($datosGra[$i][$row2[1]." ".$row2[3]]))
																			{
																				echo $datosGra[$i][$row2[1]." ".$row2[3]];
																			}
																			
																			
																		}
																		echo "],\n";
																	}
															}
													}
													
											}
							echo "
												
											]
											
									});
							
							</script>
							";
			}
		}
		else
		{
			$reem="";
			$meses=limpiarDato($reem,$fechas,$contar,"",$meses);
			echo "
						<script>
						chart.load({
								columns: [
									".$titulo."],
									".substr($todo,0,strlen($todo)-1)."
											
										]
										
								});
						
						</script>
						";
						
						
		}
			
   
    $resultado->free();    
    
    
    
    
    $mysql->close();
    
    return printf($form);
}
function graficaClientesPie($datos)
{
	
	
		?>
        <script>
		var chart2 = c3.generate({
								bindto: '#chart2',
								data: {
									columns: [
										
									],
									type:"pie"
									,
										selection: {
													enabled: true
												  },
									onselected: function (d, element) 
									{ 
										
										
									 },
									 onunselected: function (d, element) 
									{ 
										
										
									 }
								},
								color: {
								  pattern: ['#61B045','#F7742C','#D4AE18','#F6921E','#9E1F63','#26A9E0','#8BC53F','#D6DE23']
								}/*,
								
								pie: {
									label: {
										format: function (value, ratio, id) {
											
											return "$"+currency(d3.format('')((value)));
										}
									}
								}*/,
								tooltip: {
									format: {
										value: function (value, id) {
											var format = d3.format('$');
											return format(value).replace("$","Q");
										}
							
									}
								}
							});
					</script>
        
        <?php
		
		$mysql = conexionMysql();
    $form="";
 
 
 	$fecha3 = $datos[1];
     
 $nuevafecha3 = strtotime ( '+1 day' , strtotime ( $fecha3 ) ) ;
$fecha3 = date ( 'Y-m-d' , $nuevafecha3 );

	$sql = "SELECT sum(v.total),u.nombre,v.fecha,u.apellido FROM ventas v inner join cliente u on v.idcliente=u.idcliente where (v.fecha>='".$datos[0]."' and v.fecha<='".$fecha3."') and v.estado=1 group by v.idcliente";
  
   //$sql = "SELECT sum(dv.subtotal),sum(dv.cantidad),p.nombre,p.codigoproducto,p.tiporepuesto FROM ventas v  inner join ventasdetalle dv on dv.idventa=v.idventas inner join productos p on p.idproductos=dv.idproductos inner join usuarios u on v.idusuario=u.idusuarios where (v.fecha>'".$datos[0]."' and v.fecha<='".$fecha3."') and v.estado=1 and dv.estado=1 and p.estado=1  group by p.idproductos order by sum(dv.cantidad) desc limit 5;";
	if($datos[0]<=$datos[1])
	{	$meses="";
		
			
		
	
    if($resultado = $mysql->query($sql))
    {
      
		
			if($resultado->num_rows>0)
			{
				$contar2=0;
				while($row= $fila = $resultado->fetch_row())
				{
					
					$meses.="['".(($row[1]." ".$row[3]))."','".(round($row[0],5,2))."'],";
						
						
				}
				
				echo "
							<script>
							chart2.load({
									columns: [
										
										".substr($meses,0,strlen($meses)-1)."
												
											]
											
									});
							
							</script>
							";
			}
			else
			{
				
			}
			
    
        
    $resultado->free();    
    
    }
    else
    {   
    
    $form = "<div><script>console.log('$idedit');</script></div>";
    
    }
    
    }
    $mysql->close();
    
    return printf($form);
}
?>