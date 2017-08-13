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
    else if($transaccion == 14)
    {

        $datos[0] = $_POST['id'];
        $datos[1] = $_POST['tipo'];
		        
        datosCheque($datos);

    }
    else if($transaccion == 15)
    {

        $datos[0] = $_POST['id'];
        $datos[1] = $_POST['tipo'];
		
		
		        
        datosCuentasPagar($datos);

    }
    else if($transaccion == 16)
    {

        $datos[0] = $_POST['id'];
        $datos[1] = $_POST['tipo'];
		
		
		        
        datosImpPorProveedor($datos);

    }
    else if($transaccion == 17)
    {

        $datos[0] = $_POST['id'];
        $datos[1] = $_POST['tipo'];
		
		
		        
        datosImpPorPagarVencidas($datos);

    }
    
//----------- fin gestion ----------/    
    
}

else
{
    
    //regrsar a index
    echo'regresar al index';
}


?>