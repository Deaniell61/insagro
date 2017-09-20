<?php


function buscarInventario($datos)
{
    
    
    $mysql = conexionMysql();
	$extra ='';
	if($datos[1]=='5'){
		$extra='C';
	}
    $sql = "SELECT i.precioCosto,i.precioVenta,i.precioClienteEs,i.precioDistribuidor,i.cantidad,(select p.descripcion from productos p where i.idproducto=p.idproductos),(select p.marca2 from productos p where i.idproducto=p.idproductos),(select p.nombre from productos p where i.idproducto=p.idproductos),i.minimo,i.idproducto,(select p.codigoproducto from productos p where i.idproducto=p.idproductos),(select p.tiporepuesto from productos p where i.idproducto=p.idproductos),(select p.idpresentacion from productos p where i.idproducto=p.idproductos) from inventario".$extra." i where idinventario".$extra."='".$datos[0]."'";
	$form="";
    if($resultado = $mysql->query($sql))
    {
      if($resultado->num_rows>0)
	  {
		$fila = $resultado->fetch_row();    
			
		
		$form .="<script>";
		$form .=" 
				document.getElementById('producto').value='".$fila[7]."';
				document.getElementById('idproducto').value='".$datos[0]."';
				document.getElementById('idproducto2').value='".$fila[9]."';
				document.getElementById('marca').value='".$fila[6]."';
				document.getElementById('descripcion').value='".$fila[5]."';
				document.getElementById('costo').value='".$fila[0]."';
				document.getElementById('cantidad').value='".$fila[4]."';
				document.getElementById('precioG').value='".$fila[1]."';
				document.getElementById('precioE').value='".$fila[2]."';
				document.getElementById('precioM').value='".$fila[3]."';
				document.getElementById('MinimoCant').value='".$fila[8]."';
				document.getElementById('codigo').value='".$fila[10]."';
				document.getElementById('tipoRepuesto').value='".$fila[11]."';
				document.getElementById('idpresentacion').value='".$fila[12]."';
				$('#tipoRepuesto').material_select();$('#idpresentacion').material_select();
				document.getElementById('producto').focus();
				document.getElementById('marca').focus();
				document.getElementById('descripcion').focus();
				document.getElementById('costo').focus();
				document.getElementById('cantidad').focus();
				document.getElementById('precioE').focus();
				document.getElementById('precioM').focus();
				document.getElementById('precioG').focus();
				document.getElementById('codigo').focus();
				document.getElementById('MinimoCant').focus();";
		$form .=" habilita(true);
		document.getElementById('cantidad').disabled=false;
		";
		
		
		$form .="</script>";
			
		$resultado->free();    
	  }
	  else
	  {
		$form= "error data no encontrada";
		$resultado->free();   
	  }
    
    }
    else
    {   
    
    $form = "<div><script>console.log('$idedit');</script></div>";
    
    }
    
    
    $mysql->close();
    
    echo $form;
    
    
}


function buscarInventarioConsig($datos)
{
    
    
    $mysql = conexionMysql();
	$extra ='';
	if($datos[1]=='5'){
		$extra='C';
	}
    $sql = "SELECT i.precioCosto,i.precioVenta,i.precioClienteEs,i.precioDistribuidor,i.cantidad,(select p.descripcion from productos p where i.idproducto=p.idproductos),(select p.marca2 from productos p where i.idproducto=p.idproductos),(select p.nombre from productos p where i.idproducto=p.idproductos),i.minimo,i.idproducto,(select p.codigoproducto from productos p where i.idproducto=p.idproductos),(select p.tiporepuesto from productos p where i.idproducto=p.idproductos),(select p.idpresentacion from productos p where i.idproducto=p.idproductos),i.idinventario".$extra." from inventario".$extra." i where idinventario".$extra."='".$datos[0]."'";
	$form="";
    if($resultado = $mysql->query($sql))
    {
      if($resultado->num_rows>0)
	  {
		$fila = $resultado->fetch_row();    
			
		
		$form .="<script>";
		$form .=" 
				document.getElementById('producto').value='".$fila[7]."';
				document.getElementById('idproducto').value='".$datos[0]."';
				document.getElementById('idproducto2').value='".$fila[9]."';
				document.getElementById('marca').value='".$fila[6]."';
				document.getElementById('descripcion').value='".$fila[5]."';
				document.getElementById('costo').value='".$fila[0]."';
				document.getElementById('cantidad').value='".$fila[4]."';
				document.getElementById('precioG').value='".$fila[1]."';
				document.getElementById('precioE').value='".$fila[2]."';
				document.getElementById('precioM').value='".$fila[3]."';
				document.getElementById('MinimoCant').value='".$fila[8]."';
				document.getElementById('codigo').value='".$fila[10]."';
				document.getElementById('codigo2').value='".$fila[13]."';
				document.getElementById('tipoRepuesto').value='".$fila[11]."';
				document.getElementById('idpresentacion').value='".$fila[12]."';
				$('#tipoRepuesto').material_select();$('#idpresentacion').material_select();
				document.getElementById('producto').focus();
				document.getElementById('marca').focus();
				document.getElementById('descripcion').focus();
				document.getElementById('costo').focus();
				document.getElementById('cantidad').focus();
				document.getElementById('precioE').focus();
				document.getElementById('precioM').focus();
				document.getElementById('precioG').focus();
				document.getElementById('codigo').focus();
				document.getElementById('MinimoCant').focus();";
		$form .=" habilita(true);
		document.getElementById('cantidad').disabled=false;
		";
		
		
		$form .="</script>";
			
		$resultado->free();    
	  }
	  else
	  {
		$form= "error data no encontrada";
		$resultado->free();   
	  }
    
    }
    else
    {   
    
    $form = "<div><script>console.log('$idedit');</script></div>";
    
    }
    
    
    $mysql->close();
    
    echo $form;
    
    
}

function buscarInventarioConsigEnt($datos)
{
    
    
    $mysql = conexionMysql();
	$extra ='';
	

    $sql = "SELECT i.precioCosto,i.precioVenta,i.precioClienteEs,i.precioDistribuidor,i.cantidad,(select p.descripcion from productos p where i.idproducto=p.idproductos),(select p.marca2 from productos p where i.idproducto=p.idproductos),(select p.nombre from productos p where i.idproducto=p.idproductos),i.minimo,i.idproducto,(select p.codigoproducto from productos p where i.idproducto=p.idproductos),(select p.tiporepuesto from productos p where i.idproducto=p.idproductos),(select p.idpresentacion from productos p where i.idproducto=p.idproductos),i.idinventarioC from inventarioCxCob i where idinventarioC='".$datos[0]."'";
	$form="";
    if($resultado = $mysql->query($sql))
    {
      if($resultado->num_rows>0)
	  {
		$fila = $resultado->fetch_row();    
			
		
		$form .="<script>";
		$form .=" 
				document.getElementById('producto').value='".$fila[7]."';
				document.getElementById('idproducto').value='".$datos[0]."';
				document.getElementById('idproducto2').value='".$fila[9]."';
				document.getElementById('marca').value='".$fila[6]."';
				document.getElementById('descripcion').value='".$fila[5]."';
				document.getElementById('costo').value='".$fila[0]."';
				document.getElementById('cantidad').value='".$fila[4]."';
				document.getElementById('precioG').value='".$fila[1]."';
				document.getElementById('precioE').value='".$fila[2]."';
				document.getElementById('precioM').value='".$fila[3]."';
				document.getElementById('MinimoCant').value='".$fila[8]."';
				document.getElementById('codigo').value='".$fila[10]."';
				document.getElementById('codigo2').value='".$fila[13]."';
				document.getElementById('tipoRepuesto').value='".$fila[11]."';
				document.getElementById('idpresentacion').value='".$fila[12]."';
				$('#tipoRepuesto').material_select();$('#idpresentacion').material_select();
				document.getElementById('producto').focus();
				document.getElementById('marca').focus();
				document.getElementById('descripcion').focus();
				document.getElementById('costo').focus();
				document.getElementById('cantidad').focus();
				document.getElementById('precioE').focus();
				document.getElementById('precioM').focus();
				document.getElementById('precioG').focus();
				document.getElementById('codigo').focus();
				document.getElementById('MinimoCant').focus();";
		$form .=" habilita(true);
		document.getElementById('cantidad').disabled=false;
		";
		
		
		$form .="</script>";
			
		$resultado->free();    
	  }
	  else
	  {
		$form= "error data no encontrada";
		$resultado->free();   
	  }
    
    }
    else
    {   
    
    $form = "<div><script>console.log('$idedit');</script></div>";
    
    }
    
    
    $mysql->close();
    
    echo $form;
    
    
}


