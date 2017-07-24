<?php


function insertarProveedor($datos)
{
    
    

    $sql = "INSERT INTO proveedor (NombreEmpresa, Direccion, Telefono, Nit, CuentaDepoito,estado) VALUES ('".$datos[0]."','".$datos[1]."','".$datos[3]."','".$datos[2]."','".$datos[4]."',1)";
    
    $mysql = conexionMysql(); 
    
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


function  editarProveedor($datos)
{
    

    $mysql = conexionMysql();
    $form="";
    $sql = "SELECT u.nombreempresa,u.telefono,u.direccion,u.nit,u.cuentadepoito,u.idproveedor FROM proveedor u WHERE estado=1 and u.idproveedor='".$datos[0]."'";
    
    if($resultado = $mysql->query($sql))
    {
      
    $fila = $resultado->fetch_row();    
        
    
    $form .="<script>";
    $form .=" \$('#nombreP').val('".$fila[0]."');";
	$form .=" \$('#cuentaDepP').val('".$fila[4]."');\$('#apellidoP').focus();";
	$form .=" \$('#direccionP').val('".$fila[2]."');\$('#direccionP').focus();";
	$form .=" \$('#telefonoP').val('".$fila[1]."');\$('#telefonoP').focus();";
	$form .=" \$('#nitP').val('".$fila[3]."');\$('#nombreP').focus();";
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

function actualizarProveedor($datos)
{
    
    

    $sql = "update proveedor set nombreempresa='".$datos[0]."', cuentadepoito='".$datos[4]."', direccion='".$datos[1]."',telefono='".$datos[3]."',nit='".$datos[2]."' where idproveedor=".$datos[5]."";
    
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