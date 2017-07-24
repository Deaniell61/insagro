<?php


function insertarCliente($datos)
{
    
    

    $sql = "INSERT INTO cliente (nombre, Direccion, Telefono, Nit, apellido,estado) VALUES ('".$datos[0]."','".$datos[1]."','".$datos[3]."','".$datos[2]."','".$datos[4]."',1)";
    
    $mysql = conexionMysql(); 
    echo $sql;
    if($resultado = $mysql->query($sql))
    {
        $respuesta = "<div> Exito </div>";
    }
    else
    { 
        $respuesta = "<div>Error en en la insercion </div>"; 
        echo 1;
    }
    
    
    $mysql->close();
    
    return printf($respuesta);
    
    
}

function  editarCliente($datos)
{
    

    $mysql = conexionMysql();
    $form="";
    $sql = "SELECT u.nombre,u.apellido,u.telefono,u.direccion,u.nit,u.idcliente FROM cliente u WHERE estado=1 and u.idcliente='".$datos[0]."'";
    
    if($resultado = $mysql->query($sql))
    {
      
    $fila = $resultado->fetch_row();    
        
    
    $form .="<script>";
    $form .=" \$('#nombreP').val('".$fila[0]."');";
	$form .=" \$('#apellidoP').val('".$fila[1]."');\$('#apellidoP').focus();";
	$form .=" \$('#direccionP').val('".$fila[3]."');\$('#direccionP').focus();";
	$form .=" \$('#telefonoP').val('".$fila[2]."');\$('#telefonoP').focus();";
	$form .=" \$('#nitP').val('".$fila[4]."');\$('#nombreP').focus();";
	$form .=" \$('#codigoP').val('".$fila[5]."');\$('#nitP').focus();\$('#nombreP').focus();";
	$form .=" ";
	
    $form .="</script>";
        
    $resultado->free();    
    
    }
    else
    {   
    
    $form = "<div>$sql</div>";
    
    }
    
    
    $mysql->close();
    
    return printf($form);
    
}

function actualizarCliente($datos)
{
    
    

    $sql = "update cliente set nombre='".$datos[0]."', apellido='".$datos[4]."', direccion='".$datos[1]."',telefono='".$datos[3]."',nit='".$datos[2]."' where idcliente=".$datos[5]."";
    
    $mysql = conexionMysql(); 
    $mysql->query("BEGIN");
    if($resultado = $mysql->query($sql))
    {
        $respuesta = "<div> Exito </div>";
			$mysql->query("COMMIT");	
    }
    else
    { 
	$mysql->query("ROLLBACK");
        $respuesta = "<div>Error en en la insercion </div>"; 
        echo 1;
    }
    
    
    $mysql->close();
    
    return printf($respuesta);
    
    
}
?>