function actualizaInventario($datos)
{
	$mysql = conexionMysql();
    $form="";
	session_start();
	$mysql->query("BEGIN");
	$extra='';$extra2='';
	if($datos[14]=='5'){
		$extra='C';$extra2='';
	}

	if($datos[14]=='7'){
		$extra='C';$extra2='xCob';
	}
			 
    $sql = "update inventario".$extra.$extra2." set precioventa='".$datos[1]."',precioClientees='".$datos[2]."',precioDistribuidor='".$datos[3]."',precioCosto='".$datos[4]."',cantidad='".$datos[5]."',minimo='".$datos[6]."',idpresentacion='".$datos[13]."' where idinventario".$extra."='".$datos[0]."'";
	
    if($mysql->query($sql))
    {
						if(!$mysql->query("update productos set nombre='".$datos[7]."',marca2='".$datos[8]."',descripcion='".$datos[9]."',tiporepuesto='".$datos[12]."',codigoproducto='".$datos[11]."',idpresentacion='".$datos[13]."' where idproductos='".$datos[10]."'"))
						{
							$mysql->query("ROLLBACK");
						}
						else
						{
							$mysql->query("COMMIT");
							echo "<script>location.reload();</script>";
						}
			
    }
    else
    {   
    		$mysql->query("ROLLBACK");
    	$form = '1';
    
    }
	
    
    $mysql->close();
    
    return printf($form);
}
function eliminarInventario($datos)
{
	$mysql = conexionMysql();
    $form="";
	session_start();
	$mysql->query("BEGIN");
	$extra='';
	if($datos[2]=='5'){
		$extra='C';
	}
			 
    echo $sql = "update productos set estado=0 where idproductos='".$datos[0]."'";
	
    if($mysql->query($sql))
    {
		
			if(!$mysql->query("delete from inventario".$extra." where idinventario".$extra."='".$datos[1]."'"))
			{
				$mysql->query("ROLLBACK");
			}
    					$mysql->query("COMMIT");
				echo "<script>alert('El producto fue retirado de inventario');location.reload();</script>";
			
    }
    else
    {   
    		$mysql->query("ROLLBACK");
    	$form = '1';
    
    }
	
    
    $mysql->close();
    
    return printf($form);
}


function buscarInventarioFragmentar($datos)
{
    $medida=array('','KG','LB','OZ','GR');
	$medida['']="";
    
    $mysql = conexionMysql();
    $form=array();
    $sql = "SELECT (select p.nombre from productos p where p.idproductos=i.idproducto),medida,precioCosto,cantidad from inventarioC i where idproducto='".$datos[0]."'";
	$form['status']=$sql;
    if($resultado = $mysql->query($sql))
    {
      if($resultado->num_rows>0)
	  {
		$fila = $resultado->fetch_row();    
			
		$form=$fila;
		$form['id']=$datos[0];
		$form[1]=$medida[$fila[1]];
			$form['status']="1";
		$resultado->free();    
	  }
	  else
	  {
		$form['status']="Consulta 0";
		$resultado->free();   
	  }
    
    }
    else
    {   
    $form['status']="Error sql";
    
    
    }
    
    
    $mysql->close();
    
    echo json_encode($form);
    
    
}

function buscarInventarioProductoFragmentar($datos)
{
    $medida=array('','KG','LB','OZ','GR');
	$medida['']="";
    
    $mysql = conexionMysql();
    $form=array();
    $sql = "SELECT codigoProducto,nombre,marca2,descripcion,tipoRepuesto,(select i.cantidad from inventario i where i.idproducto=p.idproductos),(select i.precioCosto from inventario i where i.idproducto=p.idproductos),idpresentacion from productos p where idproductos='".$datos[0]."'";
	$form['status']=$sql;
    if($resultado = $mysql->query($sql))
    {
      if($resultado->num_rows>0)
	  {
		$fila = $resultado->fetch_row();    
			
		$form=$fila;
		$form['id']=$datos[0];
		//$form[1]=$medida[$fila[1]];
			$form['status']="1";
		$resultado->free();    
	  }
	  else
	  {
		$form['status']="Consulta 0";
		$resultado->free();   
	  }
    
    }
    else
    {   
    $form['status']="Error sql\n".$sql;
    
    
    }
    
    
    $mysql->close();
    
    echo json_encode($form);
    
    
}

function buscarInventarioProductoFragmentarEntrada($datos)
{
    $medida=array('','KG','LB','OZ','GR');
	$medida['']="";
    
    $mysql = conexionMysql();
    $form=array();
    $sql = "SELECT codigoProducto,nombre,marca2,descripcion,tipoRepuesto,(select i.cantidad from inventarioFrag i where i.idproducto=p.idproductos),(select i.precioCosto from inventarioFrag i where i.idproducto=p.idproductos),idpresentacion from productos p where idproductos='".$datos[0]."'";
	$form['status']=$sql;
    if($resultado = $mysql->query($sql))
    {
      if($resultado->num_rows>0)
	  {
		$fila = $resultado->fetch_row();    
			
		$form=$fila;
		$form['id']=$datos[0];
		//$form[1]=$medida[$fila[1]];
			$form['status']="1";
		$resultado->free();    
	  }
	  else
	  {
		$form['status']="Consulta 0";
		$resultado->free();   
	  }
    
    }
    else
    {   
    $form['status']="Error sql\n".$sql;
    
    
    }
    
    
    $mysql->close();
    
    echo json_encode($form);
    
    
}

