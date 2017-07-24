<?php


if($_POST)
{
    require('../configCore.php');
    
    $transaccion = $_POST['trasDato'];
    
  
    if($transaccion == 1)
    {
        $datos[0] = $_POST['prod'];
         
        buscarEmpleados($datos);
        
        
    
    }
//------------ gestion --------------/    

    // insertar
    else if($transaccion == 2)
    {
        
          

        
         $datos[0] = $_POST['prod'];
       

        
        seleccionaEmpleado($datos);
        
    
    }
    else if($transaccion == 3)
    {
        
          

        
         $datos[0] = $_POST['id'];
		 $datos[1] = $_POST['fecha'];
		 $datos[2] = $_POST['descripcion'];
		 $datos[3] = $_POST['monto'];
       

        
        ingresaSueldo($datos);
        
    
    }
	 else if($transaccion == 4)
    {
        
          

        
         $datos[0] = $_POST['id'];
		 $datos[1] = $_POST['contra'];
       

        
        anularSueldo($datos);
        
    
    }
	else if($transaccion == 5)
    {
        $datos[0] = $_POST['prod'];
         
        buscarUsuarios($datos);
        
        
    
    }
//------------ gestion --------------/    

    // insertar
    else if($transaccion == 6)
    {
        
          

        
         $datos[0] = $_POST['prod'];
		 $datos[1] = $_POST['fechaini'];
		 $datos[2] = $_POST['fechafin'];
       

        
        seleccionaUsuario($datos);
        
    
    }
    else if($transaccion == 7)
    {
        
          

        
         $datos[0] = $_POST['id'];
		 $datos[1] = $_POST['fechaIni'];
		 $datos[2] = $_POST['fechaFin'];
		 $datos[3] = $_POST['monto'];
		 $datos[4] = $_POST['porcent'];
		 $datos[5] = $_POST['PagarC'];
       

        
        ingresaComision($datos);
        
    
    }
	 else if($transaccion == 8)
    {
        
          

        
         $datos[0] = $_POST['id'];
		 $datos[1] = $_POST['contra'];
       

        
        anularComision($datos);
        
    
    }
	else if($transaccion == 9)
    {
        
 
		 $datos[0] = $_POST['fecha'];
		 $datos[1] = $_POST['descripcion'];
		 $datos[2] = $_POST['monto'];
       

        
        ingresarGastos($datos);
        
    
    }
	 else if($transaccion == 10)
    {
        
          

        
         $datos[0] = $_POST['id'];
		 $datos[1] = $_POST['contra'];
       

        
        anularGastos($datos);
        
    
    }
     else if($transaccion == 11)
    {
        
          

        
         $datos[0] = $_POST['tipo'];
		 $datos[1] = $_POST['fechaini'];
         $datos[2] = $_POST['fechafin'];

          mostrarSueldoFlujo($datos);
        
    
    }
    else if($transaccion == 12)
    {
        
          

        
         $datos[0] = $_POST['tipo'];
		 $datos[1] = $_POST['fechaini'];
         $datos[2] = $_POST['fechafin'];

          mostrarGastoFlujo($datos);
        
    
    }
	
//----------- fin gestion ----------/    
    
}

else
{
    
    //regrsar a index
    echo'regresar al index';
}


?>