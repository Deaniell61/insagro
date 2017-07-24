<?php


function insertarProducto($datos)
{
    
    
    
    
    $mysql = conexionMysql(); 
    if($datos[9]==""){
        if(ingresaPresentacion($datos[8],$mysql)){
            $datos[9]=getPresentacion($datos[8],$mysql);
        }
    }
    echo $sql = "INSERT INTO productos (nombre, descripcion, codigoProducto,tiporepuesto,marca2, estado, idpresentacion) VALUES ('".$datos[1]."','".$datos[4]."','".$datos[2]."','".$datos[5]."','".$datos[3]."',1,'".$datos[9]."')";
    
    //$mysql->query("BEGIN");
    if($resultado = $mysql->query($sql))
    {
		echo $sql = "INSERT INTO inventario (cantidad,precioCosto,precioVenta,precioClienteEs,precioDistribuidor, idproducto,medida,idpresentacion) VALUES (0,0,0,0,0,(select idproductos from productos order by idproductos desc limit 1),'".$datos[7]."','".$datos[9]."')";
		
		if($resultado = $mysql->query($sql))
		{
			$id=$mysql->query("select idproductos from productos order by idproductos desc limit 1");
			$fila=$id->fetch_row();
			//$mysql->query("COMMIT");
        	$respuesta = "<script>buscaProducto(document.getElementById('nombreC'));";
            if(!isset($datos[10])){
            $respuesta.= "seleccionaProducto('".$fila[0]."');document.getElementById('retoCompra').style.display='block';</script>";		
            }else{
            $respuesta.= "location.reload();</script>";    
            }
			
            if(!isset($datos[6]))
			{
				$respuesta = "<script>limpiarProducto();buscaProducto(document.getElementById('codigo'));</script>";		
			}
		}else{
           // $mysql->query("ROLLBACK");
        }
    }
    else
    { 
        //$mysql->query("ROLLBACK");http://app.insagromazate.com/Modulo/?Fragmentar
        $respuesta = "<div>Error en en la insercion $sql </div>"; 
        //echo 1;
    }
    
    
    $mysql->close();
    
    return printf($respuesta);
    
    
}

function cambiarTipoProducto($datos)
{
	$mysql = conexionMysql();
    $form="";
	
		$mysql->query("BEGIN");
    $sql = "update productos set tipoRepuesto='".$datos[0]."' where idproductos='".$datos[1]."'";
//echo $sql;
    if($mysql->query($sql))
    {
		
		$mysql->query("COMMIT");
			    
		
    
    }
    else
    {   
    	$mysql->query("ROLLBACK");
    $form = "<div><script>console.log('".$datos[0]."');</script></div>";
    
    }
    
    
    $mysql->close();
    
    return printf($form);
}


function ingresaPresentacion($descripcion,$mysql){
    
    $sql = "INSERT INTO presentacion(descripcion, estado) VALUES ('".$descripcion."',1)";
    
    return $mysql->query($sql);
}
function getPresentacion($descripcion,$mysql){
    $sql = "select idpresentacion from presentacion where descripcion='".$descripcion."' limit 1;";
    
    if($resultado = $mysql->query($sql))
    {
        $fila = $resultado->fetch_row();
        return $fila[0];
    }
}

?>