function fragmentarInventario($datos)
{
    session_start();
    $mysql = conexionMysql();
    $form="";
	$mysql->query("BEGIN");
	$query="select cantidad,idinventario from inventarioFrag where idproducto='".$datos[9]."'";
	
	if($resultadoF = $mysql->query($query))
	{
		if($resultadoF->num_rows>0){
			$sql = "update inventarioFrag set precioCosto='".$datos[4]."',precioVenta='".$datos[1]."',cantidad=cantidad+".$datos[5]." where idproducto='".$datos[9]."' ";
			if($datos[0]!=""){
				if($resultado = $mysql->query($sql))
				{
					$divi='';
					if($datos[12]=='1')
					{
						$divi='/100';
					}
						$sql2 = "update inventario set cantidad=cantidad-(".$datos[5].$divi.") where idproducto='".$datos[0]."' ";
						if($resultado2 = $mysql->query($sql2))
						{
							$query="select idinventario from inventario where idproducto='".$datos[0]."'";
							
							if($resultadoF = $mysql->query($query))
							{
									$fila = $resultadoF->fetch_row(); 
									$saldo = $datos[11]-($datos[5]/100);
									$squery = "INSERT INTO detalleFragmentar(consignado,retirado,saldo,fecha,descripcion,idinventario,idusuario) values('".$datos[11]."',(".$datos[5].$divi."),'".$saldo."','".date('Y-m-d H:i:s')."','".$datos[10]."',".$fila[0].",'".$_SESSION['SOFT_USER_ID']."');";
									if(!$mysql->query($squery)){
										$mysql->query("ROLLBACK");
										$form='<script>
										alert("error");
										</script>';
									}else{
									$mysql->query("COMMIT");
									$mysql->query("COMMIT");
								$form='<script>
								limpiarFragmentar();
								location.reload();
								</script>';}
							}

						}else{
							$mysql->query("ROLLBACK");
							$form='<script>
							alert("error");
							</script>';
						}
					
				}
				else
				{   
					$mysql->query("ROLLBACK");
					$form='<script>
					alert("error");
					</script>';
				}
			}else{
				$mysql->query("ROLLBACK");
				$form='<script>
				alert("error");
				</script>';
			}
		}else
		{
			$sql = "insert into inventarioFrag(precioCosto,precioVenta,cantidad,idproducto)  values('".$datos[4]."','".$datos[1]."',".$datos[5].",'".$datos[9]."') ";
			
			if($datos[0]!=""){
				if($resultado = $mysql->query($sql))
				{
					
						$sql2 = "update inventario set cantidad=cantidad-(".$datos[5]."/100) where idproducto='".$datos[0]."' ";
						if($resultado2 = $mysql->query($sql2))
						{
							$query="select idinventario from inventario where idproducto='".$datos[0]."'";
							
							if($resultadoF = $mysql->query($query))
							{
									$fila = $resultadoF->fetch_row(); 
									$saldo = $datos[11]-($datos[5]/100);
									$squery = "INSERT INTO detalleFragmentar(consignado,retirado,saldo,fecha,descripcion,idinventario,idusuario) values('".$datos[11]."',(".$datos[5]."/100),'".$saldo."','".date('Y-m-d H:i:s')."','".$datos[10]."',".$fila[0].",'".$_SESSION['SOFT_USER_ID']."');";
									if(!$mysql->query($squery)){
										$mysql->query("ROLLBACK");
										$form='<script>
										alert("error");
										</script>';
									}else{
								$mysql->query("COMMIT");
								$mysql->query("COMMIT");
								$form='<script>
								//alert("'.$sql.'");
								limpiarFragmentar();
								location.reload();
								</script>';}
							}
						}else{
							$mysql->query("ROLLBACK");
							$form='<script>
							alert("error");
							</script>';
						}
					
				}
				else
				{   
					$mysql->query("ROLLBACK");
					$form='<script>
					alert("error");
					</script>';
				}
			}else{
				$mysql->query("ROLLBACK");
				$form='<script>
				alert("error");
				</script>';
			}
		}
	}
    
    
    $mysql->close();
    
    echo ($form);
    
    
}

function fragmentarInventarioEntrada($datos)
{
    session_start();
    $mysql = conexionMysql();
    $form=array();
	$mysql->query("BEGIN");
	if($datos[12]<=0){
		$datos[12]=$datos[1];
	}
    $sql = "update inventario set precioCosto='".$datos[4]."',precioVenta='".$datos[12]."',cantidad=cantidad+".$datos[5]." where idproducto='".$datos[9]."' ";
	if($datos[0]!=""){
		if($resultado = $mysql->query($sql))
		{
				$sql2 = "update inventarioFrag set cantidad=cantidad-(".$datos[5].") where idproducto='".$datos[0]."' ";
				if($resultado2 = $mysql->query($sql2))
				{
					$query="select idinventario from inventarioFrag where idproducto='".$datos[0]."'";
					
					if($resultadoF = $mysql->query($query))
					{
							if($fila = $resultadoF->fetch_row()){
								$saldo = $datos[11]-($datos[5]);
								$squery1 = "INSERT INTO detalleFragmentarEntr(consignado,retirado,saldo,fecha,descripcion,idinventario,idusuario,precioventa) values('".$datos[11]."',(".$datos[5]."),'".$saldo."','".date('Y-m-d H:i:s')."','".$datos[10]."',".$fila[0].",'".$_SESSION['SOFT_USER_ID']."',".$datos[12].");";
								if(!$mysql->query($squery1)){
									$mysql->query("ROLLBACK");
									$form='<script>
									alert("'.$squery1.'");
									</script>';
								}else{
									$mysql->query("COMMIT");
									$mysql->query("COMMIT");
								$form='<script>
								limpiarFragmentar();
								location.reload();
								</script>';
								}
							}
							
					}
				}else{
					$mysql->query("ROLLBACK");
					$form='<script>
					alert("error");
					</script>';
				}
			
		}
		else
		{   
			$mysql->query("ROLLBACK");
			$form='<script>
			alert("error");
			</script>';
		}
	}else{
		$mysql->query("ROLLBACK");
		$form='<script>
		alert("error");
		</script>';
	}
    
    
    $mysql->close();
    
    echo ($form);
    
    
}

function fragmentarInventarioNuevo($datos)
{
    
    $mysql = conexionMysql();
    $form=array();
	$mysql->query("BEGIN");
    $sql ="";// "update inventario set precioCosto='".$datos[4]."',precioVenta='".$datos[1]."',cantidad=cantidad+".$datos[5]." where idproducto='".$datos[9]."' ";
	$form['status']=$sql;

		if($resultado = $mysql->query($sql))
		{
			$sql2 = "update inventario set cantidad=cantidad-(".$datos[5]."/100) where idproducto='".$datos[0]."' ";
			if($resultado2 = $mysql->query($sql2))
			{
				$mysql->query("COMMIT");
				$form['status']='1';
				$form['message']='Fragmentado Correctamente';
			}else{
				$mysql->query("ROLLBACK");
				$form['message']="Error sql\n".$sql;
				$form['status']="0";
			}
			
		}
		else
		{   
			$mysql->query("ROLLBACK");
			$form['message']="Error sql\n".$sql;
			$form['status']="0";
		}
	
    
    
    $mysql->close();
    
    echo json_encode($form);
    
    
}

function reducirInventarioC($idprod,$cantidad,$medida){


    $mysql = conexionMysql();
    $form=array();
    $sql = "select cantidad,medida from inventarioC where idproducto='".$idprod."');";
    if($resultado = $mysql->query($sql))
    {
		if($resultado->num_rows>0)
	  {
		$fila = $resultado->fetch_row();    
			
		
		$resultado->free();    
	  }
	  else
	  {
		$form['status']="Consulta 0";
		$resultado->free();   
	  }
    }
    else
    {   
    $form['message']="Error sql\n".$sql;
	$form['status']="0";
    
    
    }
    
    
    $mysql->close();
    
    echo json_encode($form);

}

function impInvAdmin($datos){
	
session_start();
if(isset($_SESSION['codigoBuscaProducto_SOFT']))
{
	if($_SESSION['codigoBuscaProducto_SOFT']!="")
	{
		$mas=" and p.codigoproducto='".$_SESSION['codigoBuscaProducto_SOFT']."' and i.cantidad<=i.minimo ";
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
	//creamos la pestaña
	
	
	$o=0;
	
	$i = 3;

	$ss = 0;

	   

$mysql = conexionMysql();
    $sqlSegmento = "select tiporepuesto from productos group by tiporepuesto order by tiporepuesto;";
    $tipo=array('','Sector Fertilizantes','Sector Herbicidas','Sector Insecticidas','Sector Veterinarios','Sector semillas','Sector Caceros','Sector Concentrados','Sector Equipo Agricola','Sector Foliares','Sector Fungicidas','Sector Adherentes','Sector Bolsas','Sector Plastico','Sector Pintura');
    $return="";
	$cont=0;

	if($resultadoSegmento = $mysql->query($sqlSegmento))
    {

        if(mysqli_num_rows($resultadoSegmento)==0)
        {
            $respuesta = "<div class='error'>No hay usuarios BD vacia</div>";
        }

        else
        {

			$ini=0;
			$cantidadG=0;
			$costoG=0;
			$precioG=0;
            while($filaSegmento = $resultadoSegmento->fetch_row())
			{
				$cont=0;
				$precio =0;
				$costo =0;
				$cantidad =0;
				$return.='<div class="deposito">';
				$return.='<center><h5>'.$tipo[$o+1].'</h5>';
				$return.='<table  class="depositosTabla">';
				
				
				$i=0;
				$sql = "SELECT p.nombre,i.preciocosto,p.idproductos,p.codigoproducto,p.descripcion,i.precioCosto,i.precioVenta,i.precioClienteEs,i.precioDistribuidor,i.cantidad,p.marca2,p.codigoproducto,i.idinventario,p.idproductos,p.tiporepuesto,(select ps.descripcion from presentacion ps where ps.idpresentacion=i.idpresentacion) FROM inventario i inner join productos p on p.idproductos=i.idproducto where i.cantidad>=0 $mas and p.estado=1 order by p.codigoproducto";
    
				if($resultado = $mysql->query($sql))
				{

					if(mysqli_num_rows($resultado)==0)
					{
						$respuesta = "<div class='error'>No hay usuarios BD vacia</div>";
					}

					else
					{
						$r=1;
						   $return.='<tr class="FilaInventarioT">'.
									'<th class="InventarioColumnaT">Correlativo</th>'.
									'<th class="InventarioColumnaT">Codigo</th>'.
									'<th class="InventarioColumnaTProd">Producto</th>'.
									'<th class="InventarioColumnaT">Marca</th>'.
									'<th class="InventarioColumnaT">Presentacion</th>'.
									'<th class="InventarioColumnaT">Costo</th>'.
									'<th class="InventarioColumnaT">Cantidad</th>'.
									'<th class="InventarioColumnaT">SubTotal</th>'.
									'<th class="InventarioColumnaT">Precio General</th>'.
									'</tr>';
							
							while($fila = $resultado->fetch_row())
							{
								
								if($fila["14"]==$filaSegmento[0])
									{
										
							$cont++;
							$precio+=$fila["6"];
							$costo+=$fila["5"];
							$precioG+=$fila["6"];
							$costoG+=$fila["5"];
							$cantidadG+=$fila["9"];
							$cantidad+=$fila["9"];
									$return.='<tr class="FilaInventario">'.
                                '<td class="InventarioColumna">'.$cont.'</td>'.
                                '<td class="InventarioColumna">'.$fila["11"].'</td>'.
                                '<td class="InventarioColumna">'.($fila["0"]).'</td>'.
                                '<td class="InventarioColumna">'.($fila["10"]).'</td>'.
                                '<td class="InventarioColumna">'.($fila["15"]).'</td>'.
                                '<td class="InventarioColumna">'.toMoney($fila["5"]).'</td>'.
                                '<td class="InventarioColumna">'.($fila["9"]).'</td>'.
                                '<td class="InventarioColumna">'.toMoney(($fila["5"]*1)*($fila["9"]*1)).'</td>'.
                                '<td class="InventarioColumna">'.toMoney($fila["6"]).'</td>'.
                                
                                '</tr>';
									
										$i++;
									}

							}

								$return.='<tr class="FilaInventario">'.
                                '<td class="InventarioColumna"></td>'.
                                '<td class="InventarioColumna"></td>'.
                                '<td class="InventarioColumna"></td>'.
                                '<td class="InventarioColumna"></td>'.
                                '<td class="InventarioColumna">Totales= </td>'.
                                '<td class="InventarioColumna">'.toMoney($costo).'</td>'.
                                '<td class="InventarioColumna">'.$cantidad.'</td>'.
                                '<td class="InventarioColumna">'.toMoney(($costo*$cantidad).'').'</td>'.
                                '<td class="InventarioColumna">'.toMoney($precio).'</td>'.
                                
                                '</tr>';

							$return.='</table></center></div>';

							$resultado->free();//librerar variable


					
					}
				}
				else
				{
					$respuesta = "<div class='error'>Error: no se ejecuto la consulta a BD</div>";

				}
				$i++;
				$o++;
			}
			$return.='<div class="deposito">';
				$return.='<table  class="depositosTabla">';
				$return.='<tr class="FilaInventarioT">'.
				'<th class="InventarioColumnaT">Total Costos</th>'.
				'<th class="InventarioColumnaT">Total Cantidad</th>'.
				'<th class="InventarioColumnaT">Total General</th>'.
				'<th class="InventarioColumnaT">Total Precio</th>'.
				'</tr>';
			
				$return.='<tr class="FilaInventario">'.
							'<td class="InventarioColumnaT">'.toMoney($costoG).'</td>'.
							'<td class="InventarioColumnaT">'.$cantidadG.'</td>'.
							'<td class="InventarioColumnaT">'.toMoney(($costoG*$cantidadG).'').'</td>'.
							'<td class="InventarioColumnaT">'.toMoney($precioG).'</td>'.
                                
                                '</tr>';
				$return.='</table></div>';
			$resultadoSegmento->free();//librerar variable
		}
	}else
				{
					$respuesta = "<div class='error'>Error: no se ejecuto la consulta a BD</div>";

				}

    //cierro la conexion
    $mysql->close();
	echo ($return);
}


function impInvAdminSinPres($datos){
	
session_start();
if(isset($_SESSION['codigoBuscaProducto_SOFT']))
{
	if($_SESSION['codigoBuscaProducto_SOFT']!="")
	{
		$mas=" and p.codigoproducto='".$_SESSION['codigoBuscaProducto_SOFT']."' and i.cantidad<=i.minimo ";
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
	//creamos la pestaña
	
	
	$o=0;
	
	$i = 3;

	$ss = 0;

	   

$mysql = conexionMysql();
    $sqlSegmento = "select tiporepuesto from productos group by tiporepuesto order by tiporepuesto;";
    $tipo=array('','Sector Fertilizantes','Sector Herbicidas','Sector Insecticidas','Sector Veterinarios','Sector semillas','Sector Caceros','Sector Concentrados','Sector Equipo Agricola','Sector Foliares','Sector Fungicidas','Sector Adherentes','Sector Bolsas','Sector Plastico','Sector Pintura');
    $return="";
	$cont=0;

	if($resultadoSegmento = $mysql->query($sqlSegmento))
    {

        if(mysqli_num_rows($resultadoSegmento)==0)
        {
            $respuesta = "<div class='error'>No hay usuarios BD vacia</div>";
        }

        else
        {

			$ini=0;
			$cantidadG=0;
			$costoG=0;
			$subtotalgenG=0;
			$precioG=0;
            while($filaSegmento = $resultadoSegmento->fetch_row())
			{
				$cont=0;
				$precio =0;
				$costo =0;
				$subtotalgen=0;
				$return.='<div class="deposito">';
				$return.='<center><h5>'.$tipo[$o+1].'</h5>';
				$return.='<table  class="depositosTabla">';
				
				
				$i=0;
				$sql = "SELECT p.nombre,i.preciocosto,p.idproductos,p.codigoproducto,p.descripcion,i.precioCosto,i.precioVenta,i.precioClienteEs,i.precioDistribuidor,i.cantidad,p.marca2,p.codigoproducto,i.idinventario,p.idproductos,p.tiporepuesto,(select ps.descripcion from presentacion ps where ps.idpresentacion=i.idpresentacion) FROM inventario i inner join productos p on p.idproductos=i.idproducto where i.cantidad>=0 $mas and p.estado=1 order by p.codigoproducto";
    
				if($resultado = $mysql->query($sql))
				{

					if(mysqli_num_rows($resultado)==0)
					{
						$respuesta = "<div class='error'>No hay usuarios BD vacia</div>";
					}

					else
					{
						$r=1;
						   $return.='<tr class="FilaInventarioT">'.
									'<th class="InventarioColumnaT">Correlativo</th>'.
									'<th class="InventarioColumnaT">Codigo</th>'.
									'<th class="InventarioColumnaTProd">Producto</th>'.
									'<th class="InventarioColumnaT">Marca</th>'.
									'<th class="InventarioColumnaT">Presentacion</th>'.
									'<th class="InventarioColumnaT">Cantidad</th>'.
									'<th class="InventarioColumnaT">Costo</th>'.
									'<th class="InventarioColumnaT">Subtotal</th>'.
									'</tr>';
							
							while($fila = $resultado->fetch_row())
							{
								
								if($fila["14"]==$filaSegmento[0])
									{
										
							$cont++;
							$precio+=$fila["9"];
							$costo+=$fila["5"];
							$precioG+=$fila["6"];
							$costoG+=$fila["5"];
							$cantidadG+=$fila["9"];
							$subtotalgen+=($fila["5"]*1)*($fila["9"]*1);
							$subtotalgenG+=($fila["5"]*1)*($fila["9"]*1);
									$return.='<tr class="FilaInventario">'.
                                '<td class="InventarioColumna">'.$cont.'</td>'.
                                '<td class="InventarioColumna">'.$fila["11"].'</td>'.
                                '<td class="InventarioColumna">'.($fila["0"]).'</td>'.
                                '<td class="InventarioColumna">'.($fila["10"]).'</td>'.
                                '<td class="InventarioColumna">'.($fila["15"]).'</td>'.
                                '<td class="InventarioColumna">'.($fila["9"]).'</td>'.
                                '<td class="InventarioColumna">'.toMoney($fila["5"]).'</td>'.
                                '<td class="InventarioColumna">'.toMoney(($fila["5"]*1)*($fila["9"]*1)).'</td>'.
                                
                                '</tr>';
									
										$i++;
									}

							}
							$return.='<tr class="FilaInventario">'.
                                
                                '<td class="InventarioColumna"></td>'.
                                '<td class="InventarioColumna"></td>'.
                                '<td class="InventarioColumna"></td>'.
                                '<td class="InventarioColumna"></td>'.
                                '<td class="InventarioColumna"></td>'.
                                '<td class="InventarioColumna"></td>'.
                                '<td class="InventarioColumna">Total=</td>'.
                                '<td class="InventarioColumna">'.toMoney(($subtotalgen).'').'</td>'.
                                
                                '</tr>';

							$return.='</table></center></div>';

							$resultado->free();//librerar variable


					
					}
				}
				else
				{
					$return.= $sql."<div class='error'>Error: no se ejecuto la consulta a BD</div>";

				}
				$i++;
				$o++;
			}
			$return.='<div class="deposito">';
				$return.='<table  class="depositosTabla">';
				$return.='<tr class="FilaInventarioT">'.
				'<th class="InventarioColumna"></th>'.
				'<th class="InventarioColumna"></th>'.
				'<th class="InventarioColumna"></th>'.
				'<th class="InventarioColumna"></th>'.
				'<th class="InventarioColumna"></th>'.
				'<th class="InventarioColumna"></th>'.
				'<th class="InventarioColumna"></th>'.
				'<th class="InventarioColumnaT">Total</th>'.
				'</tr>';
				$return.='<tr class="FilaInventario">'.
				'<th class="InventarioColumna" ><span></span></th>'.
				'<th class="InventarioColumna"><span></span></th>'.
				'<th class="InventarioColumnaProd"><span></span></th>'.
				'<th class="InventarioColumna"><span></span></th>'.
				'<th class="InventarioColumna"><span></span></th>'.
				'<th class="InventarioColumna"><span></span></th>'.
				'<th class="InventarioColumna"><span></span></th>'.
				'<td class="InventarioColumnaT" style="width: 10%;"><center>'.toMoney(($subtotalgenG).'').'</center></td>'.
				
				'</tr>';
				
				
				$return.='</table></center></div>';
			$resultadoSegmento->free();//librerar variable
		}
	}else
				{
					$respuesta = "<div class='error'>Error: no se ejecuto la consulta a BD</div>";

				}

    //cierro la conexion
    $mysql->close();
	echo ($return);
}

function impInvConsignacion($datos){
	
session_start();
if(isset($_SESSION['codigoBuscaProducto_SOFT']))
{
	if($_SESSION['codigoBuscaProducto_SOFT']!="")
	{
		$mas=" and p.codigoproducto='".$_SESSION['codigoBuscaProducto_SOFT']."' and i.cantidad<=i.minimo ";
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
	//creamos la pestaña
	
	
	$o=0;
	
	$i = 3;

	$ss = 0;

	   

$mysql = conexionMysql();
    $sqlSegmento = "select tiporepuesto from productos group by tiporepuesto order by tiporepuesto;";
    $tipo=array('','Sector Fertilizantes','Sector Herbicidas','Sector Insecticidas','Sector Veterinarios','Sector semillas','Sector Caceros','Sector Concentrados','Sector Equipo Agricola','Sector Foliares','Sector Fungicidas','Sector Adherentes','Sector Bolsas','Sector Plastico','Sector Pintura');
    $return="";
	$cont=0;

	if($resultadoSegmento = $mysql->query($sqlSegmento))
    {

        if(mysqli_num_rows($resultadoSegmento)==0)
        {
            $respuesta = "<div class='error'>No hay usuarios BD vacia</div>";
        }

        else
        {

			$ini=0;
			$cantidadG=0;
			$costoG=0;
			$precioG=0;
			$subtotalgenG=0;
            while($filaSegmento = $resultadoSegmento->fetch_row())
			{
				$cont=0;
				$precio =0;
				$costo =0;
				$subtotalgen=0;
				
				
				
				$i=0;
				$sql = "SELECT p.nombre,i.preciocosto,p.idproductos,p.codigoproducto,p.descripcion,i.precioCosto,i.precioVenta,i.precioClienteEs,i.precioDistribuidor,i.cantidad,p.marca2,p.codigoproducto,i.idinventarioC,p.idproductos,p.tiporepuesto,(select ps.descripcion from presentacion ps where ps.idpresentacion=i.idpresentacion) FROM inventarioC i inner join productos p on p.idproductos=i.idproducto where i.cantidad>=0 and p.tiporepuesto='".$filaSegmento[0]."' $mas  order by p.codigoproducto";
    
				if($resultado = $mysql->query($sql))
				{

					if(mysqli_num_rows($resultado)<=0)
					{
						$respuesta = "<div class='error'>No hay usuarios BD vacia</div>";
					}

					else
					{
						$return.='<div class="deposito">';
						$return.='<center><h5>'.$tipo[$o+1].'</h5>';
						$return.='<table  class="depositosTabla">';
						$r=1;
						   $return.='<tr class="FilaInventarioT">'.
									'<th class="InventarioColumnaT">Correlativo</th>'.
									'<th class="InventarioColumnaT">Codigo</th>'.
									'<th class="InventarioColumnaTProd">Producto</th>'.
									'<th class="InventarioColumnaT">Marca</th>'.
									'<th class="InventarioColumnaT">Presentacion</th>'.
									'<th class="InventarioColumnaT">Cantidad</th>'.
									'<th class="InventarioColumnaT">Costo</th>'.
									'<th class="InventarioColumnaT">Subtotal</th>'.
									'</tr>';
							
							while($fila = $resultado->fetch_row())
							{
								
								if($fila["14"]==$filaSegmento[0])
									{
										
							$cont++;
							$precio+=$fila["9"];
							$costo+=$fila["5"];
							$precioG+=$fila["6"];
							$costoG+=$fila["5"];
							$cantidadG+=$fila["9"];
							$subtotalgen+=($fila["5"]*1)*($fila["9"]*1);
							$subtotalgenG+=($fila["5"]*1)*($fila["9"]*1);
									$return.='<tr class="FilaInventario">'.
                                '<td class="InventarioColumna">'.$cont.'</td>'.
                                '<td class="InventarioColumna">'.$fila["11"].'</td>'.
                                '<td class="InventarioColumna">'.($fila["0"]).'</td>'.
                                '<td class="InventarioColumna">'.($fila["10"]).'</td>'.
                                '<td class="InventarioColumna">'.($fila["15"]).'</td>'.
                                '<td class="InventarioColumna">'.($fila["9"]).'</td>'.
                                '<td class="InventarioColumna">'.toMoney($fila["5"]).'</td>'.
                                '<td class="InventarioColumna">'.toMoney(($fila["5"]*1)*($fila["9"]*1)).'</td>'.
                                
                                '</tr>';
									
										$i++;
									}

							}
							$return.='<tr class="FilaInventario">'.
                                
                                '<td class="InventarioColumna"></td>'.
                                '<td class="InventarioColumna"></td>'.
                                '<td class="InventarioColumna"></td>'.
                                '<td class="InventarioColumna"></td>'.
                                '<td class="InventarioColumna"></td>'.
                                '<td class="InventarioColumna"></td>'.
                                '<td class="InventarioColumna">Total=</td>'.
                                '<td class="InventarioColumna">'.toMoney(($subtotalgen).'').'</td>'.
                                
                                '</tr>';

							$return.='</table></center></div>';

							$resultado->free();//librerar variable


					
					}
				}
				else
				{
					$return.= $sql."<div class='error'>Error: no se ejecuto la consulta a BD</div>";

				}
				$i++;
				$o++;
			}
			$return.='<div class="deposito">';
				$return.='<table  class="depositosTabla">';
				$return.='<tr class="FilaInventarioT">'.
				'<th class="InventarioColumnaT"></th>'.
				'<th class="InventarioColumnaT"></th>'.
				'<th class="InventarioColumnaT"></th>'.
				'<th class="InventarioColumnaT"></th>'.
				'<th class="InventarioColumnaT"></th>'.
				'<th class="InventarioColumnaT"></th>'.
				'<th class="InventarioColumnaT"></th>'.
				'<th class="InventarioColumnaT">Total</th>'.
				'</tr>';
				$return.='<tr class="FilaInventario">'.
				
				'<td class="InventarioColumna"></td>'.
				'<td class="InventarioColumna"></td>'.
				'<td class="InventarioColumna"></td>'.
				'<td class="InventarioColumna"></td>'.
				'<td class="InventarioColumna"></td>'.
				'<td class="InventarioColumna"></td>'.
				'<td class="InventarioColumna"></td>'.
				'<td class="InventarioColumna">'.toMoney(($subtotalgenG).'').'</td>'.
				
				'</tr>';
				
				$return.='</table></center></div>';
			$resultadoSegmento->free();//librerar variable
		}
	}else
				{
					$respuesta = "<div class='error'>Error: no se ejecuto la consulta a BD</div>";

				}

    //cierro la conexion
    $mysql->close();
	echo ($return);
}


function impInvConsignacionEntrada($datos){
	
session_start();
if(isset($_SESSION['codigoBuscaProducto_SOFT']))
{
	if($_SESSION['codigoBuscaProducto_SOFT']!="")
	{
		$mas=" and p.codigoproducto='".$_SESSION['codigoBuscaProducto_SOFT']."' and i.cantidad<=i.minimo ";
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
	//creamos la pestaña
	
	
	$o=0;
	
	$i = 3;

	$ss = 0;

	   

$mysql = conexionMysql();
    $sqlSegmento = "select tiporepuesto from productos group by tiporepuesto order by tiporepuesto;";
    $tipo=array('','Sector Fertilizantes','Sector Herbicidas','Sector Insecticidas','Sector Veterinarios','Sector semillas','Sector Caceros','Sector Concentrados','Sector Equipo Agricola','Sector Foliares','Sector Fungicidas','Sector Adherentes','Sector Bolsas','Sector Plastico','Sector Pintura');
    $return="";
	$cont=0;

	if($resultadoSegmento = $mysql->query($sqlSegmento))
    {

        if(mysqli_num_rows($resultadoSegmento)==0)
        {
            $respuesta = "<div class='error'>No hay usuarios BD vacia</div>";
        }

        else
        {

			$ini=0;
			$cantidadG=0;
			$costoG=0;
			$precioG=0;
			$subtotalgenG=0;
            while($filaSegmento = $resultadoSegmento->fetch_row())
			{
				$cont=0;
				$precio =0;
				$costo =0;
				$subtotalgen=0;
				
				
				
				$i=0;
				$sql = "SELECT p.nombre,i.preciocosto,p.idproductos,p.codigoproducto,p.descripcion,i.precioCosto,i.precioVenta,i.precioClienteEs,i.precioDistribuidor,i.cantidad,p.marca2,p.codigoproducto,i.idinventarioC,p.idproductos,p.tiporepuesto,(select ps.descripcion from presentacion ps where ps.idpresentacion=i.idpresentacion) FROM inventarioCxCob i inner join productos p on p.idproductos=i.idproducto where i.cantidad>=0 and p.tiporepuesto='".$filaSegmento[0]."' $mas  order by p.codigoproducto";
    
				if($resultado = $mysql->query($sql))
				{

					if(mysqli_num_rows($resultado)<=0)
					{
						$respuesta = "<div class='error'>No hay usuarios BD vacia</div>";
					}

					else
					{
						$return.='<div class="deposito">';
						$return.='<center><h5>'.$tipo[$o+1].'</h5>';
						$return.='<table  class="depositosTabla">';
						$r=1;
						   $return.='<tr class="FilaInventarioT">'.
									'<th class="InventarioColumnaT">Correlativo</th>'.
									'<th class="InventarioColumnaT">Codigo</th>'.
									'<th class="InventarioColumnaTProd">Producto</th>'.
									'<th class="InventarioColumnaT">Marca</th>'.
									'<th class="InventarioColumnaT">Presentacion</th>'.
									'<th class="InventarioColumnaT">Cantidad</th>'.
									'<th class="InventarioColumnaT">Costo</th>'.
									'<th class="InventarioColumnaT">Subtotal</th>'.
									'</tr>';
							
							while($fila = $resultado->fetch_row())
							{
								
								if($fila["14"]==$filaSegmento[0])
									{
										
							$cont++;
							$precio+=$fila["9"];
							$costo+=$fila["5"];
							$precioG+=$fila["6"];
							$costoG+=$fila["5"];
							$cantidadG+=$fila["9"];
							$subtotalgen+=($fila["5"]*1)*($fila["9"]*1);
							$subtotalgenG+=($fila["5"]*1)*($fila["9"]*1);
									$return.='<tr class="FilaInventario">'.
                                '<td class="InventarioColumna">'.$cont.'</td>'.
                                '<td class="InventarioColumna">'.$fila["11"].'</td>'.
                                '<td class="InventarioColumna">'.($fila["0"]).'</td>'.
                                '<td class="InventarioColumna">'.($fila["10"]).'</td>'.
                                '<td class="InventarioColumna">'.($fila["15"]).'</td>'.
                                '<td class="InventarioColumna">'.($fila["9"]).'</td>'.
                                '<td class="InventarioColumna">'.toMoney($fila["5"]).'</td>'.
                                '<td class="InventarioColumna">'.toMoney(($fila["5"]*1)*($fila["9"]*1)).'</td>'.
                                
                                '</tr>';
									
										$i++;
									}

							}
							$return.='<tr class="FilaInventario">'.
                                
                                '<td class="InventarioColumna"></td>'.
                                '<td class="InventarioColumna"></td>'.
                                '<td class="InventarioColumna"></td>'.
                                '<td class="InventarioColumna"></td>'.
                                '<td class="InventarioColumna"></td>'.
                                '<td class="InventarioColumna"></td>'.
                                '<td class="InventarioColumna">Total=</td>'.
                                '<td class="InventarioColumna">'.toMoney(($subtotalgen).'').'</td>'.
                                
                                '</tr>';

							$return.='</table></center></div>';

							$resultado->free();//librerar variable


					
					}
				}
				else
				{
					$return.= $sql."<div class='error'>Error: no se ejecuto la consulta a BD</div>";

				}
				$i++;
				$o++;
			}
			$return.='<div class="deposito">';
				$return.='<table  class="depositosTabla">';
				$return.='<tr class="FilaInventarioT">'.
				'<th class="InventarioColumnaT"></th>'.
				'<th class="InventarioColumnaT"></th>'.
				'<th class="InventarioColumnaT"></th>'.
				'<th class="InventarioColumnaT"></th>'.
				'<th class="InventarioColumnaT"></th>'.
				'<th class="InventarioColumnaT"></th>'.
				'<th class="InventarioColumnaT"></th>'.
				'<th class="InventarioColumnaT">Total</th>'.
				'</tr>';
				$return.='<tr class="FilaInventario">'.
				
				'<td class="InventarioColumna"></td>'.
				'<td class="InventarioColumna"></td>'.
				'<td class="InventarioColumna"></td>'.
				'<td class="InventarioColumna"></td>'.
				'<td class="InventarioColumna"></td>'.
				'<td class="InventarioColumna"></td>'.
				'<td class="InventarioColumna"></td>'.
				'<td class="InventarioColumna">'.toMoney(($subtotalgenG).'').'</td>'.
				
				'</tr>';
				
				$return.='</table></center></div>';
			$resultadoSegmento->free();//librerar variable
		}
	}else
				{
					$respuesta = "<div class='error'>Error: no se ejecuto la consulta a BD</div>";

				}

    //cierro la conexion
    $mysql->close();
	echo ($return);
}


function impFragmentarSalida($datos){
	
session_start();
if(isset($_SESSION['codigoBuscaProducto_SOFT']))
{
	if($_SESSION['codigoBuscaProducto_SOFT']!="")
	{
		$mas=" and p.codigoproducto='".$_SESSION['codigoBuscaProducto_SOFT']."' and i.cantidad<=i.minimo ";
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
	//creamos la pestaña
	
	
	$o=0;
	
	$i = 3;

	$ss = 0;

	   

$mysql = conexionMysql();
    $sqlSegmento = "select tiporepuesto from productos group by tiporepuesto order by tiporepuesto;";
    $tipo=array('','Sector Fertilizantes','Sector Herbicidas','Sector Insecticidas','Sector Veterinarios','Sector semillas','Sector Caceros','Sector Concentrados','Sector Equipo Agricola','Sector Foliares','Sector Fungicidas','Sector Adherentes','Sector Bolsas','Sector Plastico','Sector Pintura');
    $return="";
	$cont=0;

	if($resultadoSegmento = $mysql->query($sqlSegmento))
    {

        if(mysqli_num_rows($resultadoSegmento)==0)
        {
            $respuesta = "<div class='error'>No hay usuarios BD vacia</div>";
        }

        else
        {

			$ini=0;
			$cantidadG=0;
			$costoG=0;
			$precioG=0;
			$subtotalgenG=0;
            while($filaSegmento = $resultadoSegmento->fetch_row())
			{
				$cont=0;
				$precio =0;
				$costo =0;
				$subtotalgen=0;
				
				
				
				$i=0;
				$sql = "SELECT p.nombre,i.preciocosto,p.idproductos,p.codigoproducto,p.descripcion,i.precioCosto,i.precioVenta,i.precioClienteEs,i.precioDistribuidor,i.cantidad,p.marca2,p.codigoproducto,i.idinventario,p.idproductos,p.tiporepuesto,(select ps.descripcion from presentacion ps where ps.idpresentacion=i.idpresentacion) FROM inventario i inner join productos p on p.idproductos=i.idproducto where i.cantidad>=0 and p.tiporepuesto='".$filaSegmento[0]."' and i.idpresentacion=(select ppp.idpresentacion from presentacion ppp where ppp.descripcion='Quintales' and ppp.estado=1)  $mas  order by p.codigoproducto";
    
				if($resultado = $mysql->query($sql))
				{

					if(mysqli_num_rows($resultado)<=0)
					{
						$respuesta = "<div class='error'>No hay usuarios BD vacia</div>";
					}

					else
					{
						$return.='<div class="deposito">';
						$return.='<center><h5>'.$tipo[$o+1].'</h5>';
						$return.='<table  class="depositosTabla">';
						$r=1;
						   $return.='<tr class="FilaInventarioT">'.
									'<th class="InventarioColumnaT">Correlativo</th>'.
									'<th class="InventarioColumnaT">Codigo</th>'.
									'<th class="InventarioColumnaTProd">Producto</th>'.
									'<th class="InventarioColumnaT">Marca</th>'.
									'<th class="InventarioColumnaT">Presentacion</th>'.
									'<th class="InventarioColumnaT">Cantidad</th>'.
									'<th class="InventarioColumnaT">Costo</th>'.
									'<th class="InventarioColumnaT">Subtotal</th>'.
									'</tr>';
							
							while($fila = $resultado->fetch_row())
							{
								
								if($fila["14"]==$filaSegmento[0])
									{
										
							$cont++;
							$precio+=$fila["9"];
							$costo+=$fila["5"];
							$precioG+=$fila["6"];
							$costoG+=$fila["5"];
							$cantidadG+=$fila["9"];
							$subtotalgen+=($fila["5"]*1)*($fila["9"]*1);
							$subtotalgenG+=($fila["5"]*1)*($fila["9"]*1);
									$return.='<tr class="FilaInventario">'.
                                '<td class="InventarioColumna">'.$cont.'</td>'.
                                '<td class="InventarioColumna">'.$fila["11"].'</td>'.
                                '<td class="InventarioColumna">'.($fila["0"]).'</td>'.
                                '<td class="InventarioColumna">'.($fila["10"]).'</td>'.
                                '<td class="InventarioColumna">'.($fila["15"]).'</td>'.
                                '<td class="InventarioColumna">'.($fila["9"]).'</td>'.
                                '<td class="InventarioColumna">'.toMoney($fila["5"]).'</td>'.
                                '<td class="InventarioColumna">'.toMoney(($fila["5"]*1)*($fila["9"]*1)).'</td>'.
                                
                                '</tr>';
									
										$i++;
									}

							}
							$return.='<tr class="FilaInventario">'.
                                
                                '<td class="InventarioColumna"></td>'.
                                '<td class="InventarioColumna"></td>'.
                                '<td class="InventarioColumna"></td>'.
                                '<td class="InventarioColumna"></td>'.
                                '<td class="InventarioColumna"></td>'.
                                '<td class="InventarioColumna"></td>'.
                                '<td class="InventarioColumna">Total=</td>'.
                                '<td class="InventarioColumna">'.toMoney(($subtotalgen).'').'</td>'.
                                
                                '</tr>';

							$return.='</table></center></div>';

							$resultado->free();//librerar variable


					
					}
				}
				else
				{
					$return.= $sql."<div class='error'>Error: no se ejecuto la consulta a BD</div>";

				}
				$i++;
				$o++;
			}
			$return.='<div class="deposito">';
				$return.='<table  class="depositosTabla">';
				$return.='<tr class="FilaInventarioT">'.
				'<th class="InventarioColumnaT"></th>'.
				'<th class="InventarioColumnaT"></th>'.
				'<th class="InventarioColumnaT"></th>'.
				'<th class="InventarioColumnaT"></th>'.
				'<th class="InventarioColumnaT"></th>'.
				'<th class="InventarioColumnaT"></th>'.
				'<th class="InventarioColumnaT"></th>'.
				'<th class="InventarioColumnaT">Total</th>'.
				'</tr>';
				$return.='<tr class="FilaInventario">'.
				
				'<td class="InventarioColumna"></td>'.
				'<td class="InventarioColumna"></td>'.
				'<td class="InventarioColumna"></td>'.
				'<td class="InventarioColumna"></td>'.
				'<td class="InventarioColumna"></td>'.
				'<td class="InventarioColumna"></td>'.
				'<td class="InventarioColumna"></td>'.
				'<td class="InventarioColumna">'.toMoney(($subtotalgenG).'').'</td>'.
				
				'</tr>';
				
				$return.='</table></center></div>';
			$resultadoSegmento->free();//librerar variable
		}
	}else
				{
					$respuesta = "<div class='error'>Error: no se ejecuto la consulta a BD</div>";

				}

    //cierro la conexion
    $mysql->close();
	echo ($return);
}


function impFragmentarEntrada($datos){
	
session_start();
if(isset($_SESSION['codigoBuscaProducto_SOFT']))
{
	if($_SESSION['codigoBuscaProducto_SOFT']!="")
	{
		$mas=" and p.codigoproducto='".$_SESSION['codigoBuscaProducto_SOFT']."' and i.cantidad<=i.minimo ";
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
	//creamos la pestaña
	
	
	$o=0;
	
	$i = 3;

	$ss = 0;

	   

$mysql = conexionMysql();
    $sqlSegmento = "select tiporepuesto from productos group by tiporepuesto order by tiporepuesto;";
    $tipo=array('','Sector Fertilizantes','Sector Herbicidas','Sector Insecticidas','Sector Veterinarios','Sector semillas','Sector Caceros','Sector Concentrados','Sector Equipo Agricola','Sector Foliares','Sector Fungicidas','Sector Adherentes','Sector Bolsas','Sector Plastico','Sector Pintura');
    $return="";
	$cont=0;

	if($resultadoSegmento = $mysql->query($sqlSegmento))
    {

        if(mysqli_num_rows($resultadoSegmento)==0)
        {
            $respuesta = "<div class='error'>No hay usuarios BD vacia</div>";
        }

        else
        {

			$ini=0;
			$cantidadG=0;
			$costoG=0;
			$precioG=0;
			$subtotalgenG=0;
            while($filaSegmento = $resultadoSegmento->fetch_row())
			{
				$cont=0;
				$precio =0;
				$costo =0;
				$subtotalgen=0;
				
				
				
				$i=0;
				$sql = "SELECT p.nombre,i.preciocosto,p.idproductos,p.codigoproducto,p.descripcion,i.precioCosto,i.precioVenta,i.precioClienteEs,i.precioDistribuidor,i.cantidad,p.marca2,p.codigoproducto,i.idinventario,p.idproductos,p.tiporepuesto,(select ps.descripcion from presentacion ps where ps.idpresentacion=i.idpresentacion) FROM inventarioFrag i inner join productos p on p.idproductos=i.idproducto where i.cantidad>=0 and p.tiporepuesto='".$filaSegmento[0]."' $mas  order by p.codigoproducto";
    
				if($resultado = $mysql->query($sql))
				{

					if(mysqli_num_rows($resultado)<=0)
					{
						$respuesta = "<div class='error'>No hay usuarios BD vacia</div>";
					}

					else
					{
						$return.='<div class="deposito">';
						$return.='<center><h5>'.$tipo[$o+1].'</h5>';
						$return.='<table  class="depositosTabla">';
						$r=1;
						   $return.='<tr class="FilaInventarioT">'.
									'<th class="InventarioColumnaT">Correlativo</th>'.
									'<th class="InventarioColumnaT">Codigo</th>'.
									'<th class="InventarioColumnaTProd">Producto</th>'.
									'<th class="InventarioColumnaT">Marca</th>'.
									'<th class="InventarioColumnaT">Presentacion</th>'.
									'<th class="InventarioColumnaT">Cantidad</th>'.
									'<th class="InventarioColumnaT">Costo</th>'.
									'<th class="InventarioColumnaT">Subtotal</th>'.
									'</tr>';
							
							while($fila = $resultado->fetch_row())
							{
								
								if($fila["14"]==$filaSegmento[0])
									{
										
							$cont++;
							$precio+=$fila["9"];
							$costo+=$fila["5"];
							$precioG+=$fila["6"];
							$costoG+=$fila["5"];
							$cantidadG+=$fila["9"];
							$subtotalgen+=($fila["5"]*1)*($fila["9"]*1);
							$subtotalgenG+=($fila["5"]*1)*($fila["9"]*1);
									$return.='<tr class="FilaInventario">'.
                                '<td class="InventarioColumna">'.$cont.'</td>'.
                                '<td class="InventarioColumna">'.$fila["11"].'</td>'.
                                '<td class="InventarioColumna">'.($fila["0"]).'</td>'.
                                '<td class="InventarioColumna">'.($fila["10"]).'</td>'.
                                '<td class="InventarioColumna">'.($fila["15"]).'</td>'.
                                '<td class="InventarioColumna">'.($fila["9"]).'</td>'.
                                '<td class="InventarioColumna">'.toMoney($fila["5"]).'</td>'.
                                '<td class="InventarioColumna">'.toMoney(($fila["5"]*1)*($fila["9"]*1)).'</td>'.
                                
                                '</tr>';
									
										$i++;
									}

							}
							$return.='<tr class="FilaInventario">'.
                                
                                '<td class="InventarioColumna"></td>'.
                                '<td class="InventarioColumna"></td>'.
                                '<td class="InventarioColumna"></td>'.
                                '<td class="InventarioColumna"></td>'.
                                '<td class="InventarioColumna"></td>'.
                                '<td class="InventarioColumna"></td>'.
                                '<td class="InventarioColumna">Total=</td>'.
                                '<td class="InventarioColumna">'.toMoney(($subtotalgen).'').'</td>'.
                                
                                '</tr>';

							$return.='</table></center></div>';

							$resultado->free();//librerar variable


					
					}
				}
				else
				{
					$return.= $sql."<div class='error'>Error: no se ejecuto la consulta a BD</div>";

				}
				$i++;
				$o++;
			}
			$return.='<div class="deposito">';
				$return.='<table  class="depositosTabla">';
				$return.='<tr class="FilaInventarioT">'.
				'<th class="InventarioColumnaT"></th>'.
				'<th class="InventarioColumnaT"></th>'.
				'<th class="InventarioColumnaT"></th>'.
				'<th class="InventarioColumnaT"></th>'.
				'<th class="InventarioColumnaT"></th>'.
				'<th class="InventarioColumnaT"></th>'.
				'<th class="InventarioColumnaT"></th>'.
				'<th class="InventarioColumnaT">Total</th>'.
				'</tr>';
				$return.='<tr class="FilaInventario">'.
				
				'<td class="InventarioColumna"></td>'.
				'<td class="InventarioColumna"></td>'.
				'<td class="InventarioColumna"></td>'.
				'<td class="InventarioColumna"></td>'.
				'<td class="InventarioColumna"></td>'.
				'<td class="InventarioColumna"></td>'.
				'<td class="InventarioColumna"></td>'.
				'<td class="InventarioColumna">'.toMoney(($subtotalgenG).'').'</td>'.
				
				'</tr>';
				
				$return.='</table></center></div>';
			$resultadoSegmento->free();//librerar variable
		}
	}else
				{
					$respuesta = "<div class='error'>Error: no se ejecuto la consulta a BD</div>";

				}

    //cierro la conexion
    $mysql->close();
	echo ($return);
}

?>