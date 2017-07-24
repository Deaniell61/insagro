<?php


if($_POST)
{
    require('../configCore.php');
    
    $transaccion = $_POST['trasDato'];
    
  
   if($transaccion == 1)
    {

        $datos[0]=$nombre = $_POST['tipo'];
		
		
		        
        mostrarCaja($datos);

    } else if($transaccion == 2)
    {

        $datos[0]=$nombre = $_POST['tipo'];
		
		
		        
        mostrarCorteCaja($datos);

    } else if($transaccion == 3)
    {

        $datos[0] = $_POST['tipo'];

        $datos[1] = $_POST['fechaI'];
        $datos[2] = $_POST['fechaF'];
        $datos[3] = $_POST['total'];
        $datos[4] = $_POST['descripcion'];
        $datos[5] = $_POST['saldoAnt'];		
		        
        ingresarCorteCaja($datos);

    } else if($transaccion == 4)
    {

        $datos[0] = $_POST['id'];
	        
        editarCaja($datos);

    }else if($transaccion == 5)
    {

        $datos[0] = $_POST['id'];
        $datos[1] = $_POST['fecha'];
	        
        mostrarDepositos($datos);

    }else if($transaccion == 6)
    {

        $datos[0] = $_POST['id'];
        $datos[1] = $_POST['fechaAct'];
        $datos[2] = $_POST['comprobante'];
        $datos[3] = $_POST['nocuenta'];
        $datos[4] = $_POST['banco'];
        $datos[5] = $_POST['monto'];
	        
        ingresoDeposito($datos);

    }else if($transaccion == 7)
    {

        $datos[0] = $_POST['id'];
        $datos[1] = $_POST['tipo'];
        $datos[2] = $_POST['fechaI'];
        $datos[3] = $_POST['fechaF'];
		
		
		        
        datosImpresionCaja($datos);

    }
    else if($transaccion == 8)
    {

        $datos[0] = $_POST['id'];
        $datos[1] = $_POST['caja'];
		
		
		        
        eliminaCaja($datos);

    }
    
//----------- fin gestion ----------/    
    
}

else
{
    
    //regrsar a index
    echo'regresar al index';
}


?>