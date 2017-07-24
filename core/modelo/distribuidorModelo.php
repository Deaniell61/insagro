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


?>