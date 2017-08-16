<?php


if($_POST)
{
    require('../configCore.php');
    
    $transaccion = $_POST['trasDato'];
    
  
    if($transaccion == 1)
    {

        $datos[0]=$nombre = $_POST['tipo'];
		
		
		        
        mostrarConsignacion($datos);

    }
    else if($transaccion == 2)
    {
        
          

        
        $datos[0] = $_POST['id'];
       

        
        editarConsignacion($datos);
        
    
    }
    // eliminar
    else if($transaccion == 3)
    {
        
        $datos[0] = $_POST['id'];
       

        
        verConsignacion($datos);
        
        
    }else if($transaccion == 4)
    {
        
        $datos[0] = $_POST['id'];
       

        
        mostrarMovimientosConsignacion($datos);
        
        
    }else if($transaccion == 5)
    {
        
        $datos[0] = $_POST['id'];
		$datos[1] = $_POST['abono'];
		$datos[2] = $_POST['fecha'];
		$datos[3] = $_POST['saldo'];
		$datos[4] = $_POST['descripcion'];
		$datos[5] = $_POST['credito'];
		
		        
        abonarConsignacion($datos);
        
        
    }
    
//----------- fin gestion ----------/    
    
}

else
{
    
    //regrsar a index
    echo'regresar al index';
}


?>