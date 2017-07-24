<?php


if($_POST)
{
    require('../configCore.php');
    
    $transaccion = $_POST['trasDato'];
    
  
    if($transaccion == 1)
    {
        $datos['0']  = $_POST['id'];
		$datos['1']  = $_POST['plazo'];
		$datos['2']  = $_POST['tipo'];
        
        ingresoCuentaCobrar($datos);
        
        
    
    }
//------------ gestion --------------/    

    // insertar
    else if($transaccion == 2)
    {
        
          

        
        $datos[0] = $_POST['id'];
       

        
        editarCuentaC($datos);
        
    
    }
    // eliminar
    else if($transaccion == 3)
    {
        
        $datos[0] = $_POST['id'];
       

        
        verCuentaC($datos);
        
        
    }
    
    //editar
    else if($transaccion == 4)
    {
        
        
        
       $id = $_POST['id'];

        
        mostrarMovimientosCuentasC($id);
        
    }
    
    else if($transaccion == 5)
    {

		$datos[0] = $_POST['id'];
		$datos[1] = $_POST['abono'];
		$datos[2] = $_POST['fecha'];
		$datos[3] = $_POST['saldo'];
		$datos[4] = $_POST['descripcion'];
		$datos[5] = $_POST['credito'];
		
		        
        abonarCuentaC($datos);

    }
	else if($transaccion == 6)
    {
        
          

        
        $datos[0] = $_POST['tipo'];
		$datos[1] = $_POST['fechaini'];
		$datos[2] = $_POST['fechafin'];
		mostrarMovimientosCuentasCFlujo($datos);
		
		        
        
        
    
    }
    // eliminar
    else if($transaccion == 7)
    {
        
        $datos[0]=$prod = $_POST['prod'];
		buscarPrecioProducto($datos);
        
        
    }
    
    //editar
    else if($transaccion == 8)
    {
        
        $dato[0] = $_POST['id'];
        
        buscarCompra($dato);
        
    }
    
    else if($transaccion == 9)
    {

        $datos[0]=$nombre = $_POST['tipo'];
		$datos[1]=$puesto = $_POST['id'];
		
		        
        cambiarTipoCompra($datos);

    }
	else if($transaccion == 10)
    {

		$datos[0]=$puesto = $_POST['id'];
		
		        
        anularCompra($datos);

    }
	else if($transaccion == 11)
    {

		$datos[0]=$puesto = $_POST['id'];
		
		        
        buscarMarca($datos);

    }
	else if($transaccion == 12)
    {

        $datos[0]=$nombre = $_POST['tipo'];
		$datos[1]=$puesto = $_POST['id'];
		
		        
        agregarFactura($datos);

    }
	else if($transaccion == 13)
    {

        $datos[0]=$nombre = $_POST['tipo'];
		
		
		        
        mostrarCuentasC($datos);

    }
    else if($transaccion == 14)
    {

        $datos[0] = $_POST['id'];
        $datos[1] = $_POST['tipo'];
		
		
		        
        datosReciboCobrar($datos);

    }
    else if($transaccion == 15)
    {

        $datos[0] = $_POST['id'];
        $datos[1] = $_POST['tipo'];
		
		
		        
        datosCuentasCobrar($datos);

    }
    else if($transaccion == 16)
    {

        $datos[0] = $_POST['id'];
        $datos[1] = $_POST['tipo'];
		
		
		        
        datosImpPorCliente($datos);

    }
    else if($transaccion == 17)
    {

        $datos[0] = $_POST['id'];
        $datos[1] = $_POST['tipo'];
		
		
		        
        datosImpPorCobrarVencidas($datos);

    }
    else if($transaccion == 18)
    {
        
        $datos[0] = $_POST['id'];
        $datos[1] = $_POST['abono'];
        $datos[2] = $_POST['idC'];
       

        
        anularAbono($datos);
        
        
    }
    else if($transaccion == 19)
    {

        $datos[0]=$nombre = $_POST['tipo'];
		
		
		        
        mostrarCuentasCPagadas($datos);

    }
    
//----------- fin gestion ----------/    
    
}

else
{
    
    //regrsar a index
    echo'regresar al index';
}


?>