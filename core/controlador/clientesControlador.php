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
		$datos[4]=$_POST['apellido'];
        
        insertarCliente($datos);
        
        
    
    }
	else
	if($transaccion == 2)
    {
        $datos[0]=$_POST['id'];
		        
        editarCliente($datos);
        
        
    
    }
	else
	if($transaccion == 3)
    {
        $datos[0]=$_POST['nombre'];
		$datos[1]=$_POST['direccion'];
		$datos[2]=$_POST['nit'];
		$datos[3]=$_POST['telefono'];
		$datos[4]=$_POST['apellido'];
		$datos[5]=$_POST['codigo'];
        
        actualizarCliente($datos);
        
        
    
    }
    
//----------- fin gestion ----------/    
    
}

else
{
    
    //regrsar a index
    echo'regresar al index';
}


?>