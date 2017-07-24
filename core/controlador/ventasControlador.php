<?php


if($_POST)
{
    require('../configCore.php');
    
    $transaccion = $_POST['trasDato'];
    
  
    if($transaccion == 1)
    {
        $nit = $_POST['nit'];
         
        buscarCliente($nit);
        
        
    
    }
//------------ gestion --------------/    

    // insertar
    else if($transaccion == 2)
    {
        
          

        
        $idProv[0] = $_POST['prov'];
		$idProv[1] = $_POST['tipo'];
       

        
        inicioVenta($idProv);
        
    
    }
    // eliminar
    else if($transaccion == 3)
    {
        
        $datos['0'] = $_POST['prod'];
		$datos['1'] = $_POST['cantidad'];
		$datos['3'] = $_POST['precioG'];
		$datos['2'] = $_POST['precioG'];
		$datos['4'] = $_POST['precioE'];
		$datos['5'] = $_POST['precioM'];
		$datos['6'] = $_POST['precioGuardar'];
		$datos['7'] = $_POST['cliente'];
        
        ingresoVenta($datos);
        
        
    }
    
    //editar
    else if($transaccion == 4)
    {
        
        
        
        guardarCompra();
        
    }
    
    else if($transaccion == 5)
    {

		 $id = $_POST['id'];

        
        cargarDetalleVentas($id);

    }
	else if($transaccion == 6)
    {
        
          

        
        $datos[0]=$prod = $_POST['prod'];
		buscarProductoVenta($datos);
		
		        
        
        
    
    }
    // eliminar
    else if($transaccion == 7)
    {
        
        $datos[0]=$prod = $_POST['prod'];
		buscarPrecioProductoVenta($datos);
        
        
    }
    
    //editar
    else if($transaccion == 8)
    {
        
        $dato[0] = $_POST['id'];
        
        buscarVenta($dato);
        
    }
    
    else if($transaccion == 9)
    {

        $datos[0]=$nombre = $_POST['tipo'];
		$datos[1]=$puesto = $_POST['id'];
		
		        
        cambiarTipoVenta($datos);

    }
	else if($transaccion == 10)
    {

		$datos[0]=$puesto = $_POST['id'];
		
		        
        anularVenta($datos);

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
		
		        
        agregarFacturaVenta($datos);

    }
	else if($transaccion == 13)
    {

        $datos[0] = $_POST['codigo'];
		$datos[1] = $_POST['cantidad'];
		$datos[2] = $_POST['cliente'];
		$datos[3] = $_POST['tipo'];
		
		        
        quitaInventario($datos);

    }
	else if($transaccion == 14)
    {

        $datos[0] = $_POST['id'];
		
		
		        
        anularDetalleVenta($datos);

    }
	else if($transaccion == 15)
    {

        $datos[0] = $_POST['id'];
		
		
		        
        buscarPlazoCuentaCobrar($datos);

    }
	else if($transaccion == 16)
    {

        $datos[0] = $_POST['tipo'];
		
		
		        
        mostrarVentas($datos);

    }
    else if($transaccion == 17)
    {

        $datos[0] = $_POST['tipo'];
		
		
		        
        mostrarVentasAnul($datos);

    }
	else if($transaccion == 18)
    {

        $datos[0] = $_POST['tipo'];
		$datos[1] = $_POST['fechaini'];
		$datos[2] = $_POST['fechafin'];
		
		
		        
        mostrarVentasPorFecha($datos);

    }
   else if($transaccion == 19)
    {

        $datos[0] = $_POST['tipo'];
		
		
		        
        mostrarVentasSinC($datos);

    }
    else if($transaccion == 20)
    {

        $datos[0] = $_POST['id'];
        $datos[1] = $_POST['tipo'];
		
		
		        
        datosFactura($datos);

    }
    else if($transaccion == 21)
    {

        $datos[0] = $_POST['tipo'];
		$datos[1] = $_POST['fechaini'];
		$datos[2] = $_POST['fechafin'];
		
		
		        
        mostrarVentasPorFechaCredito($datos);

    }else if($transaccion == 22)
    {

        $datos[0] = $_POST['id'];
        $datos[1] = $_POST['tipo'];
		
		
		        
        datosReciboCuentasCobrar($datos);

    }
//----------- fin gestion ----------/    
    
}

else
{
    
    //regrsar a index
    echo'regresar al index';
}


?>