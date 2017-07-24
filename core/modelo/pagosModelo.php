<?php

function  buscarEmpleados($dato)
{
    

    $mysql = conexionMysql();
    $form="";
    $sql = "SELECT p.nombre,p.apellido,p.sueldo,p.idempleados from empleados p WHERE (p.nombre like '%".$dato[0]."%' or p.apellido like '%".$dato[0]."%') and p.estado=1";
 
    if($resultado = $mysql->query($sql))
    {
      if($resultado->num_rows>0 && $dato[0]!="")
	  {
		  	
		while($fila = $resultado->fetch_row())
		{  
			$form .="<div class='borde' onClick=\"seleccionaEmpleado('".$fila[3]."');\"><div ><span>Nombre: </span><span class='enlinea' >".$fila[0]." ".$fila[1]."</span></div></div><br>";
		}
		$resultado->free();    
	  }
	  else
	  {
		$form .="<script>";
			$form .="document.getElementById('agregarProd').hidden=false;";
			$form .="</script>";
	  }
    
    }
    else
    {   
    
    $form = "<div>$sql<script>console.log('".$dato[0]."');</script></div>";
    
    }
    
    
    $mysql->close();
    
    printf($form);
    
}

function  seleccionaEmpleado($dato)
{
    

    $mysql = conexionMysql();
    $form="";
    $sql = "SELECT e.idempleados,e.nombre,e.apellido,e.sueldo FROM empleados e  WHERE e.idempleados='".$dato[0]."' ";
 
    if($resultado = $mysql->query($sql))
    {
      if($resultado->num_rows>0)
	  {
		  if($fila = $resultado->fetch_row())
		  {setlocale (LC_ALL, "es_GT");
		  	$form .="<script>";
			$form .="document.getElementById('codigo').value='".$fila[0]."';";
			$form .="document.getElementById('empleados').value='".$fila[1]." ".$fila[2]."';document.getElementById('empleados').focus();";
			$form .="document.getElementById('descripcion').value='Pago de sueldo del mes de ".strftime("%B")."';document.getElementById('descripcion').focus();";
			$form .="document.getElementById('monto').value='".$fila[3]."';document.getElementById('monto').focus();";
			
			
		
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


function ingresaSueldo($datos)
{
	$mysql = conexionMysql();
    $form="";
	
		$mysql->query("BEGIN");
    $sql = "insert into sueldos(fecha,descripcion,monto,idempleado,estado) values('".date('Y-m-d  H:i:s')."','".$datos[2]."','".$datos[3]."','".$datos[0]."',1)";
//echo $sql;
    if($mysql->query($sql))
    {
		
			
			$mysql->query("COMMIT");
				
			    
		$form = "<script>location.reload();</script>";
    
    }
    else
    {   
    	$mysql->query("ROLLBACK");
    $form = "<div><script>location.reload();console.log('".$datos[0]."');</script></div>";
    
    }
    
    
    $mysql->close();
    
    return printf($form);
}
function anularSueldo($datos)
{
	$mysql = conexionMysql();
    $form="";
	$mysql->query("BEGIN");
    session_start();
	
	if($_SESSION['SOFT_PASS']==$datos[1])
	{
	$sql = "update sueldos set estado='0' where idsueldos='".$datos[0]."'";
//echo $sql;
    if($mysql->query($sql))
    {
		
			$mysql->query("COMMIT");
		
			    
		$form = "<script>alert('El pago del sueldo fue anulado');setTimeout(window.location.reload(), 3000);</script>";
    
    }
    else
    {   
    	$mysql->query("ROLLBACK");
    	$form = "<div><script>location.reload();console.log('".$datos[0]."');</script></div>";
    
    }
    
	}
	else
	{
		echo "Contraseña Incorrecta";
	}
    $mysql->close();
    
    return printf($form);
}


function  buscarUsuarios($dato)
{
    

    $mysql = conexionMysql();
    $form="";
    $sql = "SELECT p.user,p.idusuarios from usuarios p WHERE (p.user like '%".$dato[0]."%' or p.email like '%".$dato[0]."%') and p.estado=1 and p.user!='admin'";
 
    if($resultado = $mysql->query($sql))
    {
      if($resultado->num_rows>0 && $dato[0]!="")
	  {
		  	
		while($fila = $resultado->fetch_row())
		{  
			$form .="<div class='borde' onClick=\"seleccionaUsuarios('".$fila[1]."');\"><div ><span>Nombre: </span><span class='enlinea' >".$fila[0]."</span></div></div><br>";
		}
		$resultado->free();    
	  }
	  else
	  {
		$form .="<script>";
			$form .="document.getElementById('agregarProd').hidden=false;";
			$form .="</script>";
	  }
    
    }
    else
    {   
    
    $form = "<div>$sql<script>console.log('".$dato[0]."');</script></div>";
    
    }
    
    
    $mysql->close();
    
    printf($form);
    
}

function  seleccionaUsuario($dato)
{
    

    $mysql = conexionMysql();
    $form="";
    $sql = "SELECT u.user,u.idusuarios,sum(v.total) FROM usuarios u inner join ventas v on v.idusuario=u.idusuarios WHERE u.idusuarios='".$dato[0]."' and (v.fecha<'".$dato[2]."' and v.fecha>'".$dato[1]."') ";
 
    if($resultado = $mysql->query($sql))
    {
      if($resultado->num_rows>0)
	  {
		  if($fila = $resultado->fetch_row())
		  {setlocale (LC_ALL, "es_GT");
		  	$form .="<script>";
			$form .="document.getElementById('codigo').value='".$fila[1]."';";
			$form .="document.getElementById('vendedores').value='".$fila[0]."';document.getElementById('vendedores').focus();";
			$form .="document.getElementById('Monto').value='".$fila[2]."';document.getElementById('Monto').focus();";
			$form .="calculaComi(document.getElementById('porcentaje').value);";
			$form .="document.getElementById('Monto').focus();";
			
		
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


function ingresaComision($datos)
{
	$mysql = conexionMysql();
    $form="";
	
		$mysql->query("BEGIN");
    $sql = "insert into comisiones(fechaIni,fechaFin,monto,porcentaje,total,idusuarios,estado) values('".$datos[1]." 00:00:00','".$datos[2]." 23:59:29','".$datos[3]."','".$datos[4]."','".$datos[5]."','".$datos[0]."',1)";
//echo $sql;
    if($mysql->query($sql))
    {
		
			
			$mysql->query("COMMIT");
				
			    
		$form = "<script>setTimeout(window.location.reload(), 3000);</script>";
    
    }
    else
    {   
    	$mysql->query("ROLLBACK");
    $form = "<div>$sql<script>console.log('".$datos[0]."');</script></div>";
    
    }
    
    
    $mysql->close();
    
    return printf($form);
}
function anularComision($datos)
{
	$mysql = conexionMysql();
    $form="";
	$mysql->query("BEGIN");
    session_start();
	
	if($_SESSION['SOFT_PASS']==$datos[1])
	{
	$sql = "update comisiones set estado='0' where idcomisiones='".$datos[0]."'";
//echo $sql;
    if($mysql->query($sql))
    {
		
			$mysql->query("COMMIT");
		
			    
		$form = "<script>alert('El pago de comision fue anulado');setTimeout(window.location.reload(), 3000);</script>";
    
    }
    else
    {   
    	$mysql->query("ROLLBACK");
    	$form = "<div><script>location.reload();console.log('".$datos[0]."');</script></div>";
    
    }
    
	}
	else
	{
		echo "Contraseña Incorrecta";
	}
    $mysql->close();
    
    return printf($form);
}

function ingresarGastos($datos)
{
	$mysql = conexionMysql();
    $form="";
	if($datos[1]=="")
	{
		$datos[1]="Gastos Varios";
	}
	
		$mysql->query("BEGIN");
    $sql = "insert into gastos(fecha,descripcion,monto,estado) values('".date('Y-m-d H:i:s')."','".$datos[1]."','".$datos[2]."',1)";
//echo $sql;
    if($mysql->query($sql))
    {
		
			
			$mysql->query("COMMIT");
				
			    
		$form = "<script>location.reload();</script>";
    
    }
    else
    {   
    	$mysql->query("ROLLBACK");
    $form = "<div><script>location.reload();console.log('".$datos[0]."');</script></div>";
    
    }
    
    
    $mysql->close();
    
    return printf($form);
}
function anularGastos($datos)
{
	$mysql = conexionMysql();
    $form="";
	$mysql->query("BEGIN");
    
	
	
	{
	$sql = "update gastos set estado='0' where idgastos='".$datos[0]."'";
//echo $sql;
    if($mysql->query($sql))
    {
		
			$mysql->query("COMMIT");
		
			    
		$form = "<script>alert('El Gasto fue anulado');setTimeout(window.location.reload(), 3000);</script>";
    
    }
    else
    {   
    	$mysql->query("ROLLBACK");
    	$form = "<div><script>location.reload();console.log('".$datos[0]."');</script></div>";
    
    }
    
	}
	
    $mysql->close();
    
    return printf($form);
}

?>