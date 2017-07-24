<?php


if($_POST)
{
    require('../configCore.php');
    
    $transaccion = $_POST['trasDato'];
    
  
    if($transaccion == 1)
    {
        $datos[0] = $_POST['fechaini'];
		 $datos[1] = $_POST['fechafin'];
       

        
        graficaVentasPie($datos);
        
        
    
    }
//------------ gestion --------------/    

    // insertar
    else if($transaccion == 2)
    {
        
          

        $datos[0] = $_POST['fechaini'];
		 $datos[1] = $_POST['fechafin'];
		  $datos[2] = $_POST['mas'];
       

        
        buscarBestFive($datos);
         
        
    
    }
    else if($transaccion ==3)
    {
        
          

        $datos[0] = $_POST['fechaini'];
		 $datos[1] = $_POST['fechafin'];
		  $datos[2] = $_POST['mas'];
       

        
        buscarBestFiveQ($datos);
         
        
    
    }
	 else if($transaccion == 4)
    {
        
          

        
         $datos[0] = $_POST['fechaini'];
		 $datos[1] = $_POST['fechafin'];


        
        graficaVendedoresBarra($datos);
        
    
    }
	else if($transaccion == 5)
    {
        
          

        
         $datos[0] = $_POST['fechaini'];
		 $datos[1] = $_POST['fechafin'];


        
        graficaVendedorPie($datos);
        
    
    }
	
//------------ gestion --------------/    

    // insertar
    else if($transaccion == 6)
    {

		 $datos[0] = $_POST['fechaini'];
		 $datos[1] = $_POST['fechafin'];
       

        
        graficaVentasBarra($datos);
        
    
    }
    else if($transaccion == 7)
    {
        
          

        
         $datos[0] = $_POST['fechaini'];
		 $datos[1] = $_POST['fechafin'];


        
        costosTotales($datos);
        
    
    }
	else if($transaccion == 8)
    {
        
          

        
         $datos[0] = $_POST['fechaini'];
		 $datos[1] = $_POST['fechafin'];


        
        ingresosTotales($datos);
        
    
    }
	else if($transaccion == 9)
    {
        
          

        
         $datos[0] = $_POST['fechaini'];
		 $datos[1] = $_POST['fechafin'];


        
        graficaFlujoPie($datos);
        
    
    }
	else if($transaccion == 10)
    {
        
          

        
         $datos[0] = $_POST['fechaini'];
		 $datos[1] = $_POST['fechafin'];


        
        graficaClientesBarra($datos);
        
    
    }
	else if($transaccion == 11)
    {
        
          

        
         $datos[0] = $_POST['fechaini'];
		 $datos[1] = $_POST['fechafin'];


        
        graficaClientesPie($datos);
        
    
    }
	
//----------- fin gestion ----------/    
    
}

else
{
    
    //regrsar a index
    echo'regresar al index';
}


?>