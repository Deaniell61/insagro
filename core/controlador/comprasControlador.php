<?php


if($_POST)
{
    require('../configCore.php');
    
    $transaccion = $_POST['trasDato'];
    
  
    if($transaccion == 1)
    {
        $nit = $_POST['nit'];
         
        buscarProveedor($nit);
        
        
    
    }
//------------ gestion --------------/    

    // insertar
    else if($transaccion == 2)
    {
        
          

        
        $idProv[0] = $_POST['prov'];
		$idProv[1] = $_POST['tipo'];
		$idProv[2] = $_POST['fecha'];
       

        
        inicioCompra($idProv);
        
    
    }
    // eliminar
    else if($transaccion == 3)
    {
        
        $datos['0'] = $_POST['prod'];
		$datos['1'] = $_POST['cantidad'];
		$datos['2'] = $_POST['precioC'];
		$datos['3'] = $_POST['precioG'];
		$datos['4'] = $_POST['precioE'];
		$datos['5'] = $_POST['precioM'];
		$datos['6'] = $_POST['proveedor'];
		$datos['7'] = $_POST['medida'];
		$datos['8'] = $_POST['presentacion'];
		$datos['9'] = $_POST['idpresentacion'];
        
        ingresoCompra($datos);
        
        
    }
    
    //editar
    else if($transaccion == 4)
    {
        
        
        
        guardarCompra();
        
    }
    
    else if($transaccion == 5)
    {

		 $id = $_POST['id'];

        
        mostrarDetallesCompras($id);

    }
	else if($transaccion == 6)
    {
        
          

        
        $datos[0]=$prod = $_POST['prod'];
		buscarProducto($datos);
		
		        
        
        
    
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

        $datos[0] = $_POST['codigo'];
		$datos[1] = $_POST['cantidad'];
		
		$datos[2] = $_POST['costo'];
		$datos[3] = $_POST['precioG'];
		$datos[4] = $_POST['precioE'];
		$datos[5] = $_POST['precioM'];
		$datos[6] = $_POST['proveedor'];
		$datos[7] = $_POST['presentacion'];
		
		        
        agregaInventario($datos);

    }
	else if($transaccion == 14)
    {

        $datos[0] = $_POST['id'];
		
		
		        
        anularDetalleCompra($datos);

    }
	else if($transaccion == 15)
    {

        $datos[0] = $_POST['id'];
		
		
		        
        buscarPlazoCuentaPagar($datos);

    }
	else if($transaccion == 16)
    {

        $datos[0] = $_POST['tipo'];
		
		
		        
        mostrarCompras($datos);

    }
	else if($transaccion == 17)
    {

        $datos[0] = $_POST['tipo'];
		
		
		        
        mostrarComprasAnul($datos);

    }
	else if($transaccion == 18)
    {

        $datos[0]=$nombre = $_POST['fecha'];
		$datos[1]=$puesto = $_POST['id'];
		
		        
        cambiarFechaCompra($datos);

    }
	else if($transaccion == 19)
    {

        $datos[0] = $_POST['tipo'];
		$datos[1] = $_POST['fechaini'];
		$datos[2] = $_POST['fechafin'];
		
		
		        
        mostrarComprasPorFecha($datos);

    }
    else if($transaccion == 20)
    {

		$datos[0] = $_POST['id'];
		
		        
        buscarPresentacion($datos);

    }else if($transaccion == 21)
    {

		$datos[0] = $_POST['segmento'];
		if($datos[0]<10){
            $datos[0]="0".$datos[0];
        }
		        
        correlativo($datos);

    }
    
//----------- fin gestion ----------/    
    
}

else
{
    
    //regrsar a index
    echo'regresar al index';
}


?>