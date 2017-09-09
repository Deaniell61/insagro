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
        
        
    }else if($transaccion == 6)
    {
        
        $datos[0] = $_POST['id'];
		$datos[1] = $_POST['abono'];
		$datos[2] = $_POST['fecha'];
		$datos[3] = $_POST['saldo'];
		$datos[4] = $_POST['descripcion'];
		$datos[5] = $_POST['credito'];
		$datos[6] = $_POST['id2'];
		$datos[7] = $_POST['pres'];
		
		        
        abonarConsignacionInv($datos);
        
        
    }
    else if($transaccion == 7)
    {
        
        $datos[0] = $_POST['id'];
		$datos[1] = $_POST['abono'];
		$datos[2] = $_POST['fecha'];
		$datos[3] = $_POST['saldo'];
		$datos[4] = $_POST['descripcion'];
		$datos[5] = $_POST['credito'];
		$datos[6] = $_POST['id2'];
		$datos[7] = $_POST['pres'];
		
		        
        abonarConsignacionInvEntr($datos);
        
        
    }else if($transaccion == 8)
    {

        $datos[0]=$nombre = $_POST['tipo'];
		
		
		        
        mostrarConsignacionxCobrar($datos);

    }
    else if($transaccion == 9)
    {
        
          

        
        $datos[0] = $_POST['id'];
       

        
        editarConsignacionxCobrar($datos);
        
    
    }else if($transaccion == 10)
    {
        
        $datos[0] = $_POST['id'];
		$datos[1] = $_POST['abono'];
		$datos[2] = $_POST['fecha'];
		$datos[3] = $_POST['saldo'];
		$datos[4] = $_POST['descripcion'];
		$datos[5] = $_POST['credito'];
		
		        
        abonarConsignacionxCob($datos);
        
        
    }
    else if($transaccion == 11)
    {
        
        $datos[0] = $_POST['id'];
       

        
        mostrarMovimientosConsignacionxCobrar($datos);
        
        
    }
    else if($transaccion == 12)
    {
        
        $datos[0] = $_POST['id'];
        $datos[1] = $_POST['tipo'];
        

        
        datosImpCongnacion($datos);
        
        
    }
    else if($transaccion == 13)
    {
        
        $datos[0] = $_POST['id'];
        $datos[1] = $_POST['tipo'];
        

        
        datosImpCongnacionxCob($datos);
        
        
    }
    else if($transaccion == 14)
    {
        
        $datos[0] = $_POST['id'];
        $datos[1] = $_POST['tipo'];
        

        
        datosImpInvCongnacion($datos);
        
        
    }
    else if($transaccion == 15)
    {
        
        $datos[0] = $_POST['id'];
        $datos[1] = $_POST['tipo'];
        

        
        datosImpInvCongnacionxCob($datos);
        
        
    }
    else if($transaccion == 16)
    {
        
        $datos[0] = $_POST['id'];
        $datos[1] = $_POST['tipo'];
        

        
        datosImpInvFragmentar($datos);
        
        
    }
    else if($transaccion == 17)
    {
        
        $datos[0] = $_POST['id'];
        $datos[1] = $_POST['tipo'];
        

        
        datosImpInvFragmentarxCob($datos);
        
        
    }
    
//----------- fin gestion ----------/    
    
}

else
{
    
    //regrsar a index
    echo'regresar al index';
}


?>