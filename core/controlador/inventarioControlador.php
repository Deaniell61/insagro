<?php


if($_POST)
{
    require('../configCore.php');
    
    $transaccion = $_POST['trasDato'];
    
    
//-------------- acceso -----------/    
    if($transaccion == 1)
    {
        $datos[0]=$_POST['id'];
        $datos[1]=$_POST['tipo'];
		
		
        buscarInventario($datos);
        
        
    
    }
	else if($transaccion == 2)
    {
        $datos[0]=$_POST['id'];
		$datos[1]=$_POST['precioG'];
		$datos[2]=$_POST['precioE'];
		$datos[3]=$_POST['precioM'];
		$datos[4]=$_POST['costo'];
		$datos[5]=$_POST['cantidad'];
		$datos[6]=$_POST['minimo'];
		
		$datos[7]=$_POST['nombre'];
		$datos[8]=$_POST['marca'];
		$datos[9]=$_POST['descripcion'];
		$datos[10]=$_POST['prod'];
		$datos[11]=$_POST['codigo'];
		$datos[12]=$_POST['segmento'];
		$datos[13]=$_POST['presentacion'];
		
        $datos[14]=$_POST['tipo'];
		
        actualizaInventario($datos);
        
        
    
    }
    else if($transaccion == 3)
    {
        $datos[0]=$_POST['tipo'];
		
		
        mostrarInventario($datos);
        
        
    
    }
	else if($transaccion == 4)
    {
        $datos[0]=$_POST['tipo'];
		
		
        mostrarInventarioAdmin($datos);
        
        
    
    }
	else if($transaccion == 5)
    {
        $datos[0]=$_POST['prod'];
		$datos[1]=$_POST['inv'];
		$datos[2]=$_POST['tipo'];
		
		
        eliminarInventario($datos);
        
        
    
    }
    else if($transaccion == 6)
    {
        $datos[0]=$_POST['id'];
		
        buscarInventarioFragmentar($datos);
        
        
    
    }
    else if($transaccion == 7)
    {
        $datos[0]=$_POST['id'];
		
        mostrarTablaInventarioFragmentar($datos);
        
        
    
    }
    else if($transaccion == 8)
    {
        $datos[0]=$_POST['id'];
		
        buscarInventarioProductoFragmentar($datos);
        
        
    
    }
    else if($transaccion == 9)
    {
        $datos[0]=$_POST['id'];         
        $datos[1]=$_POST['precioG'];         
        $datos[2]=$_POST['codigo'];         
        $datos[3]=$_POST['presentacion'];         
        $datos[4]=$_POST['costo'];         
        $datos[5]=$_POST['cantidad'];         
        $datos[6]=$_POST['precioE'];         
        $datos[7]=$_POST['precioM'];         
        $datos[8]=$_POST['nombre'];         
        $datos[9]=$_POST['padre'];
		
		
        fragmentarInventario($datos);
        
        
    
    }
    else if($transaccion == 10)
    {
        $datos[0]=$_POST['id'];         
        $datos[1]=$_POST['precioG'];         
        $datos[2]=$_POST['codigo'];         
        $datos[3]=$_POST['presentacion'];         
        $datos[4]=$_POST['costo'];         
        $datos[5]=$_POST['cantidad'];         
        $datos[6]=$_POST['precioE'];         
        $datos[7]=$_POST['precioM'];         
        $datos[8]=$_POST['nombre']; 
		
        fragmentarInventarioNuevo($datos);
        
        
    
    }
    else if($transaccion == 11)
    {

        $datos[0] = $_POST['id'];
        $datos[1] = $_POST['tipo'];
		
		
		        
        impInvAdmin($datos);

    }
    else if($transaccion == 12)
    {

        $datos[0] = $_POST['id'];
        $datos[1] = $_POST['tipo'];
		
		
		        
        impInvAdminSinPres($datos);

    }else if($transaccion == 13)
    {
        $datos[0]=$_POST['tipo'];
		
		
        mostrarInventarioConsig($datos);
        
        
    
    }else if($transaccion == 14)
    {

        $datos[0] = $_POST['id'];
        $datos[1] = $_POST['tipo'];
		
		
		        
        impInvConsignacion($datos);

    }else if($transaccion == 15)
    {
        $datos[0]=$_POST['tipo'];
		
		
        mostrarMovimientosInventarioConsignacion($datos);
        
        
    
    }
    else if($transaccion == 16)
    {
        $datos[0]=$_POST['id'];
        $datos[1]=$_POST['tipo'];
		
		
        buscarInventarioConsig($datos);
    
    }else if($transaccion == 17)
    {
        $datos[0]=$_POST['tipo'];
		
		
        mostrarInventarioConsigEntrada($datos);
        
        
    
    }
    else if($transaccion == 18)
    {
        $datos[0]=$_POST['tipo'];
		
		
        mostrarMovimientosInventarioConsignacionEntrada($datos);
        
        
    
    }
    else if($transaccion == 19)
    {
        $datos[0]=$_POST['id'];
        $datos[1]=$_POST['tipo'];
		
		
        buscarInventarioConsigEnt($datos);
    
    }
	
//----------- fin gestion ----------/    
    
}

else
{
    
    //regrsar a index
    echo'regresar al index';
}


?>