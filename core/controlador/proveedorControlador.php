<?php


if($_POST)
{
    require('../configCore.php');
    
    $transaccion = $_POST['trasDato'];
    
    
//-------------- gestion -----------/    
    if($transaccion == 1)
    {
        $datos[0]=$_POST['nombre'];
		$datos[1]=$_POST['direccion'];
		$datos[2]=$_POST['nit'];
		$datos[3]=$_POST['telefono'];
		$datos[4]=$_POST['cuenta'];
        
        insertarProveedor($datos);
        
        
    
    }
	else
	 if($transaccion == 2)
    {
        $datos[0]=$_POST['id'];
		
        
        editarProveedor($datos);
        
        
    
    }
	else
	 if($transaccion == 3)
    {
        $datos[0]=$_POST['nombre'];
		$datos[1]=$_POST['direccion'];
		$datos[2]=$_POST['nit'];
		$datos[3]=$_POST['telefono'];
		$datos[4]=$_POST['cuenta'];
		$datos[5]=$_POST['codigo'];
        
        actualizarProveedor($datos);
        
        
    
    }
//----------- fin gestion ----------/    
    
}

else
{
    
    //regrsar a index
    echo'regresar al index';
}


?>